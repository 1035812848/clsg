<?php
namespace Clsg\Controller;
use Think\Controller;
class AjaxController extends Controller{
	function index(){
		$this->ajaxReturn("");
	}
	/*查看评论*/
	public function comment(){
		$pageSize   = I("pagesize");
		$page       = I("page");
		$newsId     = I("newsid");
		$Comment    = M("Comment");
		$comments   = $Comment->field("
			u.user_name,
		    u.user_id,
		    u.user_grade,
		    comment.comment_id,
		    comment.comment_time,
		    comment.p_id,
		    ci.commentInfo_text AS cit
		")->join("
			INNER JOIN commentinfo AS ci ON ci.comment_id = comment.comment_id
		")->join("
			INNER JOIN user AS u ON u.user_id = comment.user_id
		")->join("
			left JOIN comment AS p ON p.comment_id = comment.p_id
		")->where(array("comment.news_id"=>$newsId))->order("
			comment.comment_id DESC
		")->page($page,$pageSize)->select();
		$pageCount          = $Comment->where(array("news_id"=>$newsId))->select();      //最多显示5页的按钮
		$pageCount          = ceil(count($pageCount) / $pageSize);
		$pageCount          = $pageCount == 0 ? 1 : ($pageCount >= 5 ? 5 : $pageCount);
		$this->ajaxReturn(array("cs"=>$comments,"count"=>$pageCount));
	}

	/*添加评论*/
	public function addComment(){
		$Comment        = M("Comment");
		$id = session("id");
		$comment        = $Comment->add(["user_id"=>$id,"p_id"=>I("p_id"),"c_id"=>I("c_id"),"news_id"=>I("news_id")]);
		$Commentinfo    = M("Commentinfo");
		$commentinfo    =$Commentinfo->add(array("comment_id"=>$comment,'commentInfo_text'=>I('commentInfo_text')));

		$this->ajaxReturn(array('status'=>$commentinfo));
	}

}