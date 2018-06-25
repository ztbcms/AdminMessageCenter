# ztbcms-AdminMsg

### 后台消息管理
#### 消息管理-工作台
![图片](https://dn-coding-net-production-pp.qbox.me/37652593-7247-49a1-99af-74c3d5108db3.png)

### 创建后台消息
```php
/**
  * @param $content     消息内容
  * @param $type        消息类型
  * @param $target_type 消息来源类型
  * @param $target      消息来源
  * @param $url         跳转链接    默认为#,表示不跳转
  * @param $admin_id    后台接受者   默认为0,表示所有管理员都可见
*/
\AdminMsg\System\AdminMsgService::createAdminMsg($content, $type, $target_type, $target, $url, $admin_id);
```
