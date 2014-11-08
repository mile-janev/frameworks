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
        
        <script type="text/javascript">
            google.load("visualization", "1", {packages:["corechart"]});
            
            google.setOnLoadCallback(drawChart1);
            google.setOnLoadCallback(drawChart2);
            google.setOnLoadCallback(drawChart3);
            
            function drawChart1() {
                var data = google.visualization.arrayToDataTable([
                    ['Database Type', 'Yii', 'Zend', 'Codeigniter'],
                    ['Small', <?php echo $selectall_Yii['small']; ?>, <?php echo $selectall_Zend['small']; ?>, <?php echo $selectall_CI['small']; ?>],
                    ['Medium', <?php echo $selectall_Yii['medium']; ?>, <?php echo $selectall_Zend['medium']; ?>, <?php echo $selectall_CI['medium']; ?>],
                    ['Large', <?php echo $selectall_Yii['large']; ?>, <?php echo $selectall_Zend['large']; ?>, <?php echo $selectall_CI['large']; ?>]
                ]);
                var options = {
                    title: 'Select all records from table',
                    hAxis: {title: 'Table Size', titleTextStyle: {color: 'red'}},
                    height:500
                };
                var chart = new google.visualization.BarChart(document.getElementById('chart1-all'));
                chart.draw(data, options);
            }
            
            function drawChart2() {
                var data = google.visualization.arrayToDataTable([
                    ['Database Type', 'Yii', 'Zend', 'Codeigniter'],
                    ['Small', <?php echo $findAll_Yii['small']; ?>, <?php echo $fetchAll_Zend['small']; ?>, <?php echo $get_where_CI['small']; ?>],
                    ['Medium', <?php echo $findAll_Yii['medium']; ?>, <?php echo $fetchAll_Zend['medium']; ?>, <?php echo $get_where_CI['medium']; ?>],
                    ['Large', <?php echo $findAll_Yii['large']; ?>, <?php echo $fetchAll_Zend['large']; ?>, <?php echo $get_where_CI['large']; ?>]
                ]);
                var options = {
                    title: 'Comparation between findAll(Yii), fetchAll(zend), get_where(codeigniter)',
                    hAxis: {title: 'Table Size', titleTextStyle: {color: 'red'}},
                };
                var chart = new google.visualization.LineChart(document.getElementById('chart2-all'));
                chart.draw(data, options);
            }
            
            function drawChart3() {
                var data = google.visualization.arrayToDataTable([
                    ['Database Type', 'Yii', 'Zend', 'Codeigniter'],
                    ['Small', <?php echo $find_Yii['small']; ?>, <?php echo $fetchRow_Zend['small']; ?>, <?php echo $select_CI['small']; ?>],
                    ['Medium', <?php echo $find_Yii['medium']; ?>, <?php echo $fetchRow_Zend['medium']; ?>, <?php echo $select_CI['medium']; ?>],
                    ['Large', <?php echo $find_Yii['large']; ?>, <?php echo $fetchRow_Zend['large']; ?>, <?php echo $select_CI['large']; ?>]
                ]);
                var options = {
                    title: 'Comparation between find(Yii), fetchRow(zend), select(codeigniter)',
                    hAxis: {title: 'Table Size', titleTextStyle: {color: 'red'}},
                };
                var chart = new google.visualization.ColumnChart(document.getElementById('chart3-all'));
                chart.draw(data, options);
            }
        </script>
        
    </head>
    <body>
        <div id="menu"><?php include_once 'menu.php'; ?></div>
        <div class="body">
            <div class="container" id="page">
                
                <div id="introduction" class="block-wrapper">
                    <h1>PHP Frameworks Speed Benchmark</h1>
                    <div class="block-description">
                        <p>Целта на проектот е да се провери кои PHP фрејмворци се најбрзи при операциите со бази на податоци.</p>
                        <p>
                            Во проектот користиме 3 табели, во кои имаме различен број на податоци и тоа:
                            <ul>
                                <li>- s_post - 10 000 податоци</li>
                                <li>- m_post - 100 000 податоци</li>
                                <li>- l_post - 300 000 податоци</li>
                            </ul>
                        </p>
                        <p>
                            Сите PHP фрејмворци користат <b>Active Record</b> за операции со бази на податоци.
                            Active Record е патерн според кој табела од база се мапира во класа.
                            Active Record класите имаат свои методи за селектирање, едитирање или бришење на запис од база.
                        </p>
                        <p>
                            Ние ги користиме Active Record класите на фрејмворците со цел да откриеме
                            кој фрејмворк најбрзо се справува со операциите на селектирање на запис од база.
                        </p>
                        <p>
                            <b>Правиме споредба помеѓу методите кои ја имаат истата функција во различен фрејмворк,
                                и на тој начин откриваме кој е побрз.</b>
                        </p>
                        <p>
                            <b>Правиме споредба во три различни типа на табели со цел да откриеме како ќе се однесуваат при
                                различен број на податоци.</b>
                        </p>
                    </div>
                </div>
                
                <div id="selectall" class="block-wrapper">
                    <h2>Select all records</h2>
                    <div class="block-description">
                        Се селектираат сите записи од табелите.
                    </div>
                    <div class="block-chart">
                        <div id="chart1-all"></div>
                    </div>
                </div>
                
                <div id="findAll-fetchAll-get_where" class="block-wrapper">
                    <h2>Comparation between findAll(Yii), fetchAll(zend), get_where(codeigniter)</h2>
                    <div class="block-description">
                        Компарација меѓу findAll(Yii), fetchAll(zend), get_where(codeigniter)
                    </div>
                    <div class="block-chart">
                        <div id="chart2-all"></div>
                    </div>
                </div>
                
                <div id="find-fetchRow-select" class="block-wrapper">
                    <h2>Comparation between find(Yii), fetchRow(zend), Select one record (codeigniter)</h2>
                    <div class="block-description">
                        Компарација меѓу find(Yii), fetchRow(zend), Select one record (codeigniter)
                    </div>
                    <div class="block-chart">
                        <div id="chart3-all"></div>
                    </div>
                </div>
                
            </div>
        </div>
    </body>
</html>