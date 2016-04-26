<?php
class StudentRepository{

    public function readStudent($id){
        $sql="SELECT `id`, `registry`, `group_id`, `person_id`, `address_id` FROM `student` WHERE id=?";
        $dbh = ConnDB::getDbh();
        $stmt=$dbh->prepare($sql);
        $stmt->execute(["$id"]);
        $row = $stmt->fetch();

        $result['id']=$row["id"];
        $result['registry']=$row["registry"];
        $result['group']= new Group($row["group_id"],'READ');
        $result['person']= new Person($row["person_id"],'READ');
        $result['address']= new Address($row["address_id"],'READ');

        return $result;
    }

    public function insertStudent($args){
        $sql="INSERT INTO `student`(`registry`, `group_id`, `person_id`, `address_id`) VALUES (?,?,?,?,?,?)";
        $stmt = ConnDB::getDbh()->prepare($sql);
        $stmt->execute(array_values($args));

        return ConnDB::getDbh()->lastInsertId();
    }

    public function updateStudent($args){
        $sql="UPDATE `student` SET `registry`=?,`group_id`=?,`person_id`=?,`address_id`=? WHERE id=?";
        $dbh = ConnDB::getDbh();
        $stmt=$dbh->prepare($sql);
        $stmt->execute(["$args"]);
    }

     public function deleteStudent($id){
        $sql="DELETE FROM `student` WHERE id=?";
        $dbh = ConnDB::getDbh();
        $stmt=$dbh->prepare($sql);
        $stmt->execute(["$id"]);
    }

    public function getStudentsByGroup($groupId)
    {
        $sql="SELECT `id`, `registry`, `group_id`, `person_id`, `address_id` FROM `student` WHERE group_id=?";
        $dbh = ConnDB::getDbh();
        $stmt=$dbh->prepare($sql);
        $stmt->execute(["$groupId"]);
        while($row=$stmt->fetch()){
            $students[]=new Student($row,null);
        }
// echo "<br>StudentRepository::groupId=".$groupId."<br><br>StudentRepository::getStudentsByGroup=<pre>";
// var_dump($students);
// echo "</pre>";
        return $students;
    }
}