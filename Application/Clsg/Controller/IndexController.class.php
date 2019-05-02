<?php
namespace Clsg\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	$this->display();
    }

    /*板块-新闻*/
	public function forum($plateId = 1,$page = 1,$pageSize = 10){
		$PN     = M("pn");
		$News   = M("News");
		$Plate  = M("Plate");
		$news   = $News->field("
				p.plate_id,
			    p.plate_name,
			    news.news_title,
			    news.news_grade,
			    news.news_id,
			    news.news_browse_count,
			    news.news_reply_count,
			    news.news_time,
			    u_n.user_name,
			    (SELECT c.comment_time FROM comment AS c WHERE c.news_id=news.news_id ORDER BY c.comment_id DESC LIMIT 1) AS 'lately_time',
                (SELECT u_c.user_name FROM comment AS c INNER JOIN user AS u_c ON c.user_id = u_c.user_id WHERE c.news_id=news.news_id ORDER BY c.comment_id DESC LIMIT 1 ) AS 'lately_name'
			")->
			join(
				"INNER JOIN user AS u_n ON u_n.user_id = news.user_id"
			)->
			join(
				"INNER JOIN  pn AS p_n ON p_n.news_id = news.news_id"
			)->
			join(
				"INNER JOIN plate AS p ON p.plate_id = p_n.plate_id"
			)->
			where(array("p.plate_id"=>$plateId))
			->
			order(array("news_grade DESC,news.news_id DESC"))
			->
			page($page,$pageSize)
			->select();

		$pageCount = $PN->where(array("plate_id"=>$plateId))->count('pn_id');
		$plate = $Plate->field("
				r.region_id,
	            r.region_name,
			    plate.plate_id,
			    plate.plate_name
		    ")->join("
		        INNER JOIN rp ON rp.plate_id = plate.plate_id
		    ")->join("
		        INNER JOIN region r ON r.region_id = rp.region_id
		    ")->where(array("plate.plate_id"=>$plateId))->select();

		$this->plate        = $plate[0];
		$this->pageCount    = $pageCount;
		$this->news         = $news;
		$this->page         = $page;
		$this->plateId      = $plateId;
		$this->display();
	}

	/*新闻-内容*/
	public function news($plateId = 1,$newsId = 1 , $page = 1, $pageSize = 30){
		$Plate   = M("Plate");
		$News    = M("News");
		$Comment = M("Comment");
		$plate = $Plate->field("
				r.region_id,
	            r.region_name,
			    plate.plate_id,
			    plate.plate_name
		    ")->join("
		        INNER JOIN rp ON rp.plate_id = plate.plate_id
		    ")->join("
		        INNER JOIN region r ON r.region_id = rp.region_id
		    ")->where(array("plate.plate_id"=>$plateId))->select();
		$news = $News->field("
			    news.news_id,
			    news.news_title,
			    news.news_time,
			    news.news_grade,
			    u.user_name,
			    u.user_id
		")->join("
				INNER JOIN user AS u ON u.user_id = news.user_id
		")->where(
			array("news_id"=>$newsId)
		)->select();

		$comments = $Comment->field("
			u.user_name,
		    u.user_id,
		    u.user_grade,
		    comment.comment_id,
		    comment.comment_time,
		    comment.p_id,
		    comment.c_id,
		    ci.commentInfo_text AS cit
		")->join("
			INNER JOIN commentinfo AS ci ON ci.comment_id = comment.comment_id
		")->join("
			INNER JOIN user AS u ON u.user_id = comment.user_id
		")->join("
			left JOIN comment AS p ON p.comment_id = comment.p_id
		")->where(
			array(
				"comment.news_id"=>$newsId
			)
		 )->order("
			comment.comment_id DESC
		")->page($page,$pageSize)->select();

		$pageCount          = $Comment->where(array("news_id"=>$newsId))->select();      //最多显示5页的按钮
		$pageCount          = $pageMax   = ceil(count($pageCount) / $pageSize);
		$pageCount          = $pageCount == 0 ? 1 : ($pageCount >= 5 ? 5 : $pageCount);


		$pcomments = [];
		foreach ($comments as $c) {                         //过滤不是楼层的评论
			$c["p_id"] == 0 ? $pcomments[] = $c : null;
		}

		$this->pcomments    = $pcomments;
		$this->comments     = $comments;
		$this->news         = $news[0];
		$this->plate        = $plate[0];
		$this->pageMax      = $pageMax;                       //总页数
		$this->pageCount    = $pageCount;                     //前段显示总页数
		$this->pageSize     = $pageSize;                      //页面个数
		$this->page         = $page;                          //当前页数



		$this->display();
	}

}