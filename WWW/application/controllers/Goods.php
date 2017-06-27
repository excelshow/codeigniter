<?php
require('Admin.php');
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 商品管理类，继承于Admin类，所有商品管理的操作在这里完成
 */
class Goods extends Admin{
    public function __construct(){
        parent::__construct();
    }
    /**
     * 商品列表
     */
    public function lists(){
        $data = Array(
            'goods' => $this->Op_goods->get_last_ten_goods(),
        );
        $this->load->view("goods/lists",$data);
        $this->load->view('footer');
    }
    /**
     * 添加新商品
     */
    public function add(){
        $data = Array(
            'class' => $this->Op_goods->goods_class(),
        );
        $this->load->view("goods/add",$data);
        $this->load->view('footer');
    }
    /**
     * 商品分类
     */
    public function classify(){
        $data = Array(
            'class' => $this->Op_goods->goods_class(),
        );
        $this->load->view("goods/classify",$data);
        $this->load->view('footer');
    }
    public function detail($good_id)
    {
        $data = array(
            'detail' => $this->Op_goods->goods_detail($good_id),
        );
        $this->load->view("goods/detail",$data);
    }
    /**
     * 检查表单提交是否合法，同时完成文件的上传，但并没有返回值。
     */
    public function check(){
        $this->form_validation->set_error_delimiters("<font style=\"color:red\"> ERROR:", '</font>');
        $data = Array();
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
                'label' => '描述',
                'rules' => 'required|min_length[3]|max_length[100]'
            ),
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE){
            $this->goods_new();
        }
        //将数据插入至数据库
        else{
            $this->load->model('Op_goods');
            $row = Array(
                'name' => $this->input->post('name'),
                'prices' => $this->input->post('prices'),
                'picture' => $this->input->post('name').'.jpg',
                'description' => $this->input->post('description'),
            );
            if($this->Op_goods->insert_good($row)) {
                $good_id = $this->Op_goods->get_max('id', 'goods');
                $this->Op_goods->update_class($good_id, $this->input->post('class'));
            }
        }
        //文件上传的代码块
        $config['upload_path']      = './uploads/';
        $config['allowed_types']    = 'jpg';
        $config['max_size']    			= 1000;
        $config['max_width']        = 1900;
        $config['max_height']       = 1900;
        $config['file_name']       = iconv("UTF-8","gbk",$this->input->post('name'));

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('file'))
        {
            $data = array('tips' => $this->upload->display_errors());
            $this->load->view('board',$data);
        }
        else
        {
            $data = array('tips' => '提交成功','upload_data' => $this->upload->data());
            $this->load->view('goods/upload_success',$data);
        }
    }
    /**
     * 执行删除商品操作
     * @param int $id 商品ID
     */
    public function delete($id) {
        $this->Op_goods->delete_goods($id);
        redirect('Goods/lists');
    }
}
