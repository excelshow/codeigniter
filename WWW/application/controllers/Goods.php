<?php
require('Admin.php');
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 商品管理类，继承于Admin类，所有商品管理的操作在这里完成
 */
class Goods extends Admin{
    private $filenum=0;
    private function upload_file($goods_id,$time){
        //文件上传的代码块
        $config['upload_path']      = './uploads/';
        $config['allowed_types']    = 'jpg';
        $config['max_size']    			= 1000;
        $config['max_width']        = 1900;
        $config['max_height']       = 1900;
        $config['file_name']       = $goods_id.'-'.$time;
        $this->load->library('upload', $config);
        $this->upload->initialize($config,TRUE);
        if ( ! $this->upload->do_upload('file'.$time))
        {
            $data = array('tips' => $this->upload->display_errors());
            var_dump($data);
        }
        else
        {
            $data = array('tips' => '提交成功','upload_data' => $this->upload->data());
            $this->load->view('goods/upload_success',$data);
        }
    }
    public function __construct(){
        parent::__construct();
    }

    /**
     * 商品列表
     */
    public function lists($dist="all"){
            $data = Array(
                'class' => $this->Op_goods->goods_class(),
                'dist' => urldecode($dist),
            );
        if($dist == "all"){
            $data['goods'] = $this->Op_goods->get_last_ten_goods();
        }else{
            $data['goods'] = $this->Op_goods->get_goods_byclass($dist);
        }
        $this->load->view("goods/lists",$data);
    }
    /**
     * 添加新商品
     */
    public function add(){
        $data = Array(
            'class' => $this->Op_goods->goods_class(),
        );
        $this->load->view("goods/add",$data);
    }
    /**
     * 商品分类
     */
    public function classify(){
        $data = Array(
            'class' => $this->Op_goods->goods_class(),
        );
        $this->load->view("goods/classify",$data);
        
    }
    public function detail($goods_id)
    {
        $data = array(
            'detail' => $this->Op_goods->goods_detail($goods_id),
            'goods_id' => $goods_id,
            'class' => $this->Op_goods->goods_class(),
        );
        $this->load->view("goods/detail",$data);
    }
    /**
     * 检查表单提交是否合法，同时完成文件的上传，但并没有返回值。
     */
    public function check($dist='0'){

        $this->form_validation->set_error_delimiters("<font style=\"color:red\"> ERROR:", '</font>');
        for($i=0;$i<6;$i++){
            if($_FILES['file'.$i]['name'] != ''){
                $this->filenum++;
            }
        }
        $config = array(
            array(
                'field' => 'name',
                'label' => '商品名称',
                'rules' => 'required'
            ),
            array(
                'field' => 'prices',
                'label' => '价格',
                'rules' => 'required'
            ),
            array(
                'field' => 'origin',
                'label' => '产地',
                'rules' => 'required|min_length[3]|max_length[100]'
            ),
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE){
            $this->load->view('header');
            $this->load->view('sidermenu');
            $this->add();
        }
        //将数据插入至数据库
        else{
            $this->load->model('Op_goods');
            $row = Array(
                'name' => $this->input->post('name'),
                'prices' => $this->input->post('prices'),
                'origin' => $this->input->post('origin'),
                'filenum' => $this->filenum,
            );
            if($this->Op_goods->insert_good($row)){
                $good_id = $this->Op_goods->get_max('id', 'goods');
                $this->Op_goods->update_class($good_id, $this->input->post('class'));
                $this->Op_goods->update_content($good_id,$this->input->post('function'),$this->input->post('eat'),$this->input->post('save'));
                $this->load->view('header');
                $this->load->view('sidermenu');

                for($i=0;$i<$this->filenum;$i++){
                    $this->upload_file($good_id,$i);
                }
                $this->add();
            }
        }
    }

    public function stock()
    {
        $data = Array(
            'stock' => $this->Op_goods->get_stock(),
        );
        $this->load->view("goods/stock",$data);
    }
    /**
     * 执行删除商品操作
     * @param int $id 商品ID
     */
    public function delete($id){
        $this->Op_goods->delete_goods($id);
        redirect('Goods/lists');
    }

    /**
     * edit
     * @param $id 商品Id
     * 编辑商品表单的提交接口
     */
    public function edit($id)
    {
        $this->form_validation->set_error_delimiters("<font style=\"color:red\"> ERROR:", '</font>');
        $config = array(
            array(
                'field' => 'name',
                'label' => '商品名称',
                'rules' => 'required'
            ),
            array(
                'field' => 'prices',
                'label' => '价格',
                'rules' => 'required'
            ),
            array(
                'field' => 'origin',
                'label' => '产地',
                'rules' => 'required|min_length[3]|max_length[100]'
            ),
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE){
            $this->load->view('header');
            $this->load->view('sidermenu');
            $this->detail($id);
        }
        //将数据插入至数据库
        else{
            $row = Array(
                'id' => $id,
                'name' => $this->input->post('name'),
                'prices' => $this->input->post('prices'),
                'origin' => $this->input->post('origin'),
            );
            if($this->Op_goods->update_goods($row)) {
                $this->Op_goods->update_class($id, $this->input->post('class'));
                $data=array(
                    'goods_id' => $id,
                    'function' => $this->input->post('function'),
                    'eat' => $this->input->post('eat'),
                    'save' => $this->input->post('save'),
                );
                $this->Op_goods->replace_content($data);
                redirect('goods');
            }
        }

    }
    public function add_have($id,$num)
    {
        $this->Op_goods->add_have($id,$num);
    }
    public function add_num($id,$num)
    {
        $this->Op_goods->add_num($id,$num);
    }

    /**
     * add_class
     * @param $class_name 商品类名
     * 添加商品类的接口
     */
    public function add_class($class_name)
    {
        $class_name = urldecode($class_name);
        $this->Op_goods->add_class($class_name);
    }

    /**
     * delete_class
     * @param $class_name 商品类名
     * 删除商品分类，该类下所有商品将被删除，^-^实则不会只是当前类名与商品ID的映射断了而已
     */
    public function delete_class($class_name)
    {
        $class_name = urldecode($class_name);
        $this->Op_goods->delete_class($class_name);
    }
    /**
     * edit_class
     * @param $class_name 商品类名
     * 编辑商品分类
     */
    public function edit_class($old_class_name,$new_class_name)
    {
        $old_class_name = urldecode($old_class_name);
        $new_class_name = urldecode($new_class_name);
        $this->Op_goods->edit_class($old_class_name,$new_class_name);
    }
}
