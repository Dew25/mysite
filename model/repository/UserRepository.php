<?php
class UserRepository{

    public function loadUserData($uid)
    {
        $sql="SELECT `id`, `login`, `pass`, `role`, `date` FROM `user` WHERE `id`=?";
        $dbh = ConnDB::getDbh();
        $stmt=$dbh->prepare($sql);
        $stmt->execute(["$uid"]);
        $row = $stmt->fetch();
    }
}