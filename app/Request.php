<?php
class Request{
private $filter;
public function __construct(){
    $this->filter=new Filter();
}
    public function getUri()
    {
        $uri=$this->filter->filterGetUri();
        $s = explode('?', $uri);
        $uri = $s[0];
        //echo $uri=rtrim($uri,'/');
        $posSlash=strrpos($uri,'/');
        $lengthUri=strlen($uri);
        if($posSlash < $lengthUri-1){
            $uri=$uri.'/';
        }
        return $uri;
    }
}