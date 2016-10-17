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
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $paramsForAuthor['fio'] = $paramsForAdmin['fio'] = htmlspecialchars(trim($_POST['fio']));
            $paramsForAuthor['article_name'] = $paramsForAdmin['article_name']
                = htmlspecialchars(trim($_POST['article_name']));
            $paramsForAdmin['email'] = htmlspecialchars(trim($_POST['email']));
            $paramsForAdmin['phone'] = htmlspecialchars(trim($_POST['phone']));
            $paramsForAdmin['section'] = htmlspecialchars(trim($_POST['section']));
            $paramsForAdmin['language'] = htmlspecialchars(trim($_POST['language']));
            if(isset($_POST['message'])) $paramsForAdmin['message'] = htmlspecialchars(trim($_POST['message']));
            if(isset($_POST['doi'])) $paramsForAdmin['doi'] = htmlspecialchars(trim($_POST['doi']));
            if(isset($_POST['eSertificate']))
                $paramsForAdmin['eSertificate'] = htmlspecialchars(trim($_POST['eSertificate']));
            if(isset($_POST['pSertificate']))
                $paramsForAdmin['pSertificate'] = htmlspecialchars(trim($_POST['pSertificate']));
            if(isset($_POST['journal'])) $paramsForAdmin['journal'] = htmlspecialchars(trim($_POST['journal']));

            $mailToAdmin = new JPhpMailer();
            $mailToAdmin->Subject = 'На публикацию поступила новая статья в журнал jscientia';
            $mailToAdmin->Body = View::renderPhpFile('mail_service_to_admin', $paramsForAdmin);
            $mailToAdmin->AddAddress(ADMIN_MALE);
            if (isset($_FILES['info']) &&
                $_FILES['info']['error'] == UPLOAD_ERR_OK) {
                $mailToAdmin->AddAttachment($_FILES['info']['tmp_name'],
                    $_FILES['info']['name']);
            }
            if (isset($_FILES['article']) &&
                $_FILES['article']['error'] == UPLOAD_ERR_OK) {
                $mailToAdmin->AddAttachment($_FILES['article']['tmp_name'],
                    $_FILES['article']['name']);
            }
            if(!$mailToAdmin->Send())
            {
                echo 'Не могу отослать письмо!';
            }
            else
            {
                echo 'Письмо отослано!';
            }
            $mailToAdmin->ClearAddresses();
            $mailToAdmin->ClearAttachments();

            $mailToAuthor = new JPhpMailer();
            $mailToAuthor->Subject = 'Статья получена редакцией';
            $mailToAuthor->Body = View::renderPhpFile('mail_service_to_author', $paramsForAuthor);
            $mailToAuthor->AddAddress(htmlspecialchars(trim($_POST['email'])));
            if(!$mailToAuthor->Send())
            {
                echo 'Не могу отослать письмо!';
            }
            else
            {
                echo 'Письмо отослано!';
            }
            $mailToAuthor->ClearAddresses();
            $mailToAuthor->ClearAttachments();
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