<?php
class User{
	private $id;
	private $login;
	private $pass;
	private $role=array();
	public function __construct($args, $flag=null)
	{
		if($flag!=null){
			$repo=new UserRepository();
	        switch ($flag) {
	            case 'READ':{
	                $user=$repo->readAddress($args);
	                $this->_setId($user["id"]);
	                $this->_setLogin($user["login"]);
	                $this->_setPass($user["pass"]);
	                $this->_setRole($user["role"]);
	                break;
	            }
	            case 'INSERT':{
	                $this->_setId($repo->insertAddress($args));
	                break;
	            }
	            case 'UPDATE':{
	                $repo->updateAddress($args);
	                break;
	            }
	            case 'DELETE':{
	                $repo->deleteAddress($args);
	                break;
	            }
	        }
		}
	}


    /**
     * Gets the value of role.
     *
     * @return Role
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Sets the value of role.
     *
     * @param Role $role the role
     *
     * @return self
     */
    private function _setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Gets the value of id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the value of id.
     *
     * @param int $id the id
     *
     * @return self
     */
    private function _setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the value of login.
     *
     * @return String
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Sets the value of login.
     *
     * @param String $login the login
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
     * @return String
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * Sets the value of pass.
     *
     * @param String $pass the pass
     *
     * @return self
     */
    private function _setPass($pass)
    {
        $this->pass = $pass;

        return $this;
    }
}