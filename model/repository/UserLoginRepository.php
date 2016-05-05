<?php
class UserLoginRepository{

    public function getUserData($args)
    {
        $sql="SELECT `id`, `login`, `pass`, `role`, `date` FROM `user` WHERE `login`=?";
        $dbh = ConnDB::getDbh();
        $stmt=$dbh->prepare($sql);
        $stmt->execute(["$login"]);
        $row = $stmt->fetch();
        echo "<br>getUserData::pass=". $row['pass']."<br>";
        return $row;
    }
}