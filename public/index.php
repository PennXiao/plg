<?php
define('DEBUG', true);
define('BASEDIR_', realpath('..\/'));

require_once BASEDIR_.'/vendor/autoload.php';


$app = require BASEDIR_.'/bootstrap/autoload.php';
$app->send();