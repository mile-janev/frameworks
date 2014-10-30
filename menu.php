<?php $serverName = "http://".$_SERVER['HTTP_HOST']; ?>
<?php $currentUrl = $_SERVER['REQUEST_URI']; ?>

<div id="titleSite"><a href="<?php echo $serverName; ?>">PHP Frameworks Speed Benchmark</a></div>
<ul id="mainMenu">
    <li<?php echo (preg_match('/yii/',$currentUrl)) ? ' class="active"' : ''; ?>>
        <a href="<?php echo $serverName; ?>/projects/yii/index.php?r=site/index/">Yii</a>
        <ul class="subMenu">
            <li<?php echo (preg_match('/yii/',$currentUrl) && preg_match('/site\/index/',$currentUrl)) ? ' class="active"' : ''; ?>>
                <a href="<?php echo $serverName; ?>/projects/yii/index.php?r=site/index/">Statistic</a>
            </li>
            <li<?php echo (preg_match('/yii/',$currentUrl) && preg_match('/site\/selectall\//',$currentUrl)) ? ' class="active"' : ''; ?>>
                <a href="<?php echo $serverName; ?>/projects/yii/index.php?r=site/selectall/">Select All</a>
            </li>
            <li<?php echo (preg_match('/yii/',$currentUrl) && preg_match('/site\/find\//',$currentUrl)) ? ' class="active"' : ''; ?>>
                <a href="<?php echo $serverName; ?>/projects/yii/index.php?r=site/find/">find($id)</a>
            </li>
            <li<?php echo (preg_match('/yii/',$currentUrl) && preg_match('/site\/findbypk\//',$currentUrl)) ? ' class="active"' : ''; ?>>
                <a href="<?php echo $serverName; ?>/projects/yii/index.php?r=site/findbypk/">findByPk($id)</a>
            </li>
            <li<?php echo (preg_match('/yii/',$currentUrl) && preg_match('/site\/findbyattributes\//',$currentUrl)) ? ' class="active"' : ''; ?>>
                <a href="<?php echo $serverName; ?>/projects/yii/index.php?r=site/findbyattributes/">findByAttributes($id)</a>
            </li>
            <li<?php echo (preg_match('/yii/',$currentUrl) && preg_match('/site\/findbysql\//',$currentUrl)) ? ' class="active"' : ''; ?>>
                <a href="<?php echo $serverName; ?>/projects/yii/index.php?r=site/findbysql/">findBySql($id)</a>
            </li>
            <li<?php echo (preg_match('/yii/',$currentUrl) && preg_match('/site\/findall\//',$currentUrl)) ? ' class="active"' : ''; ?>>
                <a href="<?php echo $serverName; ?>/projects/yii/index.php?r=site/findall/">findAll($id)</a>
            </li>
            <li<?php echo (preg_match('/yii/',$currentUrl) && preg_match('/site\/findallbypk\//',$currentUrl)) ? ' class="active"' : ''; ?>>
                <a href="<?php echo $serverName; ?>/projects/yii/index.php?r=site/findallbypk/">findAllByPk($id)</a>
            </li>
            <li<?php echo (preg_match('/yii/',$currentUrl) && preg_match('/site\/findballyattributes\//',$currentUrl)) ? ' class="active"' : ''; ?>>
                <a href="<?php echo $serverName; ?>/projects/yii/index.php?r=site/findallbyattributes/">findAllByAttributes($id)</a>
            </li>
            <li<?php echo (preg_match('/yii/',$currentUrl) && preg_match('/site\/findallbysql\//',$currentUrl)) ? ' class="active"' : ''; ?>>
                <a href="<?php echo $serverName; ?>/projects/yii/index.php?r=site/findallbysql/">findAllBySql($id)</a>
            </li>
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
            </ul>
    </li>
    <li<?php echo (preg_match('/codeigniter/',$currentUrl)) ? ' class="active"' : ''; ?>>
        <a href="<?php echo $serverName; ?>/projects/codeigniter/index.php">Codeigniter</a>
        <ul class="subMenu">
                <li<?php echo (preg_match('/codeigniter/',$currentUrl) && preg_match('/site\/statistic\//',$currentUrl)) ? ' class="active"' : ''; ?>>
                    <a href="<?php echo $serverName; ?>/projects/codeigniter/index.php/site/statistic/">Statistic</a>
                </li>
                <li<?php echo (preg_match('/codeigniter/',$currentUrl) && preg_match('/site\/select\//',$currentUrl)) ? ' class="active"' : ''; ?>>
                    <a href="<?php echo $serverName; ?>/projects/codeigniter/index.php/site/select/">Select</a>
                </li>
                <li<?php echo (preg_match('/codeigniter/',$currentUrl) && preg_match('/site\/selectall\//',$currentUrl)) ? ' class="active"' : ''; ?>>
                    <a href="<?php echo $serverName; ?>/projects/codeigniter/index.php/site/selectall/">Select All</a>
                </li>
                <li<?php echo (preg_match('/codeigniter/',$currentUrl) && preg_match('/site\/selectallparams\//',$currentUrl)) ? ' class="active"' : ''; ?>>
                    <a href="<?php echo $serverName; ?>/projects/codeigniter/index.php/site/selectallparams/">Select All Params</a>
                </li>
            </ul>
    </li>
<!--    <li<?php echo (preg_match('/laravel/',$currentUrl)) ? ' class="active"' : ''; ?>>
        <a href="<?php echo $serverName; ?>/projects/laravel/">Laravel</a>
    </li>-->
<!--    <li<?php echo (preg_match('/symfony/',$currentUrl)) ? ' class="active"' : ''; ?>>
        <a href="<?php echo $serverName; ?>/projects/symfony/">Symfony</a>
    </li>-->
</ul>