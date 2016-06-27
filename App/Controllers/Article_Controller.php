<?php

namespace App\Controllers;


class Article_Controller extends Base_Controller
{

    protected $article;
    protected $tags;


    protected function input($params = array()){
        parent::input();

        $this->article = $this->model_object->get_article($params['id']);

        $this->tags = $this->model_object->get_tags($params['id']);

    }

    protected function output(){

        $this->content = $this->render(array('article' => $this->article,'tags' => $this->tags),
            'App/Views/blocks/article_content');

        $this->page = parent::output();
    }




}