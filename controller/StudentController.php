<?php

class StudentController extends Controller{



    /**
     * Добывает список активных групп и оборачивает его в html
     * @return string  ответ сервера клиенту (браузеру)
     */
    public function showStudent_action($id){
        $student=new Student($id,'READ');
        $response=$this->render("view/showStudent.php", array('student'=>$student));
        return $response;
    }



    }