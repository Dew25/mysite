<?php

class StudentController{

        public function __construct(){
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
            $response=$this->renderTemplate("view/showStudent.php", array('student'=>$student));
            return $response;
        }
        public function addStudent_action(){
           
            $repo=new GroupRepository();

            $rows=$repo->listAllGroups();
            $response=$this->renderTemplate("view/addStudent.php", array('rows'=>$rows));
            return $response;
        }
        public function insertStudent_action($args){
           $country=new Country($args['country'],'INSERT');
                $addCity=array($args['city'],$country->getId());
           $city=new Sity($addCity,'INSERT');
                $addAddress=array($args['street'],$args['house'],$args['room'],$sity->getId());
           $address=new Address($addAddress,'INSERT');
                $person=array($args[''])
            $student=new Student($id,'READ');
            $response=$this->renderTemplate("view/showStudent.php", array('student'=>$student));
            return $response;
        }


    }