<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
        <title>PHP Frameworks Speed Benchmark</title>        
        <link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/css/main.css" />
        <script type="text/javascript" src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/js/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/js/main.js"></script>
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <?php include_once 'Library.php'; ?>
        <?php include_once 'variables.php'; ?>
    </head>
    <body>
        <div id="menu"><?php include_once 'menu.php'; ?></div>
        <div class="body">
            <div class="container" id="page">
                <?php echo $test; ?>
                Project is started
            </div>
        </div>
    </body>
</html>