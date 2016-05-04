<?php
class UserLogin{
    private $auth;
    private $ip;
    public function __construct($args)
    {

        extract($args);
        $repo=new UserLoginRepository();

        $user=$repo->getUserData($login);

        echo "<br>userPass=".$userPass=md5(md5(md5($pass)));
        echo '<br>$user[pass]='.$user['pass'];

        if($user['pass'] == $userPass){
             echo "<br>UserLogin::args=";print_r($args);
            $_SESSION['user']=$user['id'];
            $_SESSION['ip']=$this->getIp();
            $this->_setAuth('true');
        }else{
            $this->_setAuth('false');
        }
        echo "<br>UserLogin::auth=".$this->getAuth();
    }


    private function _setIp(){
        if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"),"unknown"))
        $ip = getenv("HTTP_CLIENT_IP");

        elseif (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
        $ip = getenv("HTTP_X_FORWARDED_FOR");

        elseif (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
        $ip = getenv("REMOTE_ADDR");

        elseif (!empty($_SERVER['REMOTE_ADDR']) && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
        $ip = $_SERVER['REMOTE_ADDR'];

        else
        $ip = "unknown";

        return($ip);
    }
    public function getIp(){
        return $this->ip;
    }
    /**
     * Gets the value of auth.
     *
     * @return mixed
     */
    public function getAuth()
    {
        return $this->auth;
    }

    /**
     * Sets the value of auth.
     *
     * @param mixed $auth the auth
     *
     * @return self
     */
    private function _setAuth($auth)
    {
        $this->auth = $auth;

        return $this;
    }
}