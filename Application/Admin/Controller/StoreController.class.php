<?php
/**
 * Created by PhpStorm.
 * User: dreamfly
 * Date: 2014/12/17
 * Time: 10:29
 */


namespace Admin\Controller;

class StoreController extends CommonController
{
    /**
     *
     */
    public function storeBasicSetting()
    {
        $s = D('Store');
        $store_id = session('store_id');
        $store_info = $s->getStoreInfo($store_id);
        $this->assign('store', $store_info);
        $this->display('Store/store_basic_setting');
    }

    public function storeDisplaySetting()
    {
        $s = D('Store');
        $store_id = session('store_id');
        $store_info = $s->getStoreInfo($store_id);
        $this->assign('store', $store_info);
        $this->display('Store/store_display_setting');
    }

    public function storeBasicSettingHandle()
    {
        $s = D('Store');
        if (!$s->create()) {
            $this->error($s->getError());
        } else {
            $data["store_id"] = session('store_id');

            if (is_null($data["store_id"])) {
                $this->error('非法的用户');
            }
            $data["display_name"] = I('display_name');
            $data["title"] = I('title');
            $data["keywords"] = I('keywords');
            $data["address"] = I('address');
            $data["service_phone"] = I('service_phone');
            $data["service_qq"] = I('service_qq');
            $data["service_email"] = I('service_email');
            $data["notice_user"] = I('notice_user');
            $data["notice_shop"] = I('notice_shop');
            if ($s->save($data)) {
                $this->success("修改商店基本信息成功！");
            } else {
                $this->error("修改商店基本信息失败！");
            }
        }
    }

    public function storeDisplaySettingHandle()
    {
        $s = D('Store');
        if (!$s->create()) {
            $this->error($s->getError());
        } else {
            $data["store_id"] = session('store_id', null);
            if (is_null($data["store_id"])) {
                $this->error('非法的用户');
            }
            $data["display_name"] = I('display_name');
            $data["title"] = I('title');
            $data["keywords"] = I('keywords');
            $data["address"] = I('address');
            $data["service_phone"] = I('service_phone');
            $data["service_qq"] = I('service_qq');
            $data["service_email"] = I('service_email');
            $data["notice_user"] = I('notice_user');
            $data["notice_shop"] = I('notice_shop');
            $s->save($data);
        }
    }

    



    public function showGoodsIndex(){
        $s = D('Store');
        $store_id = session('store_id');
        if($store_id!=1){
            $this->error(C('ERROR_NO_PRIVILEGE'));
        }else{
            $goods = D('Goods');
            $order = array();

            $order_by = I('request.order_by', null);
            $order_sort = I('request.order_sort', null);

            if (!is_null($order_by)) {
                $order[$order_by] = $order_sort;
            }
            if ($order_sort == "DESC") {
                $this->assign('order_sort', 'ASC');
            } else {
                $this->assign('order_sort', 'DESC');
            }

            $count = $goods->where(array('is_delete' => 0))->count();
            // 查询满足要求的总记录数
            $Page = new \Think\Page($count, 10);
            $config = array(
                'header' => '<span class="rows">共 %TOTAL_ROW% 条记录</span>',
                'prev' => '上一页',
                'next' => '下一页',
                'first' => '第一页',
                'last' => '最后一页',
                'theme' => '%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%',
            );
            foreach ($config as $k => $v) {
                $Page->setConfig($k, $v);
            }

            // 实例化分页类 传入总记录数和每页显示的记录数(25)
            $show = $Page->show();
            // 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性

            if (empty($order)) {
                $list = $goods->where(array('is_delete' => 0))->order('goods_id')->limit($Page->firstRow . ',' . $Page->listRows)->select();
            } else {
                $list = $goods->where(array('is_delete' => 0))->order($order)->limit($Page->firstRow . ',' . $Page->listRows)->select();
            }

            $this->assign('list', $list);// 赋值数据集
            $this->assign('page', $show);// 赋值分页输出
     
            $this->display('store_index_goods_show');
        }
    }

    public function goodsShowOrNot(){
        $goods_id = I('request.goods_id', null);
        $is_show_index = I('request.is_show_index', null);
        if (!is_null($goods_id)) {
            $goods = D('Goods');
            $result = $goods->UpdateGoodsShowIndex($goods_id, $is_show_index);
            if($result){
                echo "true";
            }else{
                echo "false";
            }
        }
    }

    public function goodsBatch(){
        $goods_ids = I('post.goods_ids');
        $operation = I('post.operation');
        $goods_ids = trim($goods_ids, ':');
        $goods_ids_arr = explode(':', $goods_ids);
        $g = D('Goods');
        foreach ($goods_ids_arr as $k => $v) {
            if ($operation == 'show') {
                if(!$g->UpdateGoodsShowIndex($v,1)){
                    echo "false";
                }
            }else if($operation=='hidden'){
                if(!$g->UpdateGoodsShowIndex($v,0)){
                    echo "false";
                }
            }
        }
        echo "true";
    }

}
