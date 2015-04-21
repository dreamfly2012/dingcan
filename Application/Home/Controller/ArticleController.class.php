<?php

namespace Home\Controller;
use Think\Controller;

class NewsController extends CommonController {
    protected $newsModel;
    public function _initialize()
    {
        $this->newsModel = D('Home.News');
        $webInfo = $this->newsModel->webInfo();
        $footerNews = $this->newsModel->webFooterNews();
        $this->assign('webInfo', $webInfo);
        $this->assign('footerNews', $footerNews);
    }

	//显示文章
    public function article_detail()
    {
        $articleM = D('Article');
        $id = I('request.id',null,'intval');
        $articles = $articleM->getArticleById($id);
    	$this->assign('articles', $articles);
    	$this->display('article_detail');
    }

    //显示文章列表
    public function article_list()
    {
        $articleM = D('Article');
        $category = I('request.category',null);
        $list = $articleM->getArticleByCategory($category);
        $this->assign('list', $list);
		$this->display('article_list');
    }
}
?>