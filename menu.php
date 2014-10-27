<?php $serverName = "http://".$_SERVER['HTTP_HOST']; ?>
<?php $currentUrl = $_SERVER['REQUEST_URI']; ?>

<div id="titleSite"><a href="<?php echo $serverName; ?>">PHP Frameworks Speed Benchmark</a></div>
<ul id="mainMenu">
    <li<?php echo (preg_match('/yii/',$currentUrl)) ? ' class="active"' : ''; ?>>
        <a href="<?php echo $serverName; ?>/projects/yii/">Yii</a>
        <ul class="subMenu">
            <li<?php echo (preg_match('/yii/',$currentUrl) && preg_match('/site\/statistic/',$currentUrl)) ? ' class="active"' : ''; ?>>
                <a href="<?php echo $serverName; ?>/projects/yii/index.php?r=site/statistic/">Statistic</a>
            </li>
            <li<?php echo (preg_match('/yii/',$currentUrl) && preg_match('/site\/select\//',$currentUrl)) ? ' class="active"' : ''; ?>>
                <a href="<?php echo $serverName; ?>/projects/yii/index.php?r=site/select/">Select</a>
            </li>
            <li<?php echo (preg_match('/yii/',$currentUrl) && preg_match('/site\/selectall\//',$currentUrl)) ? ' class="active"' : ''; ?>>
                <a href="<?php echo $serverName; ?>/projects/yii/index.php?r=site/selectall/">Select All</a>
            </li>
            <li<?php echo (preg_match('/yii/',$currentUrl) && preg_match('/site\/selectallparams\//',$currentUrl)) ? ' class="active"' : ''; ?>>
                <a href="<?php echo $serverName; ?>/projects/yii/index.php?r=site/selectallparams/">Select All Params</a>
            </li>
<!--            <li<?php echo (preg_match('/yii/',$currentUrl) && preg_match('/site\/update\//',$currentUrl)) ? ' class="active"' : ''; ?>>
                <a href="<?php echo $serverName; ?>/projects/yii/index.php?r=site/update/">Update</a>
            </li>
            <li<?php echo (preg_match('/yii/',$currentUrl) && preg_match('/site\/delete\//',$currentUrl)) ? ' class="active"' : ''; ?>>
                <a href="<?php echo $serverName; ?>/projects/yii/index.php?r=site/delete/">Delete</a>
            </li>-->
        </ul>
    </li>
    <li<?php echo (preg_match('/zend/',$currentUrl)) ? ' class="active"' : ''; ?>>
        <a href="<?php echo $serverName; ?>/projects/zend/public/">Zend</a>
            <ul class="subMenu">
                <li<?php echo (preg_match('/zend/',$currentUrl) && preg_match('/site\/statistic\//',$currentUrl)) ? ' class="active"' : ''; ?>>
                    <a href="<?php echo $serverName; ?>/projects/zend/public/site/statistic/">Statistic</a>
                </li>
                <li<?php echo (preg_match('/zend/',$currentUrl) && preg_match('/site\/select\//',$currentUrl)) ? ' class="active"' : ''; ?>>
                    <a href="<?php echo $serverName; ?>/projects/zend/public/site/select/">Select</a>
                </li>
                <li<?php echo (preg_match('/zend/',$currentUrl) && preg_match('/site\/selectall\//',$currentUrl)) ? ' class="active"' : ''; ?>>
                    <a href="<?php echo $serverName; ?>/projects/zend/public/site/selectall/">Select All</a>
                </li>
                <li<?php echo (preg_match('/zend/',$currentUrl) && preg_match('/site\/selectallparams\//',$currentUrl)) ? ' class="active"' : ''; ?>>
                    <a href="<?php echo $serverName; ?>/projects/zend/public/site/selectallparams/">Select All Params</a>
                </li>
<!--                <li<?php echo (preg_match('/zend/',$currentUrl) && preg_match('/site\/update\//',$currentUrl)) ? ' class="active"' : ''; ?>>
                    <a href="<?php echo $serverName; ?>/projects/zend/public/site/update/">Update</a>
                </li>
                <li<?php echo (preg_match('/zend/',$currentUrl) && preg_match('/site\/delete\//',$currentUrl)) ? ' class="active"' : ''; ?>>
                    <a href="<?php echo $serverName; ?>/projects/zend/public/site/delete/">Delete</a>
                </li>            -->
            </ul>
    </li>
    <li<?php echo (preg_match('/codeigniter/',$currentUrl)) ? ' class="active"' : ''; ?>>
        <a href="<?php echo $serverName; ?>/projects/codeigniter/index.php">Codeigniter</a>
        <ul class="subMenu">
                <li<?php echo (preg_match('/zend/',$currentUrl) && preg_match('/site\/statistic\//',$currentUrl)) ? ' class="active"' : ''; ?>>
                    <a href="<?php echo $serverName; ?>/projects/codeigniter/index.php/site/statistic/">Statistic</a>
                </li>
                <li<?php echo (preg_match('/zend/',$currentUrl) && preg_match('/site\/select\//',$currentUrl)) ? ' class="active"' : ''; ?>>
                    <a href="<?php echo $serverName; ?>/projects/codeigniter/index.php/site/select/">Select</a>
                </li>
                <li<?php echo (preg_match('/zend/',$currentUrl) && preg_match('/site\/selectall\//',$currentUrl)) ? ' class="active"' : ''; ?>>
                    <a href="<?php echo $serverName; ?>/projects/codeigniter/index.php/site/selectall/">Select All</a>
                </li>
                <li<?php echo (preg_match('/zend/',$currentUrl) && preg_match('/site\/selectallparams\//',$currentUrl)) ? ' class="active"' : ''; ?>>
                    <a href="<?php echo $serverName; ?>/projects/codeigniter/index.php/site/selectallparams/">Select All Params</a>
                </li>
<!--                <li<?php echo (preg_match('/zend/',$currentUrl) && preg_match('/site\/update\//',$currentUrl)) ? ' class="active"' : ''; ?>>
                    <a href="<?php echo $serverName; ?>/projects/codeigniter/index.php/site/update/">Update</a>
                </li>
                <li<?php echo (preg_match('/zend/',$currentUrl) && preg_match('/site\/delete\//',$currentUrl)) ? ' class="active"' : ''; ?>>
                    <a href="<?php echo $serverName; ?>/projects/codeigniter/index.php/site/delete/">Delete</a>
                </li>-->
            </ul>
    </li>
    <li<?php echo (preg_match('/laravel/',$currentUrl)) ? ' class="active"' : ''; ?>>
        <a href="<?php echo $serverName; ?>/projects/laravel/">Laravel</a>
    </li>
    <li<?php echo (preg_match('/symfony/',$currentUrl)) ? ' class="active"' : ''; ?>>
        <a href="<?php echo $serverName; ?>/projects/symfony/">Symfony</a>
    </li>
</ul>