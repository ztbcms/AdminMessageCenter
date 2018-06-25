<?php
/**
 * Created by PhpStorm.
 * User: yezhilie
 * Date: 2018/6/25
 * Time: 11:02
 */

namespace AdminMsg\Service;

use AdminMsg\Model\AdminMsgModel;
use System\Service\BaseService;

class AdminMsgService extends BaseService {

    /**
     * 创建后台消息
     *
     * @param $content
     * @param $type
     * @param $target_type
     * @param $target
     * @param $url
     * @param $admin_id
     * @return array
     */
    static function createAdminMsg($content, $type, $target_type, $target, $url = '#', $admin_id = 0){
        $data = [
            'content' => $content,
            'type' => $type,
            'target_type' => $target_type,
            'target' => $target,
            'url' => $url,
            'admin_id' => $admin_id,
            'create_time' => time(),
            'is_read' => AdminMsgModel::READ_STATUS_NO,
            'read_time' => 0
        ];
        $res = D('AdminMsg/AdminMsg')->add($data);
        return self::createReturn(true, $res, '创建成功');
    }

    /**
     * 获取后台消息
     *
     * @param array $where
     * @param string $order
     * @param int $page
     * @param int $limit
     * @return array
     */
    static function getAdminMsgList($where = [], $order = '', $page = 1, $limit = 20){
        return self::select('AdminMsg', $where, $order, $page, $limit);
    }

    /**
     * 阅读消息
     *
     * @param $id
     * @param $admin_id
     * @return array
     */
    static function readAdminMsg($id, $admin_id){
        $res = D('AdminMsg/AdminMsg')->where(['id' => $id, 'admin_id' => $admin_id])->save([
            'is_read' => AdminMsgModel::READ_STATUS_YES,
            'read_time' => time()
        ]);
        return self::createReturn(true, $res, '操作成功');
    }

    /**
     * 阅读所有消息
     *
     * @param $admin_id
     * @return array
     */
    static function readAllAdminMsg($admin_id){
        $res = D('AdminMsg/AdminMsg')->where(['admin_id' => [0, $admin_id]])->save([
            'is_read' => AdminMsgModel::READ_STATUS_YES,
            'read_time' => time()
        ]);
        return self::createReturn(true, $res, '操作成功');
    }
}