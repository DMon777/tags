<?php

namespace App\Models;


class Model
{
    protected static $database_object;
    protected static $instance;

    public static function instance(){
        if(self::$instance instanceof self) {
            return self::$instance;
        }
        return self::$instance = new self;
    }


    protected function __construct(){
        self::$database_object = Database_Model::instance();
    }

    public function get_all_articles(){
        $sql = "SELECT * FROM articles";
        $result = self::$database_object->prepared_select($sql);

        foreach($result as $key => $val){
            $result[$key]['tags'] = $this->get_tags($val['id']);
        }

        return $result;
    }


    public function get_all_tags(){
        $sql = "SELECT * FROM tags";
        $result = self::$database_object->prepared_select($sql);
        return $result;

    }


    public function get_tags($article_id){
        $sql  = "SELECT title,href from tags JOIN articles_tags ON articles_tags.tag_id = tags.id WHERE articles_tags.article_id =".$article_id;
        $result = self::$database_object->prepared_select($sql);
        return $result;
    }


    public function get_article($id){
        $sql = "SELECT * FROM articles WHERE id=?";
        $result = self::$database_object->prepared_select($sql,array($id));
        return $result[0];
    }

    public function get_articles_by_tag($tag_name){
        $tag_id = $this->get_tag_id($tag_name);
        $tag_id = (int)$tag_id['id'];
        $sql = "SELECT * FROM articles JOIN articles_tags ON articles.id = articles_tags.article_id WHERE articles_tags.tag_id=".$tag_id;
        $result = self::$database_object->prepared_select($sql);
        return $result;
    }

    protected function get_tag_id($tag_name){
        $sql = "SELECT id FROM tags WHERE href='$tag_name'";

        $result = self::$database_object->prepared_select($sql);
        return $result[0];
    }




}