<?php
class PageController{
    public function actionIndex(){
        $breadcrums = ['Главная'];
        View::render('main', ['breadArr' => $breadcrums]);
        return true;
    }

    public function actionAbout(){
        $breadcrums = ['Главная', 'О журнале'];
        View::render('about', ['breadArr' => $breadcrums]);
    }

    public function actionArch($params = null){
        if(!empty($params)){
            $year = array_keys($params)[0];
            $release = $params[$year];
            $allReleases = DataForMeta::getAllReleases();
            if(count($params) === 1) {
                $releaseObject = new DataForMeta($year, $release);
                $releaseArticles = $releaseObject->getArticle();
                $breadcrums = ['Главная', 'Архив', $year];
                View::render('arch', [
                    'breadArr' => $breadcrums,
                    'articles' => $releaseArticles,
                    'allReleases' => $allReleases,
                    'pubyear' => $year,
                    'num_mag' => $release
                ]);
            }elseif(count($params) == 2){
                $id_article = $params['article'];
                $article = DataForMeta::getArticleById($id_article);
                $breadcrums = ['Главная', 'Архив', $year];
                View::render('article',[
                    'breadArr' => $breadcrums,
                    'allReleases' => $allReleases,
                    'pubyear' => $year,
                    'num_mag' => $release,
                    'article' => $article
                ]);
            }
        }else{
            /**
             * @var $pubyear integer
             * @var $num_mag integer
             */
            $latest = DataForMeta::getLatestRelease();
            extract($latest[0]);
            header("Location: /page/arch/$pubyear/$num_mag", true, 303);
        }
    }

    public function actionContacts(){
        $breadcrums = ['Главная', 'Контакты'];
        View::render('contacts', ['breadArr' => $breadcrums]);
    }

    public function actionEditorialBoard(){
        $breadcrums = ['Главная', 'Редакция'];
        View::render('editorial-board', ['breadArr' => $breadcrums]);
    }

    public function actionEditorialPolicies(){
        $breadcrums = ['Главная', 'Порядок рассмотрения'];
        View::render('editorial-policies', ['breadArr' => $breadcrums]);
    }

    public function actionGuideForAuthors(){
        $breadcrums = ['Главная', 'Гайд для авторов'];
        View::render('guide-for-authors', ['breadArr' => $breadcrums]);
    }

    public function actionPayment(){
        $breadcrums = ['Главная', 'Условия оплаты'];
        View::render('payment', ['breadArr' => $breadcrums]);
    }

    public function actionPublicationEthics(){
        $breadcrums = ['Главная', 'Этика публикаций'];
        View::render('publication-ethics', ['breadArr' => $breadcrums]);
    }

    public function actionArticleLoadOk(){
        $breadcrums = ['Главная', 'Опубликовать статью', 'Статья опубликована'];
        View::render('article-load-ok', ['breadArr' => $breadcrums]);
    }

    public function actionArticleLoadError(){
        $breadcrums = ['Главная', 'Опубликовать статью', 'Ошибка публикации'];
        View::render('article-load-error', ['breadArr' => $breadcrums]);
    }

    public function actionServices(){
        $breadcrums = ['Главная', 'Опубликовать статью'];
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
        View::render('services', ['breadArr' => $breadcrums]);
    }
    public function actionNotFound(){
        $breadcrums = ['Главная', 'Страница не найдена'];
        View::render('not-found', ['breadArr' => $breadcrums]);
    }

    public function actionPayok(){
        $breadcrums = ['Главная', 'Условия оплаты', 'Оплата успешно проведена'];
        View::render('payok', ['breadArr' => $breadcrums]);
    }

    public function actionDoi(){
        $breadcrums = ['Главная', 'Условия оплаты', 'DOI'];
        View::render('doi', ['breadArr' => $breadcrums]);
    }

    public function actionOpenAccess(){
        $breadcrums = ['Главная', 'Условия оплаты', 'Авторский взнос и информация об авторских правах'];
        View::render('open-access', ['breadArr' => $breadcrums]);
    }

    public function actionAffiliate(){
        $breadcrums = ['Главная', 'Условия оплаты', 'Партнерская программа'];
        View::render('affiliate', ['breadArr' => $breadcrums]);
    }
}