<?php

class GroupController extends Controller{


    /**
     * Добывает список активных групп и оборачивает его в html
     * @return string  ответ сервера клиенту (браузеру)
     */
    public function getAllGroups_action(){
        $groupRepository=new GroupRepository();
        $listAllGroups=$groupRepository->listAllGroups();
        $response=$this->render("view/listGroups.php", array('list'=>$listAllGroups));
        return $response;
    }
    /**
     * Добывает информацию о группе и оборачивает ее в html
     * @param  int $id  идентификатор группы
     * @return string  ответ сервера клиенту (браузеру)
     */
    public function getGroup_action($id){
        $group=new Group($id,'READ');
        $studentRepository=new StudentRepository();
        $students=$studentRepository->getStudentsByGroup($id);
        $response=$this->render("view/showGroup.php", array('group'=>$group,'students'=>$students));
        return $response;
    }
    /**
     * Записывает информацию о новой группе в базу
     * @param массив $args содержит значения для полей в таблице group
     * (проследите последовательность полей согласно их расположению втаблице)
     */
    public function insertGroup_action($args){
        new Group($args,"INSERT");
        return $this->getAllGroups_action();
    }

    public function addGroup_action(){
        $response=$this->render("view/addGroup.php");
        return $response;
    }


}