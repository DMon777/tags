<?php
namespace App\Controllers;

use App\Models\Navigation;
class Tags_Controller extends Base_Controller
{

    protected $articles;
    protected $tag;
    protected $current_page;
    protected $total_posts;
    protected $navigation;
    protected $navigation_object;
    protected $table_name = 'articles';
    protected $href;



    protected function input($params = array()){
        parent::input();

        $this->tag = $params['title'];
        $this->href = 'tags/title/'.$this->tag;
        $this->current_page = $params['page'] ?? 1;
        $this->navigation_object = new Navigation($this->current_page,$this->table_name);

        $this->total_posts = $this->navigation_object->count_articles_by_tags($this->tag);
        $this->articles = $this->navigation_object->get_articles_by_tag($this->tag);

        //$this->articles = $this->model_object->get_articles_by_tag($this->tag);

        $this->navigation = $this->navigation_object->get_navigation($this->total_posts);


    }

    protected function output(){

        $this->content = $this->render(array('articles' => $this->articles,'navigation' => $this->navigation,'href' => $this->href),
            'App/Views/blocks/articles_content');

        $this->page = parent::output();
    }




}