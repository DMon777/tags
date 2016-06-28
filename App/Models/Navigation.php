<?php
/**
 * Created by PhpStorm.
 * User: Дима
 * Date: 27.06.2016
 * Time: 23:57
 */

namespace App\Models;


class Navigation
{

    protected $posts_by_one_page = 1;
    protected  $links_by_sides = 3;
    protected $current_page;
    protected $table_name;
    protected static $database_object;

    public function __construct($current_page,$table_name){
        $this->current_page = $current_page;
        $this->table_name = $table_name;
        self::$database_object = Database_Model::instance();
    }

    public function get_navigation($total_posts){

        $total_pages = ceil($total_posts/$this->posts_by_one_page);

        $navigation_array  = array();

        if($this->current_page != 1){
            $navigation_array['first'] = 1;
            $navigation_array['arrow_back'] = $this->current_page-1;
        }

        if($this->current_page > $this->links_by_sides + 1){
            for($i = $this->current_page - $this->links_by_sides;$i < $this->current_page;$i++){
                $navigation_array['previous'][] = $i;
            }
        }

        else{
            for($i = 1;$i < $this->current_page;$i++){
                $navigation_array['previous'][] = $i;
            }
        }

        $navigation_array['current'] = (int)$this->current_page;

        if($this->current_page+$this->links_by_sides < $total_pages){
            for($i = $this->current_page + 1;$i <= $this->current_page+$this->links_by_sides;$i++){
                $navigation_array['next'][] = $i;
            }
        }

        else{
            for($i = $this->current_page+1;$i <= $total_pages;$i++){
                $navigation_array['next'][] = $i;
            }
        }

        if($this->current_page != $total_pages){
            $navigation_array['arrow_forward'] = $this->current_page + 1;
            $navigation_array['last_page'] = $total_pages;
        }

        return $navigation_array;

    }

    public function get_articles(){

        $shift = $this->posts_by_one_page*($this->current_page - 1);
        $sql = "SELECT * FROM articles LIMIT $shift,$this->posts_by_one_page";
        $result = self::$database_object->prepared_select($sql);

        foreach($result as $key => $val){
            $result[$key]['tags'] = Model::instance()->get_tags($val['id']);
        }
        return $result;

    }

    public function get_articles_by_tag($tag_name){
        $shift = $this->posts_by_one_page*($this->current_page - 1);
        $tag_id = $this->get_tag_id($tag_name);
        $tag_id = (int)$tag_id['id'];
        $sql = "SELECT * FROM articles JOIN articles_tags ON articles.id = articles_tags.article_id WHERE articles_tags.tag_id=".$tag_id." LIMIT $shift,$this->posts_by_one_page";
        $result = self::$database_object->prepared_select($sql);

        foreach($result as $key => $val){
            $result[$key]['tags'] = Model::instance()->get_tags($val['id']);
        }
        return $result;
    }

    public function count_articles(){
        $sql = "SELECT COUNT(*) as count from articles";
        return (int)self::$database_object->prepared_select($sql)[0]['count'];
    }

    public function count_articles_by_tags($tag_name){
        $tag_id = $this->get_tag_id($tag_name);
        $tag_id = (int)$tag_id['id'];
        $sql = "SELECT COUNT(*) as count FROM articles  JOIN articles_tags ON articles.id = articles_tags.article_id WHERE articles_tags.tag_id=".$tag_id;
        $result = self::$database_object->prepared_select($sql);
        return (int)$result[0]['count'];
    }

    protected function get_tag_id($tag_name){
        $sql = "SELECT id FROM tags WHERE href='$tag_name'";
        $result = self::$database_object->prepared_select($sql);
        return $result[0];
    }




}