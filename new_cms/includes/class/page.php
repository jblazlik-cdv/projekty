<?php

class Page{

    public $id;
    public $uri;
    public $parent;
    public $content;

    public function __construct($db){
        
        $this->uri = '/'.$_GET['uri'];
        //zmienić na '/projekty/new_cms/' => '/'
        if($_SERVER['REQUEST_URI'] == '/projekty/new_cms/') $this->uri='/';
        $result = $db->query('SELECT * FROM `pages` WHERE `uri`= "'.$this->uri.'"');
        if($result!=NULL){
            //"/projekty/new_cms" do usunięcia gdy przeniose na hosting
            if($_SERVER['HTTP_HOST'] == 'localhost' || $_SERVER['HTTP_HOST'] == 'www.localhost') $this->uri ='/projekty/new_cms'.$this->uri;
            $this->id = $result['id'];
            $this->parent = $result['parent'];
            $this->content = $result['content'];
        }else{
            header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
            die();
            
        }
    }

}

?>