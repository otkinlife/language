<?php
/**
 * Created by PhpStorm.
 * User: zy
 * Date: 2016/1/27
 * Time: 12:08
 */
class Common_Base extends Yaf_Controller_Abstract {
    public function init(){
        //�ر���ͼ�Զ���Ⱦ
        Yaf_Dispatcher::getInstance()->disableView();
    }
}