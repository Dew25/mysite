<?php
class UserRepository{

    public function readUserById(array $args=null)
    {
        if(!is_null($args)){
            $sql="SELECT `id`, `login`, `pass`, `role`, `date` FROM `user` WHERE `id`=?";
            $dbh = ConnDB::getDbh();
            $stmt=$dbh->prepare($sql);
            $stmt->execute($args);
            return $row = $stmt->fetch();
        }
        return false;
    }
    public function readUserByLogin(array $args)
    {
        if(!is_null($args)){
           echo $sql="SELECT `id`, `login`, `pass`, `role`, `date` FROM `user` WHERE `login`=?";
            $dbh = ConnDB::getDbh();
            $stmt=$dbh->prepare($sql);
            $stmt->execute([$args['login']]);
            return $row = $stmt->fetch();
        }
        return false;
    }
}