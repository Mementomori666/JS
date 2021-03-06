<div id="Layer1">
    <div id="Layer1_Container">
        <?php
        if(isset($_GET['mail']) && $_GET['mail'] == 'ok') echo "<span class='form-good'>Статья успешно отправлена</span>";
        ?>
        <div id="wb_Text2">
            <span id="wb_uid0"><strong>Опубликовать статью</strong></span><span id="wb_uid1"><br><br></span><span
                id="wb_uid2"><strong>К рассмотрению принимаются:</strong> не публиковавшиеся ранее статьи студентов (в соавторстве с научным руководителем), магистрантов, соискателей, аспирантов, докторантов, научных и педагогических работников на русском и английском языках.<br><br><strong>Разделы
                    журнала:<br></strong>Математика; Механика; Информатика; Физика; Химия; Технические науки; Сельскохозяйственные науки; Биология; Медицина; Экология; География, Науки о земле; Архитектура и строительство; Филология и журналистика; Искусствоведение; Культурология; Философия; История; Педагогика; Психология; Социология; Экономика и управление; Политология; Международные отношения; Правоведение; Физическая культура и спорт.<br><br>Все статьи проходят обязательное рецензирование и проверку через систему Антиплагиат. Результаты рецензирования и решение редколлегии о принятии представленной статьи к публикации в журнале сообщаются авторам по электронной почте.<br><br><strong>Для
                    подачи статьи на рассмотрение, воспользуйтесь формой внизу, по электронной почте статьи не
                    принимаются!<br></strong><br>Перед подачей статьи внимательно ознакомьтесь с <a
                    href="./guide-for-authors.html">требованиями к оформлению статьи</a>!<br><br><strong>Уважаемые
                    авторы, обратите внимание, что форма только для первичной подачи статьи! дополнительные материалы и
                    вопросы высылайте, пожалуйста, на адрес электронной почты редакции (edit@jscientia.org) с указанием
                    регистрационного номера статьи в теме письма.</strong><br><br></span><span id="wb_uid3"><strong>Статьи,
                    оформленные с нарушением настоящих требований, редакцией не рассматриваются.</strong></span></div>
        <div id="wb_Form1" name="wb_Form1">
            <div>
                <?php
                foreach($errors as $error){
                    echo "<span class='form-error'>$error</span><br>";
                }?>
            </div>
            <form name="Форма_подачи_статьи" method="post" action="/page/services"
                  enctype="multipart/form-data" accept-charset="UTF-8" id="Form1"
                >
                <input type="hidden" name="formid" value="form1">
                <label for="fio" id="Label1" >Ф.И.О. автора, ответственного за переписку:</label>
                <input type="text" id="fio" name="fio"  value="<?= isset($_POST['fio']) ? $_POST['fio'] : '' ?>" tabindex="1" required>
                <label for="EMAIL" id="Label2">Действующий адрес электронной почты:</label>
                <input type="email" id="EMAIL" name="email" tabindex="2" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>" required>
                <input type="text" id="TEL" name="phone" tabindex="3" value="<?= isset($_POST['phone']) ? $_POST['phone'] : '+7' ?>" required>
                <input type="text" id="ARTICLE_NAME" tabindex="5" name="article_name" value="<?= isset($_POST['article_name']) ? $_POST['article_name'] : '' ?>">
                <select name="section" size="1" id="SECTION" tabindex="6">
                    <option value="Математика">Математика</option>
                    <option value="Механика">Механика</option>
                    <option value="Информатика">Информатика</option>
                    <option value="Физика">Физика</option>
                    <option>Химия</option>
                    <option>Технические науки</option>
                    <option>Сельскохозяйственные науки</option>
                    <option>Биология</option>
                    <option>Медицина</option>
                    <option>Экология</option>
                    <option>География, Науки о земле</option>
                    <option>Архитектура и строительство</option>
                    <option>Филология и журналистика</option>
                    <option>Искусствоведение</option>
                    <option>Культурология</option>
                    <option>Философия</option>
                    <option>История</option>
                    <option>Педагогика</option>
                    <option>Психология</option>
                    <option>Социология</option>
                    <option>Экономика и управление</option>
                    <option>Политология</option>
                    <option>Международные отношения</option>
                    <option>Правоведение</option>
                    <option>Физическая культура и спорт</option>
                </select>
                <select name="language" size="1" id="LANG"tabindex="7">
                    <option value="Русский">Русский</option>
                    <option value="Английский">Английский</option>
                </select>
                <input type="file" id="ARTICLE" name="article" tabindex="8" required>
                <input type="file" id="INFO" name="info" tabindex="4" required>
                <textarea name="message" id="MESAGE" rows="4" tabindex="13" cols="90"></textarea>
                <input type="submit" id="Button1" name="Отправить" tabindex="16" value="Отправить">
                <input type="checkbox" id="label99" name="1" value="on" tabindex="14" required>
                <label for="label99" id="Label3">Материалы не направлены в другие журналы и публикуются впервые</label>
                <input type="checkbox" id="label100" name="2" tabindex="15" value="on" required>
                <label for="label100" id="Label4">Я являюсь автором представляемой статьи, согласен с размещенными на
                    данном сайте условиями публикации статей</label>
                <label for="DOI" id="Label5">Присвоить DOI (digital object identifier)</label>
                <label for="pSERTIFICATE" id="label44">Печатный сертификат о публикации</label>
                <label for="JOURNAL" id="Label8">Печатный экземпляр журнала</label>
                <input type="checkbox" id="DOI" name="doi" tabindex="9" checked>
                <input type="checkbox" id="pSERTIFICATE" name="pSertificate" tabindex="10" checked>
                <input type="checkbox" id="eSERTIFICATE" name="eSertificate"tabindex="11" checked>
                <input type="checkbox" id="JOURNAL" name="journal" tabindex="12"checked>
                <label for="eSERTIFICATE" id="Label7">Электронный сертификат о публикации</label>
                <label for="" id="Label9">Дополнительно, если необходимо:</label>
                <label for="MESAGE" id="Label10">Сообщение:</label>
                <label for="TEL" id="Label11">Контактный номер телефона:</label>
                <label for="INFO" id="Label12">Загрузите файл сведений об авторах:</label>
                <label for="ARTICLE_NAME" id="Label13">Название статьи:</label>
                <label for="SECTION" id="Label14">Раздел журнала:</label>
                <label for="LANG" id="Label15">Язык статьи:</label>
                <label for="ARTICLE" id="Label16">Загрузить статью:</label>

                <div id="wb_Text4">
                    <span id="wb_uid4"><strong><a href="/files/JS_info_ru.doc">?</a></strong></span></div>
                <div id="wb_Text5">
                    <span id="wb_uid5"><a href="./agreement">Публичная Оферта</a> (редакция от 30.07.2016)</span>
                </div>
            </form>
        </div>
        <div id="wb_Image2">
            <a href="/files/JS_example_ru.doc"><img src="../images/img0052.png" id="Image2" alt=""></a></div>
        <div id="wb_Image17">
            <a href="/files/JS_info_ru.doc"><img src="../images/img0013.png" id="Image17" alt=""></a></div>
        <div id="wb_Text6">
            <span id="wb_uid6"><a href="/files/JS_example_ru.doc">Пример оформления статьи</a></span></div>
        <div id="wb_Text7">
            <span id="wb_uid7"><a href="/files/JS_info_ru.doc">Сведения об авторах </a><br><a
                    href="./files/JS_info_ru.doc">и статье</a></span></div>
    </div>
</div>
<?php
$breadcrumbs = new Breadcrumbs();
echo $breadcrumbs->getBreadcrumbs($breadArr);
?>