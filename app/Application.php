<?php

class Application{

    const URI_PREFIX='/mysite/index.php';

    public function run(){

        echo "<pre>_REQUEST=";
        print_r($_REQUEST);
        echo "</pre>";

            //аутентификация:
        echo "<br>authentication:";
            $authentication=new Authentication();
            var_dump($authentication);
            if(!$authentication->getAuth()){
                $authentication->loginForm();
                $route=new Route();
                $response=$route->response();
            }
        if(isset($response)){
            echo $response;
        }else{
            echo "Ошибка";
        }
    }


}