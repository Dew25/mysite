<?php
class User{
    private $uid;
    private $login;
    private $pass;
    private $role='ROLE_GUEST';
    private $date;

    public function __construct($uid=null){
        if($uid != null){
            $repo=new UserRepository($uid);
            $userData=$repo->loadUserData($uid);
            $this->_setUid($userData['id']);
            $this->_setLogin($userData['login']);
            $this->_setPass($userData['pass']);
            $this->_setUid($userData['id']);
            $this->_setRole($userData['role']);
            $this->_setDate($userData['date']);

        }else{
            echo "<br>User создан с ролью ROLE_GUEST<br>";
        }

    }




    /**
     * Gets the value of uid.
     *
     * @return mixed
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * Sets the value of uid.
     *
     * @param mixed $uid the uid
     *
     * @return self
     */
    private function _setUid($uid)
    {
        $this->uid = $uid;

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
}