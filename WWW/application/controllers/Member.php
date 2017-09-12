<?php
require('Admin.php');
/**
 * Created by PhpStorm.
 * User: 醉月思
 * Date: 2017/6/27
 * Time: 16:31
 */
class Member extends Admin{
	/**
	 * @var array 记录类名
	 */
	private $data = array('Class' => __CLASS__);

	public function __construct(){
        parent::__construct();
    }

    public function lists()
    {
	    $this->data['function'] = __FUNCTION__;
	    $this->data['user_lists'] = $this->Op_user->get_lists(1);
        $this->load->view('user/lists/lists',$this->data);
    }

    public function unactived()
    {
	    $this->data['function'] = __FUNCTION__;
	    $this->data['user_lists'] = $this->Op_user->get_lists(0);
	    $this->load->view('user/lists/unactived',$this->data);
    }

	public function sure_member($user_id)
	{
		if($this->Op_user->sure($user_id)){
			alert('激活成功');
			go_history();
		}else{
			$this->output->set_output('激活失败');
		}
    }

	public function delete_member($user_id)
	{
		if($this->Op_user->delete($user_id)){
			alert('删除成功');
			go_history();
		}else{
			$this->output->set_output('激活失败');
		}
    }
}