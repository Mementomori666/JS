<?
/*
 * от админки в принципе много не надо. по сути это форма, наверное,
 * на какой-нибудь закрытой части сайта под паролем,
 * где просто заполняешь те же самые поля:
 * Год выпуска, номер выпуска, название статьи, авторы,
 * ключевые слова, аннотации, коды и прочее,
 * с возможностью загрузки файла статьи
 * (хотя я архив могу и на хостинг заливать постатейно, не суть важно)
 * просто чтобы он путь к этому файлу знал. ну и для красоты картинка
 * первой страницы статьи как у Киберленинки и как сейчас в исходниках.
 * ну и, видимо, из этого всего будет формироваться страница статьи
 * с метаданными и кодом для гугл скулар. я буду счастлив,
 * а то придется сейчас отдельно страницу в редакторе делать,
 * потом вручную менять метатеги для гугл скулара, вставлять
 * это все в код страницы... у меня сейчас это занимает около 30 минут на одну статью((((*/
?>
<div class="container">
   <form name="Форма_размещения_статьи" class="form-horizontal" role="form" method="post"
         action="index.php">
       <div class="form-group">
             <label for="pub_year" class="col-md-2 control-label">Год выпуска:</label>
          <div class="col-md-6">
             <input type="text" id="pub_year" class="form-control" name="pub_year" value="">
          </div>
      </div>
      <div class="form-group">
            <label for="num_mag" class="col-md-2 control-label">Номер выпуска:</label>
         <div class="col-md-6">
            <input type="text" id="num_mag" class="form-control" name="num_mag" value="">
         </div>
      </div>
      <div class="form-group">
          <label for="article_name" class="col-md-2 control-label">Название статьи:</label>
         <div class="col-md-6">
            <input type="text" id="article_name" class="form-control" name="article_name" value="">
         </div>
      </div>
      <div class="form-group">
            <label for="FIO" class="col-md-2 control-label" >Ф.И.О. авторов:</label>
            <div class="col-md-6">
               <input type="text" id="FIO" class="form-control" name="ФИО" value="" tabindex="2" required>
            </div>
      </div>
      <div class="form-group">
         <label for="SECTION" class="col-md-2 control-label">Раздел журнала:</label>
         <div class="col-md-6">
         <select name="SECTION" size="1" class="form-control" id="SECTION">
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
         </div>
      </div>
      <div class="form-group">
         <label for="LANG" class="col-md-2 control-label">Язык статьи:</label>
         <div class="col-md-6">
         <select name="LANG" size="1" class="form-control" id="LANG">
            <option value="Русский">Русский</option>
            <option value="Английский">Английский</option>
         </select>
         </div>
      </div>
      <div class="form-group">
         <label for="ARTICLE" class="col-md-2 control-label">Загрузить статью:</label>
         <div class="col-md-6">
            <input type="file" id="ARTICLE" class="form-control" name="ARTICLE" required>
         </div>
      </div>
      <div class="form-group">
         <label for="notation" class="col-md-2 control-label">Сообщение:</label>
         <div class="col-md-6">
            <textarea name="notation" id="notation" class="form-control" rows="5"></textarea>
         </div>
      </div>

   </form>
</div>
</body>
</html>