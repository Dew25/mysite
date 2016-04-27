<?php

class StudentController{

    private $renderTemplate;

    public function __construct(){
        $this->renderTemplate=new RenderTemplate();
    }
    /**
     * метод, который оборачивает данные в html
     * @param String $path - путь к шаблону html
     * @param mixin $data - объект или массив с данными, которые будут доступны в шаблоне.
     * @return строка содержащая данные, обернутые в html
     */
    private function renderTemplate($path, $data = null){
        // echo "<pre>";
        // var_dump($data);
        // echo "</pre>";
        ob_start();
        require $path;
        $html=ob_get_clean();
        return $html;
    }
    /**
     * Добывает список активных групп и оборачивает его в html
     * @return string  ответ сервера клиенту (браузеру)
     */
    public function showStudent_action($id){
        $student=new Student($id,'READ');
        $response=$this->renderTemplate->render("view/showStudent.php", array('student'=>$student));
        return $response;
    }



    }