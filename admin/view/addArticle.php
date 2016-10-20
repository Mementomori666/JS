<?
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
   <form  id="article_add" class="form-horizontal" name="article_add" role="form" method="post"
         action="../index.php">
       <div class="form-group">
             <label for="article_name" class="col-md-2 control-label">Название статьи русский: </label>
          <div class="col-md-6">
             <input type="text" id="article_name" class="form-control" name="pub_year" >
          </div>
      </div>
      <div class="form-group">
            <label for="article_en_name" class="col-md-2 control-label">Название статьи английский: </label>
         <div class="col-md-6">
            <input type="text" id="article_en_name" class="form-control" name="num_mag">
         </div>
      </div>

      <fieldset style="border-bottom: 1px solid #c0c0c0; margin-bottom: 15px;"  form="article_add">
         <legend>Авторы:</legend>
         <div class="form-group">

            <label for="fio" class="col-md-2 control-label">Ф.И.О автора:</label>
            <div class="col-md-6">
               <input type="text" id="fio" class="form-control" name="fio">
            </div>

         </div>
         <div class="form-group">
            <label for="fio_en" class="col-md-2 control-label" >Ф.И.О. авторов на английском:</label>
            <div class="col-md-6">
               <input type="text" id="fio_en" class="form-control" name="fio_en">
            </div>
         </div>
         <div class="form-group">
            <label for="place_of_work" class="col-md-2 control-label" >Место работы:</label>
            <div class="col-md-6">
               <input type="text" id="place_of_work" class="form-control" name="place_of_work">
            </div>
         </div>
         <div class="form-group">
            <label for="email" class="col-md-2 control-label" >e-mail:</label>
            <div class="col-md-6">
               <input type="text" id="email" class="form-control" name="email">
            </div>
         </div>
         <div class="form-group">
             <div class="col-md-3 col-md-offset-4 ">
               <button type="button" id="add_author" class="btn btn-primary" name="add_author">
                  Добавить автора
               </button>
            </div>
         </div>

      </fieldset>
      <div class="form-group">
         <label for="notation" class="col-md-2 control-label">Аннотация на русском:</label>
         <div class="col-md-6">
            <textarea  id="notation" class="form-control" name=notation"" rows="5"></textarea>
         </div>
      </div>
         <div class="form-group">
         <label for="notation_en" class="col-md-2 control-label">Аннотация на английском:</label>
         <div class="col-md-6">
            <textarea  id="notation_en" class="form-control" name="notation_en" rows="5"></textarea>
         </div>
      </div>

      <div class="form-group">

         <label for="keywords" class="col-md-2 control-label">Ключевые слова:</label>
         <div class="col-md-6">
            <input type="text" id="keywords" class="form-control" name="keywords">
         </div>

      </div>
      <div class="form-group">

         <label for="keywords_en" class="col-md-2 control-label">Ключевые слова на английском:</label>
         <div class="col-md-6">
            <input type="text" id="keywords_en" class="form-control" name="keywords_en">
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
         <label for="article" class="col-md-2 control-label">Загрузить статью:</label>
         <div class="col-md-6">
            <input type="file" id="article" class="form-control" name="article" required>
         </div>
      </div><div class="form-group">
         <label for="article_prev" class="col-md-2 control-label">Загрузить превью статьи:</label>
         <div class="col-md-6">
            <input type="file" id="article_prev" class="form-control" name="article_prev" required>
         </div>
      </div>


   </form>
</div>
