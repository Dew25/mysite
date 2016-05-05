<?php
class AccessController extends Controller{


    public function showLogin_action(){
        echo "<br>AccessController:showLogin_action";
        $response=$this->render("view/showLogin.php",null);
        return $response;
    }
    /**
     * Проверяем авторизацию
     * @param  array $args содержит очищенные классом Filter значения ключей 'login' и 'pass'
     * @return boolean  в случае успешной проверки 'true';
     */
    public function checkLogin_action($args){

        $user=new User($args,'LOGIN');
        echo "AccessController:checkLogin_action:user".var_dump($user);
        if(is_null($user)){
            $this->showLogin_action();
        }
        return true;
    }






}