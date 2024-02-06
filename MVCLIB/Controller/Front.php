<?php
class Controller_Front{
    public function init(){
        $request=new Model_Request();
        $uri=$request->getRequestUri();
        echo $uri;
        $className="View".ucwords(str_replace('/','_',$uri),'_');
        // echo $className;
        $layout = new $className();
        $layout->toHtml();

    }

}