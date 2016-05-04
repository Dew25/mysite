<?php

class Application{

    private $uriPrefix='/mysite/index.php';

    public function __construct()
    {

        if (isset($_REQUEST[session_name()])){
         session_start();
         echo "<br> сессия запущена";
        }else{
            echo "<br> сессия не запущена";
            header('Location:'.$this->uriPrefix.'/showlogin');
        }
    }
    public function run(){
        echo "<br>создаем контроллеры";
        $groupController=new GroupController();
        $studentController=new StudentController();
        $accessController=new AccessController();
        //$userRole=$accessController->getUser()->getRole();
        //$roleUser=$user->getRole();
        echo "<pre>_REQUEST=";
        var_dump($_REQUEST);
        echo "</pre>";
        $filter=new Filter();
        $uri=$filter->filterGetUri();
        $s = explode('?', $uri);
        $uri = $s[0];
        //echo $uri=rtrim($uri,'/');

        $posSlash=strrpos($uri,'/');
        $lengthUri=strlen($uri);
        if($posSlash < $lengthUri-1){
            $uri=$uri.'/';
        }

        switch ($uri){
            case $uriPrefix.'/':
                if($this->userRole == 'ROLE_USER'){
                    $response=$groupController->getAllGroups_action();
                }
                break;
            case $this->uriPrefix.'/showgroup/':
                $response=$groupController->getGroup_action($filter->filterId());
                break;
            case $this->uriPrefix.'/addgroup/':
                $response=$groupController->addGroup_action();
                break;
            case $this->uriPrefix.'/insertgroup/':
                $response=$groupController->insertGroup_action($filter->filterInsertGroup());
                break;
            case $this->uriPrefix.'/showstudent/':
                $response=$studentController->showStudent_action($filter->filterId());
                break;
            case $this->uriPrefix.'/showlogin/':
                $response=$accessController->showLogin_action();
                break;
            case $this->uriPrefix.'/checklogin/':
                if($accessController->checkLogin_action($filter->filterLogin())){
                    header('Location:'.$uriPrefix.'/');
                }
                break;
            default:
                $response=$groupController->getAllGroups_action();
                break;
        }
        if(isset($response)){
            echo $response;
        }else{
            echo "Ошибка";
        }
    }
    public function getAccess()
    {
        # code...
    }

}