<?php
/**
 * Created by PhpStorm.
 * User: yezhilie
 * Date: 2018/6/25
 * Time: 11:24
 */

namespace AdminMsg\Controller;

use AdminMsg\Service\AdminMsgService;
use Common\Controller\AdminBase;

class IndexController extends AdminBase{

    /**
     * 消息页
     */
    public function index(){
        $this->display();
    }

    /**
     * 获取消息
     */
    public function getAdminMsgList(){
        $page = I('get.page', 1);
        $limit = I('get.limit', 20);
        $where = ['admin_id' => ['IN', [0, $this->uid]]];
        $order = 'is_read ASC,create_time DESC';
        $res = AdminMsgService::getAdminMsgList($where, $order, $page, $limit);
        $this->ajaxReturn($res);
    }

    /**
     * 阅读消息
     */
    public function readAdminMsg(){
        $id = I('post.id');
        $res = AdminMsgService::readAdminMsg($id, $this->uid);
        $this->ajaxReturn($res);
    }
}