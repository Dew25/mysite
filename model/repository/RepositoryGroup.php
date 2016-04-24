<?php
class RepositoryGroup{


    public function listAllGroups(){
        $year=date("Y");
        $list=array();
        $sql="SELECT `id` FROM `group` WHERE begin_year <= '$year' AND end_year >= '$year'";
        $stmt=ConnDB::getDbh()->query($sql);
        while ($row=$stmt->fetch()) {
            $id=$row['id'];
            $list[]=new Group($id,"READ");
        }
        return $list;
    }

}