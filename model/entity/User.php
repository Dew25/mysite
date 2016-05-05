<?php
class User{
    private $id;
    private $login;
    private $pass;
    private $role='ROLE_GUEST';
    private $date;

    public function __construct(array $args=null,$flag=''){

        $repo=new UserRepository($args);
        switch ($flag){
            case 'ID':{
                $user=$repo->readUserById($args);
                $this->_setId($user["id"]);
                $this->_setLogin($user["login"]);
                $this->_setPass($user["pass"]);
                $this->_setRole($user["role"]);
                $this->_setDate($user["date"]);
                break;
            }
            case 'LOGIN':{
                $user=$repo->readUserByLogin($args);
                $this->_setId($user["id"]);
                $this->_setLogin($user["login"]);
                $this->_setPass($user["pass"]);
                $this->_setRole($user["role"]);
                $this->_setDate($user["date"]);
                break;
            }
            case 'INSERT':{
                $this->_setId($repo->insertUser($args));
                break;
            }
            case 'UPDATE':{
                $repo->updateUser($args);
                break;
            }
            case 'DELETE':{
                $repo->deleteUser($args);
                break;
            }
        }
    }

    /**
     * Gets the value of uid.
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the value of uid.
     *
     * @param mixed $uid the uid
     *
     * @return self
     */
    private function _setId($id)
    {
        $this->id = $id;
        session_start();
        $_SESSION[Authentication::SESSION_ID]=$id;
        $_SESSION['ip']=$this->_getServerIp();

        return $this;
    }

    /**
     * Gets the value of login.
     *
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Sets the value of login.
     *
     * @param mixed $login the login
     *
     * @return self
     */
    private function _setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Gets the value of pass.
     *
     * @return mixed
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * Sets the value of pass.
     *
     * @param mixed $pass the pass
     *
     * @return self
     */
    private function _setPass($pass)
    {
        $this->pass = $pass;

        return $this;
    }

    /**
     * Gets the value of role.
     *
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Sets the value of role.
     *
     * @param mixed $role the role
     *
     * @return self
     */
    private function _setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Gets the value of date.
     *
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Sets the value of date.
     *
     * @param mixed $date the date
     *
     * @return self
     */
    private function _setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    private function _getServerIp(){
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
}