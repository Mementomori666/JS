<?php
class PageController{
    public function actionIndex(){
        $breadcrums = ['Главная'];
        return View::renderPhpFile('main', ['breadArr' => $breadcrums]);
    }

    public function actionAbout(){
        $breadcrums = ['Главная', 'О журнале'];
        return View::renderPhpFile('about', ['breadArr' => $breadcrums]);
    }

    public function actionArch($params = null){
        if(!empty($params)){
            $year = array_keys($params)[0];
            $release = $params[$year];
            $allReleases = DataForMeta::getAllReleases();
            $GLOBALS['headers'] .= '<meta name="citation_journal_title" content="Juvenis scientia">';
            $GLOBALS['headers'] .= '<meta name="citation_issn" content="2414-3782">';
            $GLOBALS['headers'] .= '<meta name="citation_eissn" content="2414-3790">';
            $GLOBALS['headers'] .= '<meta name="citation_publication_date" content="'. $year . '""> ';
            $GLOBALS['headers'] .= '<meta name="citation_issue" content="' . $release . '""> ';
            if(count($params) === 1) {
                $releaseObject = new DataForMeta($year, $release);
                $releaseArticles = $releaseObject->getArticle();
                $breadcrums = ['Главная', 'Архив', $year];
                return View::renderPhpFile('arch', [
                    'breadArr' => $breadcrums,
                    'articles' => $releaseArticles,
                    'allReleases' => $allReleases,
                    'pubyear' => $year,
                    'num_mag' => $release
                ]);
            }elseif(count($params) == 2){
                $id_article = $params['article'];
                $article = DataForMeta::getArticleById($id_article);
                $keywords = '';
                if(isset($article['key_words_ru']) || isset($article['key_words_en'])){
                    $keywords .= ($article['key_words_ru'])? $article['key_words_ru'] : '';
                    if(isset($article['key_words_ru']) || isset($article['key_words_en'])) $keywords .= ', ';
                    $keywords .= ($article['key_words_en'])? $article['key_words_en'] : '';
                }
                if($keywords != '') {
                    $GLOBALS['headers'] .= '<meta name="citation_keywords" content="' . $keywords . '"> ';
                }
                if(isset($article['title_ru'])){
                    $GLOBALS['headers'] .= '<meta name="citation_title" content="' . $article['title_ru'] . '"> ';
                }
                if(isset($article['title_en'])){
                    $GLOBALS['headers'] .= '<meta name="citation_title" content="' . $article['title_en'] . '"> ';
                }
                $GLOBALS['headers'] .= '<meta name="citation_lastpage" content="' . $article['last_page'] . '"> ';
                $article_link = explode(ROOT_DIR, $article['article_link'])[1];
                $article_link = 'http://jscientia.org/'.str_replace('\\', '/', $article_link);
                $preview_link = explode(ROOT_DIR, $article['preview_link'])[1];
                $preview_link = 'http://jscientia.org/'.str_replace('\\', '/', $preview_link);
                $GLOBALS['headers'] .= '<meta name="citation_pdf_url" content="' . $article_link . '"> ';
                $GLOBALS['headers'] .= '<meta name="citation_fulltext_html_url" content="' . $preview_link . '"> ';
                $GLOBALS['headers'] .= '<meta name="citation_firstpage" content="' . $article['first_page'] . '"> ';
                $GLOBALS['headers'] .= '<meta name="citation_lastpage" content="' . $article['last_page'] . '"> ';
                foreach($article['authors'] as $author){
                    if(isset($author['fio_ru'])) {
                        $GLOBALS['headers'] .= '<meta name="citation_author" content="' . $author['fio_ru'] . '"> ';
                    }
                    if(isset($author['fio_en'])) {
                        $GLOBALS['headers'] .= '<meta name="citation_author" content="' . $author['fio_en'] . '"> ';
                    }
                }
                $breadcrums = ['Главная', 'Архив', $year];
                return View::renderPhpFile('article',[
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
        return View::renderPhpFile('contacts', ['breadArr' => $breadcrums]);
    }

    public function actionEditorialBoard(){
        $breadcrums = ['Главная', 'Редакция'];
        return View::renderPhpFile('editorial-board', ['breadArr' => $breadcrums]);
    }

    public function actionEditorialPolicies(){
        $breadcrums = ['Главная', 'Порядок рассмотрения'];
        return View::renderPhpFile('editorial-policies', ['breadArr' => $breadcrums]);
    }

    public function actionGuideForAuthors(){
        $breadcrums = ['Главная', 'Гайд для авторов'];
        return View::renderPhpFile('guide-for-authors', ['breadArr' => $breadcrums]);
    }

    public function actionPayment(){
        $breadcrums = ['Главная', 'Условия оплаты'];
        return View::renderPhpFile('payment', ['breadArr' => $breadcrums]);
    }

    public function actionPublicationEthics(){
        $breadcrums = ['Главная', 'Этика публикаций'];
        return View::renderPhpFile('publication-ethics', ['breadArr' => $breadcrums]);
    }

    public function actionArticleLoadOk(){
        $breadcrums = ['Главная', 'Опубликовать статью', 'Статья опубликована'];
        return View::renderPhpFile('article-load-ok', ['breadArr' => $breadcrums]);
    }

    public function actionArticleLoadError(){
        $breadcrums = ['Главная', 'Опубликовать статью', 'Ошибка публикации'];
        return View::renderPhpFile('article-load-error', ['breadArr' => $breadcrums]);
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
        return View::renderPhpFile('services', ['breadArr' => $breadcrums]);
    }
    public function actionNotFound(){
        $breadcrums = ['Главная', 'Страница не найдена'];
        return View::renderPhpFile('not-found', ['breadArr' => $breadcrums]);
    }

    public function actionPayok(){
        $breadcrums = ['Главная', 'Условия оплаты', 'Оплата успешно проведена'];
        return View::renderPhpFile('payok', ['breadArr' => $breadcrums]);
    }

    public function actionDoi(){
        $breadcrums = ['Главная', 'Условия оплаты', 'DOI'];
        return View::renderPhpFile('doi', ['breadArr' => $breadcrums]);
    }

    public function actionOpenAccess(){
        $breadcrums = ['Главная', 'Условия оплаты', 'Авторский взнос и информация об авторских правах'];
        return View::renderPhpFile('open-access', ['breadArr' => $breadcrums]);
    }

    public function actionAffiliate(){
        $breadcrums = ['Главная', 'Условия оплаты', 'Партнерская программа'];
        return View::renderPhpFile('affiliate', ['breadArr' => $breadcrums]);
    }
}