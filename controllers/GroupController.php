<?php

class GroupController{

        public function __construct(){
        }
        /**
         * метод, который оборачивает данные в html
         * @param String $path - путь к шаблону html
         * @param mix $data - объект или массив с данными, которые будут доступны в шаблоне.
         * @return строка содержащая данные, обернутые в html
         */
        private function renderTemplate($path, $data)
        {
            // echo "<pre>";
            // var_dump($data);
            // echo "</pre>";
            ob_start();
            require $path;
            $html=ob_get_clean();
            return $html;
        }
        public function getAllGroups_action(){
            $repositoryGroup=new RepositoryGroup();
            $listAllGroups=$repositoryGroup->listAllGroups();
            $response=$this->renderTemplate("view/listGroups.php", array('list'=>$listAllGroups));
            return $response;
        }
        /**
         * Добывает информацию о группе и оборачивает ее в html
         * @param  int $id  идентификатор группы
         * @return string  ответ сервера клиенту (браузеру)
         */
        public function getGroup_action($id){
            $group=new Group($id,'READ');
            $response=$this->renderTemplate("view/showGroup.php", $group);
            return $response;
        }
        /**
         * Записывает информацию о новой группе в базу
         * @param массив $args содержит значения для полей в таблице group (проследите последовательность полей согласно их расположению втаблице)
         */
        public function setGroup_action($args){
            $group=new Group($args,"INSERT");
        }


    }