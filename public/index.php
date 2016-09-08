<?php
define("APP_PATH",  realpath(dirname(__FILE__) . '/../')); /* 指向public的上一级 */
define("ROOT_DOMAIN", 'mine.jkc.com');
$app  = new Yaf_Application(APP_PATH . "/conf/application.ini");
$app->run();
