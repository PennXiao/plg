<?php
define('BASEDIR_', realpath(__DIR__.'\..\/'));

require_once BASEDIR_.'/vendor/autoload.php';
$app = require BASEDIR_.'/bootstrap/autoload.php';
$app->send();