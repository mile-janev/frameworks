<?php $serverName = "http://".$_SERVER['HTTP_HOST']; ?>
<?php $currentUrl = $_SERVER['REQUEST_URI']; ?>

<div id="titleSite"><a href="<?php echo $serverName; ?>">PHP Frameworks Performance Benchmark with Database Operations</a></div>
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
                <a href="<?php echo $serverName; ?>/projects/yii/index.php?r=site/find/">find()</a>
            </li>
            <li<?php echo (preg_match('/yii/',$currentUrl) && preg_match('/site\/findbypk\//',$currentUrl)) ? ' class="active"' : ''; ?>>
                <a href="<?php echo $serverName; ?>/projects/yii/index.php?r=site/findbypk/">findByPk()</a>
            </li>            
            <li<?php echo (preg_match('/yii/',$currentUrl) && preg_match('/site\/findbyattributes\//',$currentUrl)) ? ' class="active"' : ''; ?>>
                <a href="<?php echo $serverName; ?>/projects/yii/index.php?r=site/findbyattributes/">findByAttributes()</a>
            </li>
            <li<?php echo (preg_match('/yii/',$currentUrl) && preg_match('/site\/findbysql\//',$currentUrl)) ? ' class="active"' : ''; ?>>
                <a href="<?php echo $serverName; ?>/projects/yii/index.php?r=site/findbysql/">findBySql()</a>
            </li>
            <li<?php echo (preg_match('/yii/',$currentUrl) && preg_match('/site\/findall\//',$currentUrl)) ? ' class="active"' : ''; ?>>
                <a href="<?php echo $serverName; ?>/projects/yii/index.php?r=site/findall/">findAll()</a>
            </li>
            <li<?php echo (preg_match('/yii/',$currentUrl) && preg_match('/site\/findallbypk\//',$currentUrl)) ? ' class="active"' : ''; ?>>
                <a href="<?php echo $serverName; ?>/projects/yii/index.php?r=site/findallbypk/">findAllByPk()</a>
            </li>
            <li<?php echo (preg_match('/yii/',$currentUrl) && preg_match('/site\/findballyattributes\//',$currentUrl)) ? ' class="active"' : ''; ?>>
                <a href="<?php echo $serverName; ?>/projects/yii/index.php?r=site/findallbyattributes/">findAllByAttributes()</a>
            </li>
            <li<?php echo (preg_match('/yii/',$currentUrl) && preg_match('/site\/findallbysql\//',$currentUrl)) ? ' class="active"' : ''; ?>>
                <a href="<?php echo $serverName; ?>/projects/yii/index.php?r=site/findallbysql/">findAllBySql()</a>
            </li>
        </ul>
    </li>
    <li<?php echo (preg_match('/zend/',$currentUrl)) ? ' class="active"' : ''; ?>>
        <a href="<?php echo $serverName; ?>/projects/zend/public/site/index/">Zend</a>
        <ul class="subMenu">
            <li<?php echo (preg_match('/zend/',$currentUrl) && preg_match('/site\/index\//',$currentUrl)) ? ' class="active"' : ''; ?>>
                <a href="<?php echo $serverName; ?>/projects/zend/public/site/index/">Statistic</a>
            </li>
            <li<?php echo (preg_match('/zend/',$currentUrl) && preg_match('/site\/selectall\//',$currentUrl)) ? ' class="active"' : ''; ?>>
                <a href="<?php echo $serverName; ?>/projects/zend/public/site/selectall/">Select All</a>
            </li>
            <li<?php echo (preg_match('/zend/',$currentUrl) && preg_match('/site\/find\//',$currentUrl)) ? ' class="active"' : ''; ?>>
                <a href="<?php echo $serverName; ?>/projects/zend/public/site/find/">find()</a>
            </li>
            <li<?php echo (preg_match('/zend/',$currentUrl) && preg_match('/site\/fetchrow\//',$currentUrl)) ? ' class="active"' : ''; ?>>
                <a href="<?php echo $serverName; ?>/projects/zend/public/site/fetchrow/">fetchRow()</a>
            </li>
            <li<?php echo (preg_match('/zend/',$currentUrl) && preg_match('/site\/fetchall\//',$currentUrl)) ? ' class="active"' : ''; ?>>
                <a href="<?php echo $serverName; ?>/projects/zend/public/site/fetchall/">fetchAll()</a>
            </li>
            <li<?php echo (preg_match('/zend/',$currentUrl) && preg_match('/site\/zenddbselect\//',$currentUrl)) ? ' class="active"' : ''; ?>>
                <a href="<?php echo $serverName; ?>/projects/zend/public/site/zenddbselect/">Zend_Db_Select</a>
            </li>
        </ul>
    </li>
    <li<?php echo (preg_match('/codeigniter/',$currentUrl)) ? ' class="active"' : ''; ?>>
        <a href="<?php echo $serverName; ?>/projects/codeigniter/index.php/site/index/">Codeigniter</a>
        <ul class="subMenu">
            <li<?php echo (preg_match('/codeigniter/',$currentUrl) && preg_match('/site\/index\//',$currentUrl)) ? ' class="active"' : ''; ?>>
                <a href="<?php echo $serverName; ?>/projects/codeigniter/index.php/site/index/">Statistic</a>
            </li>
            <li<?php echo (preg_match('/codeigniter/',$currentUrl) && preg_match('/site\/selectall\//',$currentUrl)) ? ' class="active"' : ''; ?>>
                <a href="<?php echo $serverName; ?>/projects/codeigniter/index.php/site/selectall/">Select All</a>
            </li>
            <li<?php echo (preg_match('/codeigniter/',$currentUrl) && preg_match('/site\/getwhere\//',$currentUrl)) ? ' class="active"' : ''; ?>>
                <a href="<?php echo $serverName; ?>/projects/codeigniter/index.php/site/getwhere/">get_where()</a>
            </li>
            <li<?php echo (preg_match('/codeigniter/',$currentUrl) && preg_match('/site\/getmethod\//',$currentUrl)) ? ' class="active"' : ''; ?>>
                <a href="<?php echo $serverName; ?>/projects/codeigniter/index.php/site/getmethod/">get()</a>
            </li>
            <li<?php echo (preg_match('/codeigniter/',$currentUrl) && preg_match('/site\/querymethod\//',$currentUrl)) ? ' class="active"' : ''; ?>>
                <a href="<?php echo $serverName; ?>/projects/codeigniter/index.php/site/querymethod/">query()</a>
            </li>
        </ul>
    </li>
     <li<?php echo (preg_match('/database/',$currentUrl)) ? ' class="active"' : ''; ?>>
        <a href="<?php echo $serverName; ?>/database/notes.html">Notes</a>
     </li>
</ul>