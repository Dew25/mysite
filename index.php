<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


    include "controllers/controller.php";
    include "controllers/GroupController.php";
    include "model/repository/RepositoryGroup.php";
    include "model/ConnDB.php";
    include "model/Group.php";
    include "model/config.php";
    include "model/model.php";

    $uri=$_SERVER['REQUEST_URI'];
    $s = explode('?', $_SERVER['REQUEST_URI']);
    $uri = $s[0];
    $uri=rtrim($uri,'/');
    $uriPrfix='/mysite/index.php';

    //echo "uri=$uri";
    // if('/mysite/index.php' == $uri || '/mysite'==$uri){
    //     $response=list_action();
    // }elseif('/mysite/index.php/admin'==$uri){
    //     $response=admin_action();
    // }elseif('/mysite/index.php/add'==$uri){
    //     $response=add_action();
    // }elseif('/mysite/index.php/show'==$uri){
    //     $response=show_action($_REQUEST['id']);
    // }elseif('/mysite/index.php/delete'==$uri){
    //     $response=delete_action($_REQUEST['id']);
    // }elseif('/mysite/index.php/update'==$uri){
    //     $response=update_action();
    // }elseif('/mysite/index.php/edit'==$uri){
    //     $response=edit_action($_REQUEST['id']);
    // }
$groupController=new GroupController();
switch ($uri) {
    case $uriPrfix.'':
        $response=$groupController->getAllGroups_action();
        break;
    case $uriPrfix.'/showgroup':
        $response=$groupController->getGroup_action($_REQUEST['id']);
        break;

}

    if(isset($response)){
        echo $response;
    }


