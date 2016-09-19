<?php
class PageController{
    public function actionIndex(){
        View::render('main');
        return true;
    }

    public function actionAbout(){
        View::render('about');
    }

    public function actionArch(){
        View::render('arch');
    }

    public function actionContacts(){
        View::render('contacts');
    }

    public function actionEditorialBoard(){
        View::render('editorial-board');
    }

    public function actionEditorialPolicies(){
        View::render('editorial-policies');
    }

    public function actionGuideForAuthors(){
        View::render('guide-for-authors');
    }

    public function actionPayment(){
        View::render('payment');
    }

    public function actionPublicationEthics(){
        View::render('publication-ethics');
    }

    public function actionServices(){
        View::render('services');
    }
    public function actionNotFound(){
        View::render('not-found');
    }
}