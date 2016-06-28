<?php
namespace App\Controllers;


use App\Models\Navigation;

class Articles_Controller extends Base_Controller
{

    protected $articles;
    protected $total_posts;
    protected $navigation;
    protected $navigation_object;
    protected $table_name = 'articles';
    protected $current_page;

    protected $href = "articles";


    protected function input($params = array()){
        parent::input();

        $this->current_page = $params['page'] ?? 1;
        $this->navigation_object = new Navigation($this->current_page,$this->table_name);
        $this->total_posts = $this->navigation_object->count_articles();

        $this->navigation = $this->navigation_object->get_navigation($this->total_posts);

        $this->articles = $this->navigation_object->get_articles();


    }

    protected function output(){

        $this->content = $this->render(array('articles' => $this->articles,'navigation' => $this->navigation,'href' => $this->href),
            'App/Views/blocks/articles_content');

        $this->page = parent::output();
    }




}