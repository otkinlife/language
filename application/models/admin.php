<?php

/**
 * Created by PhpStorm.
 * User: zy
 * Date: 2016/2/3
 * Time: 12:04
 */
class adminModel extends Common_Sql
{
    public function test(){
       $res = $this->db->from('admin')->fetchAll();
        var_dump($res);
    }

}