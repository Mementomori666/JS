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

    public function actionArticleLoadOk(){
        View::render('article-load-ok');
    }

    public function actionArticleLoadError(){
        View::render('article-load-error');
    }

    public function actionServices(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            var_dump($_POST);
            var_dump($_FILES);
            $mailer = new JPhpMailer();
            $mailer->Subject = 'test';
            $mailer->Body = 'test';
            $mailer->AddAddress('drilnmain@gmail.com');
            if(!$mailer->Send())
            {
                echo 'Не могу отослать письмо!';
            }
            else
            {
                echo 'Письмо отослано!';
            }
            $mailer->ClearAddresses();
            $mailer->ClearAttachments();
        }
        View::render('services');
    }
    public function actionNotFound(){
        View::render('not-found');
    }

    public function actionPayok(){
        View::render('payok');
    }

    public function actionDoi(){
        View::render('doi');
    }

    public function actionOpenAccess(){
        View::render('open-access');
    }

    public function actionAffiliate(){
        View::render('affiliate');
    }
}