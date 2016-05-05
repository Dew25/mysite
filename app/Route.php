<?php
class Route{
    private $filter;
    public function __construct(){
        $this->filter=new Filter();
    }
    public function response(){
        $groupController=new GroupController();
        $studentController=new StudentController();
        $request=new Request();
        $uri=$request->getUri();
        switch ($uri){
            case Application::URI_PREFIX.'/':
                    $response=$groupController->getAllGroups_action();
                break;
            case Application::URI_PREFIX.'/showgroup/':
                $response=$groupController->getGroup_action($this->filter->filterId());
                break;
            case Application::URI_PREFIX.'/addgroup/':
                $response=$groupController->addGroup_action();
                break;
            case Application::URI_PREFIX.'/insertgroup/':
                $response=$groupController->insertGroup_action($this->filter->filterInsertGroup());
                break;
            case Application::URI_PREFIX.'/showstudent/':
                $response=$studentController->showStudent_action($this->filter->filterId());
                break;
            default:
                $response=$groupController->getAllGroups_action();
                break;
        }
        return $response;
    }

}