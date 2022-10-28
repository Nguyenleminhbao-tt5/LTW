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
    <link rel="stylesheet" href="../../public/fontawesome-free-6.1.1-web/css/all.min.css">
    <link rel="stylesheet" href="../base.css">
    <link rel="stylesheet" href="./module/module.css">
    <link rel="stylesheet" href="./index.css">
    <link rel="stylesheet" href="./pageManage/pageManage.css">
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
        // header
        require('./module/header.php');
        //content
        require('./module/content.php'); 
        //footer
        require('./module/footer.php');
        ?>
    </div>
  </body>
</html>
