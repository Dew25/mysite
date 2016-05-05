<?php
class Filter{


    public function filterId(){
        return filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
    }

    public function filterInsertGroup(){
        $args = array(
            'abbreviation'   => FILTER_SANITIZE_STRING,
            'groupname'    => FILTER_SANITIZE_STRING,
            'begin_year'     => FILTER_VALIDATE_INT,
            'end_year' => FILTER_VALIDATE_INT,
            'begin_month'   => FILTER_VALIDATE_INT,
            'end_month'    => FILTER_VALIDATE_INT
        );
        return filter_input_array(INPUT_POST, $args);
    }

    public function filterGetUri()
    {
        return filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_STRING);
    }
    public function filterLoginPass()
    {
        $args = array(
            'login'   => FILTER_SANITIZE_STRING,
            'pass'    => FILTER_SANITIZE_STRING,
        );
        return filter_input_array(INPUT_POST,$args);
    }

}