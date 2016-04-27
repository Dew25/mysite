<?php
class UserRepository{

    public function readUser($id){
        $sql="SELECT `id`, `login`, `pass`, `role` FROM `user` WHERE id=?";
        $dbh = ConnDB::getDbh();
        $stmt=$dbh->prepare($sql);
        $stmt->execute(["$id"]);
        $row = $stmt->fetch();

        $result['id']=$row["id"];
        $result['login']=$row["login"];
        $result['pass']=$row["pass"];
        $result['role']=new Role($row["pass"],'READ');
        
        return $result;
    }

    
}