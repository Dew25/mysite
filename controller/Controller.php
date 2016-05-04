<?php
class Controller{

    private $sessionId='user';
    private $user; //object


    public function __construct(){
        // if(isset( $_SESSION )){
        //     session_start();
        // }
        echo "<br>Конструктор Controller()";
    }



    public function render($path, $data = null){
        // echo "<pre>";
        // var_dump($data);
        // echo "</pre>";
        ob_start();
        require $path;
        $html=ob_get_clean();

        return $html;
    }

       /**
     * Gets the value of session_id.
     *
     * @return mixed
     */
    public function getSessionId()
    {
        return $this->sessionId;
    }

    /**
     * Sets the value of session_id.
     *
     * @param mixed $session_id the session id
     *
     * @return self
     */
    private function _setSessionId($sessionId)
    {
        $this->sessionId = $session_id;

        return $this;
    }

    /**
     * Gets the value of user.
     *
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Sets the value of user.
     *
     * @param mixed $user the user
     *
     * @return self
     */
    protected function _setUser($user)
    {
        $this->user = $user;

        return $this;
    }
}