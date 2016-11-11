<?php
class PageController{
    public function actionAddArticle(){
        $output = '';

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $uploadDir = str_replace('admin'.DS, '', ROOT_DIR) .'upload'.DS;
                $article = new Article();
                if (isset($_POST['title_ru'])) $article->setTitleRu($_POST['title_ru']);
                if (isset($_POST['title_en'])) $article->setTitleEn($_POST['title_en']);
                if (isset($_POST['annotation_ru'])) $article->setAnnotationRu($_POST['annotation_ru']);
                if (isset($_POST['annotation_en'])) $article->setAnnotationEn($_POST['annotation_en']);
                if (isset($_POST['key_words_ru'])) $article->setKeyWordsRu($_POST['key_words_ru']);
                if (isset($_POST['key_words_en'])) $article->setKeyWordsEn($_POST['key_words_en']);
                if (isset($_POST['udk'])) $article->setUdk($_POST['udk']);
                if (isset($_POST['doi'])) $article->setDoi($_POST['doi']);
                if (isset($_POST['grnti'])) $article->setGrnti($_POST['grnti']);
                $article->setPubyear($_POST['pubyear']);
                $article->setNumMag($_POST['num_mag']);
//                var_dump($_POST);die();
                if (isset($_FILES['article']) && $_FILES['article']['error'] == UPLOAD_ERR_OK) {
                    $uploadArticle = $uploadDir . basename($_FILES['article']['name']);
                    if (move_uploaded_file($_FILES['article']['tmp_name'], $uploadArticle)) {
                        $article->setArticleLink($uploadArticle);
                        $output = "Статья успешно загружена.";
                    } else {
                        $output = "Не удалось загрузить файл статьи!";
                    }
                } else {
                    $output = "Не удалось загрузить файл статьи!";
                }
                if (isset($_FILES['article_prev']) && $_FILES['article_prev']['error'] == UPLOAD_ERR_OK) {
                    $uploadArticle = $uploadDir . basename($_FILES['article_prev']['name']);
                    if (move_uploaded_file($_FILES['article_prev']['tmp_name'], $uploadArticle)) {
                        $article->setPreviewLink($uploadArticle);
                        $output .= "Файл превью был успешно загружен.\n";
                    } else {
                        $output .= "Не удалось загрузить файл превью!\n";
                    }
                } else {
                    $output .= "Не удалось загрузить файл превью!\n";
                }
                try {
                    $article->addArticle();
                } catch (Exception $e) {
                    $output .= $e->getMessage();
                }
                $count = 1;
                while (isset($_POST['fio_ru' . $count]) || isset($_POST['fio_en' . $count]) || isset($_POST['current_job' . $count]) || isset($_POST['email' . $count])) {
                    $author = new Author();
                    if (isset($_POST['fio_ru' . $count])) $author->setFioRu($_POST['fio_ru' . $count]);
                    if (isset($_POST['fio_en' . $count])) $author->setFioEn($_POST['fio_en' . $count]);
                    if (isset($_POST['current_job' . $count])) $author->setCurrentJob($_POST['current_job' . $count]);
                    if (isset($_POST['email' . $count])) $author->setEmail($_POST['email' . $count]);
                    try {
                        $author->addAuthor();
                        var_dump($author);
                    } catch (Exception $e) {
                        $output .= $e->getMessage();
                        break;
                    }
                    $count++;
                }
        }
        ViewAdmin::render('addArticle', [
            'output' => $output
        ]);
        return true;
    }

    public function actionAddUser(){
        ViewAdmin::render('addUser');
    }
    public function actionAdmin(){
        ViewAdmin::render('login');
    }

    public function actionNotFound(){
        ViewAdmin::render('not-found');
    }
}