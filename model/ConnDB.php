<?php
//класс подключения к базе данных
// возвращает дескриптор базы (ключ)
class ConnDB {
    private static $dbh = null;
    private function ConnDB(){
        require config.php;
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = array(
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        );
        self::$dbh = new PDO($dsn, $user, $pass, $opt);
    }

    static public function getDbh(){
        if(is_null(self::$dbh)){
            self::$dbh=new self();
        }
        return self::$dbh;
    }
    protected function __clone(){}
    public function import() {}
}

?>