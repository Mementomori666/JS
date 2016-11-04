<?php


class AddTablesArticleAuthor{
    public static function addTables(){
        $link = Connect::getInstance()->getLink();
        try {
            $query = 'CREATE TABLE article (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                title_ru VARCHAR(200),
                title_en VARCHAR(200),
                annotation_ru TEXT,
                annotation_en TEXT,
                key_words_ru TEXT,
                key_words_en TEXT,
                udk VARCHAR (50),
                grnti VARCHAR (50),
                doi TEXT,
                article_link TEXT,
                preview_link TEXT,
                pubyear INT,
                num_mag INT
                );';
            $link->exec($query);
            echo "article table created\n<br>";
        }catch(Exception $e){
            echo $e->getMessage();
            echo "\n<br>";
        }
        try{
            $query = 'CREATE TABLE author(
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                fio_ru VARCHAR (150),
                fio_en VARCHAR (150),
                current_job TEXT,
                email VARCHAR (100),
                article_id INTEGER NOT NULL,
                FOREIGN KEY(article_id) REFERENCES article(id)
                );';
            $link->exec($query);
            echo 'author table created';
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public static function down(){
        $link = Connect::getInstance()->getLink();
        try {
            $query = 'DROP TABLE article;';
            $link->exec($query);
            echo "article table dropped\n<br>";
        }catch (Exception $e){
            $e->getMessage();
            echo "\n<br>";
        }
        try {
            $query = 'DROP TABLE author;';
            $link->exec($query);
            echo 'author table dropped';
        }catch (Exception $e){
            echo $e->getMessage();
        }
    }
}