<?php
/**
 * @var $articles array
 * @var $allReleases array
 */
?>

<div id="Layer1">
    <div id="Layer1_Container">
        <div class="arch_menu" id="archMenu">
            <?php
            $str = '';
            foreach ($allReleases as $year){
                $str .= '<div class="arch_menu_one_year">';
                $str .= '<div class="arch_menu_year_text">' . $year['pubyear'] . ' год </div>';
                foreach($year['releases'] as $release){
                    $str .= '<a class="arch_menu_link"
                        href="/page/arch/' .$year['pubyear'] . '/' . $release['num_mag'] . '"> выпуск № '
                        . $release['num_mag'] . '</a>';
                    $str .= ' ';
                }
                $str .= '</div>';
            }
            echo $str;
            ?>
        </div>
        <div class="arch_content" id="archContent">
            <h1 class="arch_content_title">Juvenis scientia <?=$pubyear . ' №' . $num_mag ?></h1>
            <?php
            $str = '';
            foreach ($articles as $cat_name => $category) {
                $str .= '<div class = "arch_content_category_block">';
                $str .= '<div class = "arch_content_category_name"><span class="cat_font text_bold">' . $cat_name . '</span></div>';
                foreach ($category as $article) {
                    $str .= '<div class="arch_content_article">';
                    if (isset($article['title_ru'])) $str .= '<div class="article_title text_font"><a class = "arch_content_article_title" href="/page/arch/' .
                        $pubyear . '/' . $num_mag . '/article/' . $article['id'] . '">' . $article['title_ru'] . '</a> </div>';
                    if (isset($article['title_en'])) $str .= '<div class="article_title"><a class = "arch_content_article_title">' . $article['title_en'] . '</a></div>';
                    $str .= '<div class="arch_content_article_authors"> <span class="author text_bold">Автор: </span>
                                                                    <span class = "author_name text_font">';
                    foreach ($article['authors'] as $author) {
                        if (isset($author['fio_ru'])) $str .= $author['fio_ru'] . '&nbsp';
                        if (isset($author['fio_en'])) $str .= $author['fio_en'] . '&nbsp';
                    }
                    $str .= '</span> </div>';
                    if(isset($article['first_page']) && isset($article['last_page']))
                        $str .= '<div class="arch_content_article_pages"><span>' . $article['first_page'] . '-' . $article['last_page'] . ' стр. </span></div>';
                    if (isset($article['article_link']) && ($article['article_link'] != '')) {
                        $linkArr = explode('\\', $article['article_link']);
                        $link = $linkArr[count($linkArr) - 1];
                        $str .= '<div class="download_link" id="wb_CssMenu2"><a class="arch_content_download_link" href="/upload/' . $link . '">Скачать статью</a></div>';
                    }
                    $str .= '</div></div>';
                }
            }
            echo $str;
            ?>
        </div>
        <pre>
        <?php // var_dump($articles) ?>
        <br>
        <br>
        <?php //var_dump($allReleases) ?>
        </pre>
    </div>
</div>
<?php
$breadcrumbs = new Breadcrumbs();
echo $breadcrumbs->getBreadcrumbs($breadArr);
?>