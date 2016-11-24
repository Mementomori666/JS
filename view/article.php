<?php
/**
 * @var $article array
 * @var $allReleases array
 */

$article_link = explode(ROOT_DIR, $article['article_link']);
$article_link = '/'.str_replace('\\', '/', $article_link);
$preview_link = explode(ROOT_DIR, $article['preview_link']);
$preview_link = '/'.str_replace('\\', '/', $preview_link);
?>

<div id="Layer1">
    <div id="Layer1_Container">
        <div class="arch_menu" id="archMenu">
            <?php
            $str = '';
            foreach ($allReleases as $year){
                $str .= '<div class="arch_menu_one_year">';
                $str .= '<div class="arch_menu_year_text">' . $year['pubyear'] . '</div>';
                foreach($year['releases'] as $release){
                    $str .= '<a class="arch_menu_link"
                        href="/page/arch/' .$year['pubyear'] . '/' . $release['num_mag'] . '">'
                        . $release['num_mag'] . '</a>';
                    $str .= '<br>';
                }
                $str .= '</div>';
            }
            echo $str;
            ?>
        </div>
        <div class="article_menu">
            <div>
                <a href="<?=$article_link?>">
                    <img src="<?=$preview_link?>">
                </a>
            </div>
            <div>
                <ul>
                <li><span>УДК:&nbsp</span><?=$article['udk']?></li>
                <li><span>ГРНТИ:&nbsp</span><?=$article['grnti']?></li>
                <li><span>DOI:&nbsp</span><?=$article['doi']?></li>
                </ul>
            </div>
            <div>
                <ul>
                    <li><a href="<?=$article['article_link']?>">Скачать статью в PDF</a></li>
    <!--                <li><a href="--><?//=$article['article_link']?><!--">Скачать журнал в PDF</a></li>-->
                    <li><a href="http://ruslibart.com/products/21235164" target="_blank">Купить&nbsp;журнал</a></li>
                </ul>
            </div>
        </div>
        <div class="article_container">
            <div>
                <?= (isset($article['title_ru']))?$article['title_ru'] : '';?>
            </div>
            <div>
                <?= (isset($article['title_en']))?$article['title_en'] : '';?>
            </div>
            <div>
                <?php
                $str = '';
                foreach ($article['authors'] as $author) {
                    if(isset($author['fio_ru']) && $author['fio_ru'] != '') $str .= $author['fio_ru'] . ', ';
                    if(isset($author['fio_en']) && $author['fio_en'] != '') $str .= $author['fio_en'] . ', ';
                }
                $str = substr($str, 0, count($str) - 3);
                echo $str;
                ?>
            </div>
            <div>
                <?= (isset($article['annotation_ru']) && $article['annotation_ru'] != '')?'<span>Аннотация:&nbsp</span>'.$article['annotation_ru'] : '';?>
            </div>
            <div>
                <?= (isset($article['key_words_ru']) && $article['key_words_ru'] != '')?'<span>Ключевые слова:&nbsp</span>'.$article['key_words_ru'] : '';?>
            </div>
            <div>
                <?= (isset($article['annotation_en']) && $article['annotation_en'] != '')?'<span>Abstract:&nbsp</span>'.$article['annotation_en'] : '';?>
            </div>
            <div>
                <?= (isset($article['key_words_en']) && $article['key_words_en'] != '')?'<span>Keywords:&nbsp</span>'.$article['key_words_en'] : '';?>
            </div>
        </div>
        <pre>
        <?php //var_dump($article) ?>
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