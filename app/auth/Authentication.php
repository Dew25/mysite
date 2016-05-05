<?php
class Authentication{

    const SESSION_ID='userId';
    private $uri;
    private $user=null;
    private $access=false;
    private $response;


    public function getAuth()
    {
        //Проверяем залогиненного пользователя
        //если нету сессии с идентификатором 'userId',
        //то запускаем на форму логина.
        if(isset($_SESSION[self::SESSION_ID])){
            session_start();
        }
// echo '<br>_SESSION[self::SESSION_ID]'.$_SESSION[self::SESSION_ID];
        if(!empty($_SESSION[self::SESSION_ID]) && $_SESSION['ip'] !== $_SERVER['REMOTE_ADDR']){
            $user=new User([$_SESSION[self::SESSION_ID]],'ID');
            $this->setUser($user);
            return true;
        }else{
            return false;
        }
    }

    public function loginForm(){
        $accessController=new AccessController();
        $filter=new Filter();
        $loginPass=$filter->filterLoginPass();
        if(isset($floginPass) && !empty($loginPass['login'])){
            $auth=$accessController->checkLogin_action($filter->filterLoginPass());
            if($auth){
                $this->response='';
                header('Location:'.Application::URI_PREFIX.'/');
            }
        }
        $this->response=$accessController->showLogin_action();
    }

    private function setUser($userId)
    {
        $this->user=new User([$userId]);
    }


    /**
     * Gets the value of user.
     *
     * @return User or null
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Gets the value of response.
     *
     * @return mixed
     */
    public function getResponse()
    {
        return $this->response;
    }
}