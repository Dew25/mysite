<?php
/**
*
*/
class CountryRepository {

    public function readCountry($id){
        $sql="SELECT `id`, `name` FROM `country` WHERE id=?";
        $dbh = ConnDB::getDbh();
        $stmt=$dbh->prepare($sql);
        $stmt->execute(["$id"]);
        $row = $stmt->fetch();

        return $row;
    }

    public function insertCountry($args){
        $sql="INSERT INTO `country`(`name`) VALUES (?)";
        $stmt = ConnDB::getDbh()->prepare($sql);
        $stmt->execute(array_values($args));

        return ConnDB::getDbh()->lastInsertId();
    }

    public function updateCountry($args){
        $sql="UPDATE `country` SET `name`=? WHERE id=?";
        $dbh = ConnDB::getDbh();
        $stmt=$dbh->prepare($sql);
        $stmt->execute(["$args"]);
    }

     public function deleteCountry($id){
        $sql="DELETE FROM `country` WHERE id=?";
        $dbh = ConnDB::getDbh();
        $stmt=$dbh->prepare($sql);
        $stmt->execute(["$id"]);
    }

}