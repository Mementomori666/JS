<?php

class Category
{
    private $name;

    /**
     * Category constructor.
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getCategoryById($id){
        try{
            $link = Connect::getInstance()->getLink();
            $prepare = 'SELECT name FROM category where id = :id';
            $query = $link->prepare($prepare);
            $query->execute(['id' => $id]);
            $result = $link->fetchAll();
            return $result[0];
        }catch (Exception $e){
            echo $e->getMessage();
            return false;
        }
    }

    public function setCategory(){
        try{
            $link = Connect::getInstance()->getLink();
            $result = $link->exec("INSERT INTO category (name) VALUES ('{$this->name}');");
            if($result == 0) return -1; //на случай дубля категории
            return true;
        }catch (Exception $e){
            echo $e->getMessage();
            return false;
        }
    }

    public static function getCategoryForDropDown(){
        $data = '';
        try{
            $link = Connect::getInstance()->getLink();
            $sql = 'SELECT * FROM category';
            $result = $link->query($sql, PDO::FETCH_ASSOC);
            $result = $result->fetchAll();
        }catch(Exception $e){
            echo $e->getMessage();
            return false;
        }
        foreach($result as $category){
            $name = mb_strtoupper(mb_substr($category['name'], 0, 1, 'UTF-8'), 'UTF-8') .
                mb_substr($category['name'], 1, mb_strlen($category['name'], 'UTF-8'), 'UTF-8');
            $data .= "<option value=$category[id]>$name</option>";
        }
        return $data;
    }
}