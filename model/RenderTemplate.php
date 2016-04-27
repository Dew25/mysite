<?php
class RenderTemplate{

    public function render($path, $data = null){
        // echo "<pre>";
        // var_dump($data);
        // echo "</pre>";
        ob_start();
        require $path;
        $html=ob_get_clean();

        return $html;
    }
}