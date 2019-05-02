<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	if ( IS_GET ) {
    	    $this->display();
    	    return;
	    }
	    $User = M('Login');
    	$input = $User->create();
    	$user = $User->getByAccount($input['account']);
		if (empty($user)) {
			$this->ajaxReturn(array("state"=>false,"message"=>"用户不存在！","field"=>"account"));
			return;
		}
	    if ($user["password"]!=$input["password"]) {
		    $this->ajaxReturn(array("state"=>false,"message"=>"密码错误！","field"=>"password"));
		    return;
	    }
	    session("id",$user["user_id"]);
	    $this->ajaxReturn(array("state"=>true));
    }
}