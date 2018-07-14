<?php
/**
 * @author pennilessfor@gmail.com
 * @version 1.0
 * @link 
 */

//
define("F_S_MEMORY",    memory_get_usage());
//
define("F_S_TIME",      microtime(true));


//定义项目根目录
define('BASEDIR_', realpath(__DIR__.'\..\/'));
/**
 * 引入composer autoload
 * 自动加载拓展与类库
 */
require_once BASEDIR_.'/vendor/autoload.php';
/**
 * 运行框架
 * @var [obj] $app
 */
$app = require BASEDIR_.'/bootstrap/autoload.php';
$app->send();