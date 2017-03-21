<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

header("Content-type: text/html; charset=utf-8");
header("Cache-Control: no-cache, must-revalidate"); // 禁用缓存  http 1.1
header("Pragma: no-cache"); // 禁用缓存 http 1.0
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // 设置缓存过期时间,

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',true);
// 定义应用目录
define('APP_PATH','./Apps/');
//绑定模块
define('BIND_MODULE','Home');
define('RUNTIME_PATH', APP_PATH . 'cache/');
// 引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';