<?php
namespace App\Controllers;
use App\Models\Model;



class Base_Controller extends Main_Controller
{

    protected $all_tags;

    protected function input($params = array()){

            $this->model_object = Model::instance();

            $this->all_tags = $this->model_object->get_all_tags();

        $this->scripts = ['jQuery','jquery.tagcloud','test'];

    }

    protected function output(){

        $this->header = $this->render(array('title'       => $this->title,
            'description' => $this->description,
            'keywords'    => $this->keywords,
            'menu'        => $this->menu,
            'scripts'     => $this->scripts),
            'App/Views/blocks/header');

        $this->footer = $this->render(array(),'App/Views/blocks/footer');

        $this->left_content = $this->render(array('all_tags' => $this->all_tags),
            'App/Views/blocks/left_content');

        $page = $this->render(array('header'        => $this->header,
            'footer'        => $this->footer,
            'content'       => $this->content,
            'left_content' => $this->left_content),
            'App/Views/blocks/base_template');
        return $page;

    }

}