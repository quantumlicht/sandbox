<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
   <head>
      <title>
         <?php if (!isset($title)) { ?>
            Mon super site
         <?php } else { echo $title; } ?>
      </title>
    
      <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
      <script type='text/javascript' src='http://philippeguay.com/jquery/jquery.js'></script>
      <link href="/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet" media="screen">
   </head>
  
   <body>
    
      <div class='page-header'>
         <div class='row-fluid'>
            <div class='span6 offset5'>
               <h1> QuantumLicht <small>Système de News</small> </h1>
            </div>
         </div>
      </div>
      
      <div class="container-fluid">
         <div class="row-fluid">
            <div class="span2"></div>
            <div class="span8">
               <div class='navbar navbar-inverse'>
                  <div class="navbar-inner">
                     <a class='brand' href="#">Qlicht</a>
                     <ul class='nav'>
                        <li class='active'><a href="/">Accueil</a></li>
                        <?php if ($user->isAuthenticated()) { ?>
                        <li><a href="/admin/">Admin</a></li>
                        <li><a href="/admin/news-insert.html">Ajouter une news</a></li>
                        <?php } ?>
                        <li><a href="/a-propos.html">A propos</a></li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="span2"></div>
         </div>
      </div>  
      
      <div id="content-wrap">
        <div id="main">
          <?php if ($user->hasFlash()) echo '<p style="text-align: center;">', $user->getFlash(), '</p>'; ?>
          
          <?php echo $content; ?>
        </div>
      </div>
    
      <div class='footer' id="footer">CopyRight 2012</div>
  </body>
</html>