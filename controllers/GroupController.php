<?php

    class GroupController{

        public function GroupController(){
        }
        /**
         * метод, который оборачивает данные в html
         * @param String $path - путь к шаблону html
         * @param Group $group - экземпляр класа Group с соответствующим состоянием.
         */
        private function renderTemplate($path, Group $group)
        {
            ob_start();
            require $path;
            $html=ob_get_clean();
            return $html;
        }

        public function getGroup($id){
            $group=new Group($id,null);
            $response=$this->renderTemplate("<Здесь указываем путь к файлу с видом>",$group);
            return $response;
        }
        public function setGroup($args){
            $group=new Group(null,$args);
        }

    }
?>