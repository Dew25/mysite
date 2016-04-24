<?php
class Group{
    private $id;
    private $abbreviation;
    private $groupName;
    private $beginYear;
    private $endYear;
    private $beginMonth;
    private $endMonth;
    private $step;

    /**
     *  Считывает состояние из таблицы group или записывает, изменяет или удаляет строку таблицы.
     *
     * @param array $args  содержит id строки в таблице, которыую необходимо затронуть, или значения полей таблицы в следующем порядке: abbreviation, groupname, begin_year, end_year, begin_month, end_month, id.
     * @param string $flag  содержит строку-флаг, который определяет действие (READ,INSERT,UPDATE,DELETE)
     */
    public function __construct($args,$flag)
    {

        switch ($flag) {
            case 'READ':{
                $sql="SELECT `id`, `abbreviation`, `groupname`, `begin_year`, `end_year`, `begin_month`, `end_month` FROM `group` WHERE id=?";
                $dbh = ConnDB::getDbh();
                $stmt=$dbh->prepare($sql);
                $stmt->execute(["$args"]);//выполняем запрос с подстановкой значения переменной $id в ?
                $row = $stmt->fetch();// записываем выборку в массив php
                // инициируем состояние класса Group
                $this->setId($row["id"]);
                $this->setAbbreviation($row["abbreviation"]);
                $this->setGroupName($row["groupname"]);
                $this->setBeginYear($row["begin_year"]);
                $this->setEndYear($row["end_year"]);
                $this->setBeginMonth($row["begin_month"]);
                $this->setEndMonth($row["end_month"]);
                $this->setStep();
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
    public function getStep()
    {
        return $this->step;
    }

    // сеттеры, для изменения состояния объекта

    private function setId($value)
    {
         $this->id=$value;
    }

    private function setGroupName($value)
    {
         $this->groupName=$value;
    }
    private function setBeginYear($value)
    {
         $this->beginYear=$value;
    }
    private function setEndYear($value)
    {
         $this->endYear=$value;
    }
    private function setBeginMonth($value)
    {
         $this->beginMonth=$value;
    }
    private function setEndMonth($value)
    {
         $this->endMonth=$value;
    }
    private function setAbbreviation($value)
    {
         $this->abbreviation=$value;
    }
    public function setStep()
    {
        $year=date("Y");
        $month=date("n");
        $beginYear=(int)$this->getBeginYear();
        $endYear=(int)$this->getEndYear();

        if($beginYear<=$year AND $endYear>=$year){
            if($beginYear != $year){
                $step=(int)$year-(int)$beginYear;
            }else{
                $step=(int)$year-(int)$beginYear+1;
            }
            $this->step=$step;
        }
    }

}
