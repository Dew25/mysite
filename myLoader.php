<?php
//функция автозагрузки классов по требованию
    function myLoader($class_name){

        $myDirs=array(  'controller/',
                        'model/entity/',
                        'model/repository/',
                        'model/',
                        'route/',
                        'view/',
                        'utils/',
                        'app/',
                        'app/auth/'
                    );
        foreach($myDirs as $directory)
        {
            if(file_exists($directory.$class_name .'.php'))
            {
                require_once($directory.$class_name .'.php');
                return;
            }
        }
    }