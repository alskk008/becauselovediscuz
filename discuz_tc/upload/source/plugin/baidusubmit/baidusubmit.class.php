<?php

if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

class plugin_baidusubmit
{
    function __construct()
    {
        define('__BDS_ROOT__', dirname(__FILE__).DIRECTORY_SEPARATOR);
        require_once(__BDS_ROOT__.'./function/function_baidu.php');
        require_once(__BDS_ROOT__.'./class_schema.php');
    }

    function common()
    {
        //error_reporting(E_ALL & ~E_NOTICE);
        //ini_set('display_errors', 0);
        //ini_set('error_log', 1);
    }

    //删除主题
    function deletethread($value)
    {
        //if (baidu_senddata_error()) return;
        //global $_G;
        //if ($value['step'] === 'check'){
        //    get_page_content_deletethread($_G['deletethreadtids']);
        //}
    }

    //删除帖子
    function deletepost($value)
    {
        //if (baidu_senddata_error()) return;
        //global $_G;
        //if ($value['step']==='delete') {
        //    get_page_content_deletepost($_G['fid'] ,$_G['deletepostids']);
        //}
    }
 }
