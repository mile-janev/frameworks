<?php $serverName = "http://".$_SERVER['HTTP_HOST']; ?>
<?php $currentUrl = $_SERVER['REQUEST_URI']; ?>

<div id="titleSite"><a href="<?php echo $serverName; ?>">PHP Frameworks Speed Benchmark</a></div>
<ul id="mainMenu">
    <li<?php echo (preg_match('/yii/',$currentUrl)) ? ' class="active"' : ''; ?>><a href="<?php echo $serverName; ?>/projects/yii">Yii</a></li>
    <li<?php echo (preg_match('/zend/',$currentUrl)) ? ' class="active"' : ''; ?>><a href="<?php echo $serverName; ?>/projects/zend">Zend</a></li>
    <li<?php echo (preg_match('/codeigniter/',$currentUrl)) ? ' class="active"' : ''; ?>><a href="<?php echo $serverName; ?>/projects/codeigniter">Codeigniter</a></li>
    <li<?php echo (preg_match('/laravel/',$currentUrl)) ? ' class="active"' : ''; ?>><a href="<?php echo $serverName; ?>/projects/laravel">Laravel</a></li>
    <li<?php echo (preg_match('/symfony/',$currentUrl)) ? ' class="active"' : ''; ?>><a href="<?php echo $serverName; ?>/projects/symfony">Symfony</a></li>
</ul>
