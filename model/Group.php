<?php
class Group{
    private $id;
    private $abbreviation;
    private $groupName;
    private $beginYear;
    private $endYear;
    private $beginMonth;
    private $endMonth;

    /**
     *  Считывает состояние из таблицы group или записывает в нее строку.
     *
     * @param array $args  содержит id строки в таблице, которыую необходимо затронуть, или значения полей таблицы в следующем порядке: `abbreviation`, `groupname`, `begin_year`, `end_year`, `begin_month`, `end_month`..
     * @param string $flag  содержит строку-флаг, который определяет действие (READ,INSERT,UPDATE,DELETE)
     */
    public function Group($args,$flag)
    {
        switch ($flag) {
            case 'READ':{
                $sql="SELECT * FROM `group` WHERE id = ?";
                $stmt = ConnDB::getDbh()->prepare($sql);
                $stmt->execute(["$id"]);//выполняем запрос с подстановкой значения переменной $id в ?
                $row = $stmt->fetch();// записываем выборку в массив php
                // инициируем состояние класса Group
                $this->setId($row["id"]);
                $this->setAbbreviation($row["abbreviation"]);
                $this->setGroupName($row["groupName"]);
                $this->setBeginYear($row["beginYear"]);
                $this->setEndYear($row["endYear"]);
                $this->setBeginMonth($row["beginMonth"]);
                $this->setEndMonth($row["endMonth"]);
                break;}
            case 'INSERT':{
                $sql="INSERT INTO `group`(`abbreviation`, `groupname`, `begin_year`, `end_year`, `begin_month`, `end_month`) VALUES (?,?,?,?,?,?)";
                $stmt = ConnDB::getDbh()->prepare($sql);
                $stmt->execute($args);// выполняет запрос
                $this->setId(ConnDB::getDbh()->lastInsertId());//устанавливает значение id вставленной строки
                break;}
            case 'UPDATE':{
                // еще необходимо реализовать
                break;}
            case 'DELETE':{
                // еще необходимо реализовать
                break;}
        }

    }
        // еще необходимо реализовать метод обновляющий указанную строку в таблице и метод удаляющий указанную строку из таблицы.

    // геттеры, для считывания состояния объекта
    public function getId()
    {
        return $this->id;
    }

    public function getAbbreviation()
    {
        return $this->abbreviation;
    }

    public function getGroupName()
    {
        return $this->groupName;
    }

    public function getBeginYear()
    {
        return $this->beginYear;
    }

    public function getEndYear()
    {
        return $this->endYear;
    }

    public function getBeginMonth()
    {
        return $this->beginMonth;
    }

    public function getEndMonth()
    {
        return $this->endMonth;
    }

    // сеттеры, для изменения состояния объекта

    private function setId($id)
    {
         $this->id=$id;
    }

    private function setGroupName($groupName)
    {
         $this->groupName=$groupName;
    }
    private function setBeginYear($beginYear)
    {
         $this->beginYear=$beginYear;
    }
    private function setEndYear($endYear)
    {
         $this->endYear=$endYear;
    }
    private function setBeginMonth($beginMonth)
    {
         $this->beginMonth=$beginMonth;
    }
    private function setEndMonth($endMonth)
    {
         $this->endMonth=$endMonth;
    }
    private function setAbbreviation($abbreviation)
    {
         $this->abbreviation=$abbreviation;
    }

}
?>