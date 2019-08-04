<?php

class Page{

    public $id;
    public $uri;
    public $parent;
    public $content;
    public $seo_title;
    public $seo_desc;
    public $canonical;
    public $robots;

    public function __construct($db){
        
        $this->uri = '/'.$_GET['uri'];
        //zmienić na '/projekty/new_cms/' => '/'
        if($_SERVER['REQUEST_URI'] == DEF_DIRECTORY.'/') $this->uri='/';
        $result = $db->query('SELECT * FROM `pages` WHERE `uri`= "'.$this->uri.'"');
        if($result!=NULL){
            //"/projekty/new_cms" do usunięcia gdy przeniose na hosting
            if($_SERVER['HTTP_HOST'] == 'localhost' || $_SERVER['HTTP_HOST'] == 'www.localhost') $this->uri =DEF_DIRECTORY.$this->uri;
            $this->id = $result['id'];
            $this->parent = $result['parent'];
            $this->content = $result['content'];
            $this->seo_title = $result['seo_title'];
            $this->seo_desc= $result['seo_desc'];
            $this->canonical = $result['canonical'];
            $this->robots = $result['robots'];
        }else{
            header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
            die();   
        }
    }

    public function genrate_seo($print=TRUE){
        $meta_seo='';

        $meta_seo .= "<title>$this->seo_title</title>\r\n";
        $meta_seo .= "<meta name='description' content='$this->seo_desc'>\r\n";

        if(isset($this->robots) && $this->robots!='')
            $meta_seo .= "<meta name='robots' content='$this->robots'>\r\n";

        if(isset($this->robots) && !strstr($this->robots,'noindex'))
            $meta_seo .= "<link rel='canonical' href='$this->canonical' />\r\n";

        if($print) echo $meta_seo;
        else return $meta_seo;
    }

    public function genrate_nav($print=TRUE){
        $nav='';

        

        if($print) echo $nav;
        else return $nav;
    }

}

?>