<?php

class AddTableCategory
{
    public static function addTable()
    {
        $categories = [
            'Математика',
            'Механика',
            'Информатика',
            'Физика',
            'Химия',
            'Технические науки',
            'Сельскохозяйственные науки',
            'Биология',
            'Медицина',
            'Экология',
            'География, Науки о земле',
            'Архитектура и строительство',
            'Филология и журналистика',
            'Искусствоведение',
            'Культурология',
            'Философия',
            'История',
            'Педагогика',
            'Психология',
            'Социология',
            'Экономика и управление',
            'Политология',
            'Международные отношения',
            'Правоведение',
            'Физическая культура и спорт'
        ];

        $link = Connect::getInstance()->getLink();
        try {
            $query = 'CREATE TABLE category (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                name VARCHAR(200),
                UNIQUE (name)
                );';
            $link->exec($query);
            echo "Category table created\n<br>";
            foreach($categories as $name){
                $category = new Category($name);
                $category->setCategory();
            }
            echo "All categories created\n<br>";
            $query = 'DROP TABLE article;';
            $link->exec($query);
            echo "article table dropped\n<br>";
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
                num_mag INT,
                first_page INT,
                last_page INT,
                category INT NOT NULL,
                FOREIGN KEY(category) REFERENCES category(id)
                );';
            $link->exec($query);
            echo "article table created\n<br>";
        }catch (Exception $e){
            echo $e->getMessage();
            return false;
        }
    }

    public static function down(){
        $link = Connect::getInstance()->getLink();
        try {
            $query = 'DROP TABLE category;';
            $link->exec($query);
            echo "category table dropped\n<br>";
        }catch (Exception $e){
            $e->getMessage();
            echo "\n<br>";
        }
    }
}