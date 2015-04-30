<?php
/**
 * Created by PhpStorm.
 * User: dreamfly
 * Date: 2015/1/13
 * Time: 15:44
 */
namespace Home\Controller;
use Think\Controller;

class GoodsController extends CommonController{
	public function assignGoods($store_id){
		$g = D('Goods');
		$c = D('Category');
        $goods = $g->getAllGoodsByStoreId($store_id);
        foreach($goods as $k=>$v){
            $goods[$k]['goods_category'] = $c->getCatNameById();
            $goods_price_info = $g->getPriceInfo($v['goods_id']);
            $goods[$k]['goods_price'] = $goods_price_info['is_promote'] > 0 ? $goods_price_info['promote_price'] : ($goods_price_info['shop_price']!=0 ? $goods_price_info['shop_price'] : $goods_price_info['market_price']);
        }
        $this->assign('goods_list',$goods);
	}

	//整体首页商品赋值
	public function assignIndexGoods(){
		$g = D('Goods');
		$c = D('Category');
        $goods = $g->getAllIndexGoods();
        foreach($goods as $k=>$v){
            $goods[$k]['goods_category'] = $c->getCatNameById();
            $goods_price_info = $g->getPriceInfo($v['goods_id']);
            $goods[$k]['goods_price'] = $goods_price_info['is_promote'] > 0 ? $goods_price_info['promote_price'] : ($goods_price_info['shop_price']!=0 ? $goods_price_info['shop_price'] : $goods_price_info['market_price']);
        }
        $this->assign('goods_list',$goods);
	}

	public function exchangeGoods(){
		$eg =  M();
		$order = I('request.order','goods_name');
		$direction = I('request.direction','asc');
		$exchange_goods_list = $eg
            ->table(array(
                        C('DB_PREFIX').'exchange_goods'=>'exchange_goods',
                        C('DB_PREFIX').'goods'=>'goods'
                    )
              )
            ->where('exchange_goods.goods_id = goods.goods_id')
            ->field('goods.*')
            ->order('goods.' .$order .' '. $direction)
            ->select();
		$this->assign('exchange_goods_list',$exchange_goods_list);
		$this->display('exchange_list');
	}

	public function getGoodsPrice($goods_id){
		$g = D('Goods');

		$goods_price_info = $g->getPriceInfo($goods_id);

		//TODO:注册hook,将来编写插件
		$price = $this->hook_goods_price($goods_price_info);

		return $goods_price_info['is_promote'] > 0 ? $goods_price_info['promote_price'] : ($goods_price_info['shop_price']!=0 ? $goods_price_info['shop_price'] : $goods_price_info['market_price']);
	
	}

	public function hook_goods_price($goods_price_info){
		return $goods_price_info;
	}

	public function goodsDetail(){
		$goods_id = I('request.goods_id',null);
		$g = D('Goods');
		$c = D('Category');
		$gg = D('GoodsGallery');
		$commentM = D('Comment');
		$comments = $commentM->getCommentsByGoodsId($goods_id);
		$this->assign('comments',$comments);
		$store_id = $g->getStoreIdByGoodsId($goods_id);
		$goods = $g->getGoodsById($goods_id);
		$goods_gallery = $gg->getGoodsGalleryById($goods_id);
        $goods['goods_category'] = $c->getCatNameById($goods['cat_id']);
        $goods_price_info = $g->getPriceInfo($goods_id);
		$goods['goods_price'] = $this->getGoodsPrice($goods_id);
        $goods['saverate'] = round(($goods['market_price'] - $goods['goods_price'])*100/$goods['market_price']).'%';
        $cat_id = $goods['cat_id'];
        $related_goods_list = $g->getGoodsByCatId($cat_id);
        $this->assign('related_goods_list',$related_goods_list);
        $this->assign('goods_gallery',$goods_gallery);
        $this->assign('goods',$goods);
        R('Brand/assignBrand',array($store_id));
		
		$this->display('Goods/goods_detail');
	}

}