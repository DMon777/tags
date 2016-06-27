<?php
namespace App\Controllers;


class Tags_Controller extends Base_Controller
{

    protected $articles;
    protected $tag;
    protected $current_page;


    protected function input($params = array()){
        parent::input();

        $this->tag = $params['title'];

        $this->articles = $this->model_object->get_articles_by_tag($this->tag);

        $this->current_page = $params['page'];



    }

    protected function output(){

        $this->content = $this->render(array('articles' => $this->articles),
            'App/Views/blocks/tags_content');

        $this->page = parent::output();
    }




}