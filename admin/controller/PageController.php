<?php
class PageController{
    public function actionAddArticle(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

        }
        ViewAdmin::render('addArticle');
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