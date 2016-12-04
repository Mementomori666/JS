<?php
/**
 * @var $article array
 * @var $allReleases array
 */

$article_link = explode(ROOT_DIR, $article['article_link'])[1];
$article_link = '/' . str_replace('\\', '/', $article_link);
$preview_link = explode(ROOT_DIR, $article['preview_link'])[1];
$preview_link = '/' . str_replace('\\', '/', $preview_link);
?>

   <div id="Layer1">
      <div id="Layer1_Container">
         <div class="arch_menu" id="archMenu">
            <?php
            $str = '';
            foreach ($allReleases as $year) {
               $str .= '<div class="arch_menu_one_year">';
               $str .= '<div class="arch_menu_year_text">' . $year['pubyear'] . ' год </div>';
               foreach ($year['releases'] as $release) {
                  $str .= '<a class="arch_menu_link"
                        href="/page/arch/' . $year['pubyear'] . '/' . $release['num_mag'] . '"> выпуск № '
                     . $release['num_mag'] . '</a>';
                  $str .= '<br>';
               }
               $str .= '</div>';
            }
            echo $str;
            ?>
         </div>
         <div class="article_menu">
            <div id="Image4">
               <a href="<?= $article_link ?>">
                  <img src="<?= $preview_link ?>">
               </a>
            </div>
            <div class="article_code">
               <ul>
                  <li><span class="code text_bold">УДК:&nbsp</span><span class="text_font2"><?= $article['udk'] ?></span></li>
                  <li><span class="code text_bold">ГРНТИ:&nbsp</span><span class="text_font2"><?= $article['grnti'] ?></span></li>
                  <li><span class="code text_bold">DOI:&nbsp</span><span class="text_font2"><?= $article['doi'] ?></span></li>
               </ul>
            </div>
            <div class="article_link" id="wb_CssMenu2">
               <ul>
                  <li><a href="<?= $article['article_link'] ?>">Скачать статью в PDF</a></li>
                  <!--                <li><a href="-->
                  <? //=$article['article_link']?><!--">Скачать журнал в PDF</a></li>-->
                  <li><a href="http://ruslibart.com/products/21235164" target="_blank">Купить&nbsp;журнал</a></li>
               </ul>
            </div>
            <div id="Html1">
               <script>(function () {
                     if (window.pluso)if (typeof window.pluso.start == "function") return;
                     if (window.ifpluso == undefined) {
                        window.ifpluso = 1;
                        var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
                        s.type = 'text/javascript';
                        s.charset = 'UTF-8';
                        s.async = true;
                        s.src = ('https:' == window.location.protocol ? 'https' : 'http') + '://share.pluso.ru/pluso-like.js';
                        var h = d[g]('body')[0];
                        h.appendChild(s);
                     }
                  })();</script>
               <div class="pluso" data-background="transparent"
                    data-options="small,square,line,horizontal,counter,theme=04"
                    data-services="vkontakte,facebook,odnoklassniki,twitter,email,print">
                  <div class="pluso-010011001001-04"><span class="pluso-wrap" style="background:transparent"><a
                           href="file:///D:/Downloads/Telegram%20Desktop/%D1%81%D0%B0%D0%B9%D1%82/%D1%81%D0%B0%D0%B9%D1%82/archive/2015/01/001.html"
                           title="ВКонтакте" class="pluso-vkontakte"></a><a
                           href="file:///D:/Downloads/Telegram%20Desktop/%D1%81%D0%B0%D0%B9%D1%82/%D1%81%D0%B0%D0%B9%D1%82/archive/2015/01/001.html"
                           title="Facebook" class="pluso-facebook"></a><a
                           href="file:///D:/Downloads/Telegram%20Desktop/%D1%81%D0%B0%D0%B9%D1%82/%D1%81%D0%B0%D0%B9%D1%82/archive/2015/01/001.html"
                           title="Одноклассники" class="pluso-odnoklassniki"></a><a
                           href="file:///D:/Downloads/Telegram%20Desktop/%D1%81%D0%B0%D0%B9%D1%82/%D1%81%D0%B0%D0%B9%D1%82/archive/2015/01/001.html"
                           title="Twitter" class="pluso-twitter"></a><a
                           href="file:///D:/Downloads/Telegram%20Desktop/%D1%81%D0%B0%D0%B9%D1%82/%D1%81%D0%B0%D0%B9%D1%82/archive/2015/01/001.html"
                           title="Отправить на email" class="pluso-email"></a><a
                           href="file:///D:/Downloads/Telegram%20Desktop/%D1%81%D0%B0%D0%B9%D1%82/%D1%81%D0%B0%D0%B9%D1%82/archive/2015/01/001.html"
                           title="Печатать" class="pluso-print"></a><a href="http://pluso.ru/"
                                                                       class="pluso-more"></a></span><span
                        class="pluso-counter"><b title="0">0</b></span></div>
               </div>
            </div>
         </div>


         <div class="article_container" >
            <div class="article_title_ru">
               <?= (isset($article['title_ru'])) ? $article['title_ru'] : ''; ?>
            </div>
            <div class="article_title_en">
               <?= (isset($article['title_en'])) ? $article['title_en'] : ''; ?>
            </div>
            <div class="article_author">
               <span class="text_bold">Автор:
               </span>
               <span class=" author_name text_font">
                <?php
                $str = '';
                foreach ($article['authors'] as $author) {
                   if (isset($author['fio_ru']) && $author['fio_ru'] != '') $str .= $author['fio_ru'] . ', ';
                   if (isset($author['fio_en']) && $author['fio_en'] != '') $str .= $author['fio_en'] . ', ';
                }
                $str = substr($str, 0, count($str) - 3);
                echo $str;
                ?>
               </span>
            </div>
            <div class="article_annotation text_font">
               <?= (isset($article['annotation_ru']) && $article['annotation_ru'] != '') ? '<span class="text_bold">Аннотация:&nbsp</span>' . $article['annotation_ru'] : ''; ?>
            </div>
            <div class="article_keywords text_font">
               <?= (isset($article['key_words_ru']) && $article['key_words_ru'] != '') ? '<span class="text_bold">Ключевые слова:&nbsp</span>' . $article['key_words_ru'] : ''; ?>
            </div>
            <div class="article_annotation text_font">
               <?= (isset($article['annotation_en']) && $article['annotation_en'] != '') ? '<span class="text_bold">Abstract:&nbsp</span>' . $article['annotation_en'] : ''; ?>
            </div>
            <div class="article_keywords text_font">
               <?= (isset($article['key_words_en']) && $article['key_words_en'] != '') ? '<span class="text_bold">Keywords:&nbsp</span>' . $article['key_words_en'] : ''; ?>
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