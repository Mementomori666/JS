<nav class="navbar navbar-default" role="navigation">
   <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
         <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
         </button>
         <img src="../../images/logo2.png" alt="Logo" class="col-md-2"></div>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <?$page = $_SERVER['REQUEST_URI'];
      $page=strip_tags(trim($page));
      if ($page=="addArticle"){
      ?>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
         <ul class="nav navbar-nav">
            <li class="active"><a href="/page/add-article">Добавление Статей</a></li>
            <li ><a href="/page/add-user">Добавление Пользователей</a></li>

         </ul>
         <?
         }
         else {
         ?>
         <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
               <li ><a href="/admin/page/add-article">Добавление Статей</a></li>
               <li class="active"><a href="/admin/page/add-user">Добавление Пользователей</a></li>

            </ul>
            <?
         }
         ?>

         <ul class="nav navbar-nav navbar-right">
            <li><a href="?exit=1">Выход</a></li>
         </ul>

      </div><!-- /.navbar-collapse -->
   </div><!-- /.container-fluid -->
</nav>