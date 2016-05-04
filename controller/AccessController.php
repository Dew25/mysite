<?php
class AccessController extends Controller{


    public function showLogin_action(){
        $response=$this->render("view/showLogin.php",null);
        return $response;
    }
    /**
     * Проверяем авторизацию
     * @param  array $args содержит очищенные классом Filter значения ключей 'login' и 'pass'
     * @return boolean  в случае успешной проверки 'true';
     */
    public function checkLogin_action($args){

        $userAuth=new UserLogin($args);
        if($userAuth->getAuth()=='false'){
            $this->showLogin_action();
        }
        parent::_setUser(new User($_SESSION[$this->getSessionId()]));
        return $userAuth->getAuth();
    }

    public function checkAuth_action()
    {
        echo '<br>sessionId='.$this->getSessionId();
        var_dump($_SESSION[$session_id]);
        if(isset($_SESSION)){
            session_start();
            $this->showLogin_action();
        }
        parent::_setUser(new User($_SESSION[$this->session_id]));
    }




}