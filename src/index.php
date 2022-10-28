<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <link rel="icon" href="%PUBLIC_URL%/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <meta
      name="description"
      content="Web site created using create-react-app"
    />
    <link rel="stylesheet" href="../public/fontawesome-free-6.1.1-web/css/all.min.css">
    <link rel="stylesheet" href="base.css">
    <link rel="stylesheet" href="./module/module.css">
    <link rel="stylesheet" href="./index.css">
    <style>
      #root {
        font-family: 'Montserrat';
      }
    </style>
    <title>WEB SHOES</title>
  </head>
  <body>
    <div class="wrapper">
        <?php
        // Header
        require('module/header.php');
        ?>
        <div class="wrapper-content">
          <?php

          if(!empty($_GET['pages']))
          {
            $page=$_GET['pages'];
            switch($page)
            {
              case 'home': require('./pages/home.php');
              break;
              case 'login': require('./module/login.php');
              break;
              case 'cart': require('./pages/cart.php');
              break;
              case 'news': require('./pages/news.php');
              break;
              case 'intro': require('./pages/intro.php');
              break;
            }
          }
          
          ?>
        </div>
        <?php
        require("./module/footer.php");
        ?>
    </div>
  </body>
</html>
