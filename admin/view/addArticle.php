<?
/**
 * @var $output string
 */
/*
* название статьи русский
* название статьи английский
* автор (добавить автора через js )
 * фио
 * место работы
 * адрес места работы
 * автор на англ (см выше)
 * контакт корреспондента ( только мыло)
* аннотация на русском, английском
* ключевые слова русский
* ключевые слова английский
* удк
* грнти
* doi
* загрузить статью pdf
* загрузить превью статьи*/
?>
<div class="container">
    <?php
    if(isset($output)) echo "<h3>$output</h3>"
    ?>
    <form id="article_add" class="form-horizontal" name="article_add" role="form" method="post"
          action="" enctype="multipart/form-data">
        <div class="form-group">
            <label for="article_name" class="col-md-2 control-label">Название статьи русский: </label>

            <div class="col-md-6">
                <input type="text" id="article_name" class="form-control" name="title_ru">
            </div>
        </div>
        <div class="form-group">
            <label for="article_en_name" class="col-md-2 control-label">Название статьи английский: </label>

            <div class="col-md-6">
                <input type="text" id="article_en_name" class="form-control" name="title_en">
            </div>
        </div>

        <fieldset style="border-bottom: 1px solid #c0c0c0; margin-bottom: 15px;" form="article_add">
            <legend>Авторы:</legend>
            <div id='authors_block'>
                <div class='author_block1'>
                    <div class="form-group">

                        <label for="fio" class="col-md-2 control-label">Ф.И.О автора:</label>

                        <div class="col-md-6">
                            <input type="text" id="fio" class="form-control" name="fio_ru1">
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="fio_en" class="col-md-2 control-label">Ф.И.О. авторов на английском:</label>

                        <div class="col-md-6">
                            <input type="text" id="fio_en" class="form-control" name="fio_en1">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="place_of_work" class="col-md-2 control-label">Место работы:</label>

                        <div class="col-md-6">
                            <input type="text" id="place_of_work" class="form-control" name="current_job1">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-md-2 control-label">e-mail:</label>

                        <div class="col-md-6">
                            <input type="text" id="email" class="form-control" name="email1">
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-3 col-md-offset-4 ">
                    <a id="add_author" class="btn btn-primary" name="add_author">
                        Добавить автора
                    </a>
                </div>
            </div>

        </fieldset>
        <div class="form-group">
            <label for="notation" class="col-md-2 control-label">Аннотация на русском:</label>

            <div class="col-md-6">
                <textarea id="notation" class="form-control" name="annotation_ru" rows="5"></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="notation_en" class="col-md-2 control-label">Аннотация на английском:</label>

            <div class="col-md-6">
                <textarea id="notation_en" class="form-control" name="annotation_en" rows="5"></textarea>
            </div>
        </div>

        <div class="form-group">

            <label for="keywords" class="col-md-2 control-label">Ключевые слова:</label>

            <div class="col-md-6">
                <input type="text" id="keywords" class="form-control" name="key_words_ru">
            </div>

        </div>
        <div class="form-group">

            <label for="keywords_en" class="col-md-2 control-label">Ключевые слова на английском:</label>

            <div class="col-md-6">
                <input type="text" id="keywords_en" class="form-control" name="key_words_en">
            </div>

        </div>
        <fieldset class="form-group" style="border-bottom: 1px solid #c0c0c0; margin-bottom: 15px;">
            <legend>Коды:</legend>

            <div class="form-group">

                <label for="udk" class="col-md-2 control-label">УДК:</label>

                <div class="col-md-6">
                    <input type="text" id="udk" class="form-control" name="udk">
                </div>

            </div>
            <div class="form-group">

                <label for="grnti" class="col-md-2 control-label">ГРНТИ:</label>

                <div class="col-md-6">
                    <input type="text" id="grnti" class="form-control" name="grnti">
                </div>

            </div>
            <div class="form-group">

                <label for="doi" class="col-md-2 control-label">DOI:</label>

                <div class="col-md-6">
                    <input type="text" id="doi" class="form-control" name="doi">
                </div>

            </div>
        </fieldset>
        <div class="form-group">

            <label for="pubyear" class="col-md-2 control-label">Год выпуска:</label>

            <div class="col-md-6">
                <input type="text" id="pubyear" class="form-control" name="pubyear" required>
            </div>

        </div>
        <div class="form-group">

            <label for="num_mag" class="col-md-2 control-label">Номер журнала:</label>

            <div class="col-md-6">
                <input type="text" id="num_mag" class="form-control" name="num_mag" required>
            </div>

        </div>
        <div class="form-group">

            <label for="first_page" class="col-md-2 control-label">Первая страница статьи:</label>

            <div class="col-md-6">
                <input type="text" id="first_page" class="form-control" name="first_page" required>
            </div>

        </div>
        <div class="form-group">

            <label for="last_page" class="col-md-2 control-label">Последняя страница статьи:</label>

            <div class="col-md-6">
                <input type="text" id="last_page" class="form-control" name="last_page" required>
            </div>

        </div>
        <div class="form-group">
            <label for="category" class="col-md-2 control-label">Категория:</label>
            <div class="col-md-6">
                <select name="category" id="category" required class="form-control"  data-live-search = "true">
                    <?= Category::getCategoryForDropDown()?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="article" class="col-md-2 control-label">Загрузить статью:</label>

            <div class="col-md-6">
                <input type="file" id="article" class="form-control" name="article" required>
            </div>
        </div>
        <div class="form-group">
            <label for="article_prev" class="col-md-2 control-label">Загрузить превью статьи:</label>

            <div class="col-md-6">
                <input type="file" id="article_prev" class="form-control" name="article_prev" required>
            </div>
        </div>
        <input type="submit" name="submit" value="Добавить" class="btn btn-primary">
    </form>
</div>
