<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
        <title>PHP Frameworks Performance Benchmark with Database</title>        
        <link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/css/main.css" />
        <script type="text/javascript" src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/js/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/js/main.js"></script>
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <?php include_once 'Library.php'; ?>
        <?php include_once 'variables.php'; ?>
        
        <script type="text/javascript">
            google.load("visualization", "1", {packages:["corechart"]});
            
            jQuery(window).resize(function(){
                drawChart0();
                drawChart1();
                drawChart2();
                drawChart3();
            });
            
            google.setOnLoadCallback(drawChart0);
            google.setOnLoadCallback(drawChart1);
            google.setOnLoadCallback(drawChart2);
            google.setOnLoadCallback(drawChart3);
            
            function drawChart0() {
                var data = google.visualization.arrayToDataTable([
                    ['Method', 'Small', 'Medium', 'Large', 'Average'],
                    ['Yii', <?php echo $all_Yii['small']; ?>, <?php echo $all_Yii['medium']; ?>, <?php echo $all_Yii['large']; ?>, <?php echo $all_Yii['average']; ?>],
                    ['Zend', <?php echo $all_Zend['small']; ?>, <?php echo $all_Zend['medium']; ?>, <?php echo $all_Zend['large']; ?>, <?php echo $all_Zend['average']; ?>],
                    ['Codeigniter', <?php echo $all_CI['small']; ?>, <?php echo $all_CI['medium']; ?>, <?php echo $all_CI['large']; ?>, <?php echo $all_CI['average']; ?>]
                ]);
                var options = {
                    title: 'All methods in Yii, Zend and Codeigniter compared with different table sizes',
                    height: 300,
                    vAxis: {title: 'Executions per minute', titleTextStyle: {color: 'red'}},
                    hAxis: {title: 'Framework Methods', titleTextStyle: {color: 'red'}},
                    seriesType: "bars",
                    series: {3: {type: "line"}}
                };
                var chart = new google.visualization.ComboChart(document.getElementById('chart0-all'));
                chart.draw(data, options);
            }
            
            function drawChart1() {
                var data = google.visualization.arrayToDataTable([
                    ['Database Type', 'Yii', 'Zend', 'Codeigniter'],
                    ['Small', <?php echo $selectall_Yii['small']; ?>, <?php echo $selectall_Zend['small']; ?>, <?php echo $selectall_CI['small']; ?>],
                    ['Medium', <?php echo $selectall_Yii['medium']; ?>, <?php echo $selectall_Zend['medium']; ?>, <?php echo $selectall_CI['medium']; ?>],
                    ['Large', <?php echo $selectall_Yii['large']; ?>, <?php echo $selectall_Zend['large']; ?>, <?php echo $selectall_CI['large']; ?>]
                ]);
                var options = {
                    title: 'Select all records from table',
                    vAxis: {title: 'Table Size', titleTextStyle: {color: 'red'}},
                    hAxis: {title: 'Executions per minute', titleTextStyle: {color: 'red'}},
                    height:300
                };
                var chart = new google.visualization.BarChart(document.getElementById('chart1-all'));
                chart.draw(data, options);
            }
            
            function drawChart2() {
                var data = google.visualization.arrayToDataTable([
                    ['Database Type', 'Yii(findAll())', 'Zend(fetchAll())', 'Codeigniter(get())'],
                    ['Small', <?php echo $findAll_Yii['small']; ?>, <?php echo $fetchAll_Zend['small']; ?>, <?php echo $get_CI['small']; ?>],
                    ['Medium', <?php echo $findAll_Yii['medium']; ?>, <?php echo $fetchAll_Zend['medium']; ?>, <?php echo $get_CI['medium']; ?>],
                    ['Large', <?php echo $findAll_Yii['large']; ?>, <?php echo $fetchAll_Zend['large']; ?>, <?php echo $get_CI['large']; ?>]
                ]);
                var options = {
                    title: 'Comparation between findAll(Yii), fetchAll(zend), get(codeigniter)',
                    vAxis: {title: 'Executions per minute', titleTextStyle: {color: 'red'}},
                    hAxis: {title: 'Table Size', titleTextStyle: {color: 'red'}},
                    chartArea: {width: "60%"}
                };
                var chart = new google.visualization.LineChart(document.getElementById('chart2-all'));
                chart.draw(data, options);
            }
            
            function drawChart3() {
                var data = google.visualization.arrayToDataTable([
                    ['Database Type', 'Yii (find())', 'Zend(fetchRow())', 'Codeigniter(get_where())'],
                    ['Small', <?php echo $find_Yii['small']; ?>, <?php echo $fetchRow_Zend['small']; ?>, <?php echo $get_where_CI['small']; ?>],
                    ['Medium', <?php echo $find_Yii['medium']; ?>, <?php echo $fetchRow_Zend['medium']; ?>, <?php echo $get_where_CI['medium']; ?>],
                    ['Large', <?php echo $find_Yii['large']; ?>, <?php echo $fetchRow_Zend['large']; ?>, <?php echo $get_where_CI['large']; ?>]
                ]);
                var options = {
                    title: 'Comparation between find(Yii), fetchRow(zend), get_where(codeigniter)',
                    vAxis: {title: 'Executions per minute', titleTextStyle: {color: 'red'}},
                    hAxis: {title: 'Table Size', titleTextStyle: {color: 'red'}},
                    chartArea: {width: "60%"}
                };
                var chart = new google.visualization.ColumnChart(document.getElementById('chart3-all'));
                chart.draw(data, options);
            }
        </script>
        
    </head>
    <body>
        
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-55221696-3', 'auto');
            ga('send', 'pageview');

        </script>
        
        <div id="menu"><?php include_once 'menu.php'; ?></div>
        <div class="body">
            <div class="container" id="page">
                
                <div id="introduction" class="block-wrapper">
                    <h1>PHP Frameworks Performance Benchmark with Database</h1>
                    <div class="block-description">
                        <p>
                            Project purpose is to compare speed in selecting records from database
                            in some of most used PHP frameworks.
                        </p>
                        <p>
                            Project have two goals:
                            First is to compare methods speed for selecting records from database internaly for each framework.
                            Second is to determinate which of compared frameworks is fastest in selecting records from database.                            
                        </p>
                        <p>
                            We have 3 tables in database with different number of records:
                            
                            <ul>
                                <li>s_post - 10 000 records</li>
                                <li>m_post - 100 000 records</li>
                                <li>l_post - 300 000 records</li>
                            </ul>
                        </p>
                        <p>
                            Almost all PHP frameworks use <b>Active Record</b> for database transactions.
                            Active Record is a pattern where every table from database is mapped into class.
                            Active Record casses have there own methods for selecting, editing and deleting record from database.
                        </p>
                        <p>
                            We are using Active Record classes of frameworks to determinate which framework
                            is faster in select operations.
                        </p>
                        <p>
                            <strong>
                                Comparing similar methods in different frameworks allows us to determine
                                which framework is faster.
                            </strong>
                        </p>
                        <p>
                            <strong>
                                Comparing three different table sizes will allows us to discover
                                how they will behave with increasing number of data.
                                This is very important question for choosing right framework for new project.
                            </strong>
                        </p>
                        <p>
                            All tests are maked on local machine using LAMP server, Linux Ubuntu distribution.
                            Software and hardware specifications are:
                            <ul>
                                <li>Processor: Intel Core i5-2430M (2 Cores, 4 Threads, 2.4GHz)</li>
                                <li>RAM memory: 6GB</li>
                                <li>Operating System: Linux Ubuntu 12.04 LTS, 32-bit</li>
                                <li>Apache version: 2.2.22</li>
                                <li>MySQL version: 5.6.21</li>
                                <li>PHP version: 5.3.10</li>
                            </ul>
                        </p>
                        <p>
                            Frameworks versions are:
                            <ul>
                                <li>Yii: 1.1.15</li>
                                <li>Zend: 1.11.11</li>
                                <li>Codeigniter: 2.2.0</li>
                            </ul>
                        </p>
                    </div>
                </div>
                
                <div id="selectall" class="block-wrapper">
                    <h2>Select all records</h2>
                    <div class="block-description">
                        In the diagram below we are comparing similar methods for
                        selecting all records from database table.
                    </div>
                    <div class="block-chart">
                        <div id="chart1-all"></div>
                    </div>
                    <div class="block-description">
                        Diagram above shows us that for selecting all records from table
                        Codeigniter is always fastest, no mather how many records we have in our table.
                    </div>
                </div>
                
                <div id="findAll-fetchAll-get" class="block-wrapper">
                    <h2>Comparation between findAll(Yii), fetchAll(zend), get(codeigniter)</h2>
                    <div class="block-description">
                        These three methods are mostly used in selecting multiple rows from database.
                        From the diagram we can conclude that get() method on Codeigniter is fastest,
                        followed by fetchAll() on Zend, and findAll() on Yii is drastically slower.
                    </div>
                    <div class="block-chart">
                        <div id="chart2-all"></div>
                    </div>
                </div>
                
                <div id="find-fetchRow-get_where" class="block-wrapper">
                    <h2>Comparation between find(Yii), fetchRow(zend), get_where(codeigniter)</h2>
                    <div class="block-description">
                        These three methods are mostly used in selecting single row from database.
                        In this comaration also leads get_where() method on Codeigniter,
                        than fetchRow() on Zend and find() method on Yii.
                    </div>
                    <div class="block-chart">
                        <div id="chart3-all"></div>
                    </div>
                </div>
                
                <div id="all-methods-database" class="block-wrapper">
                    <h2>All methods per table size</h2>
                    <div class="block-description">
                        This example is average execution time for all methods from one framework per table size.
                        In the diagram below we are comparing all methods from one framework
                        how they will act with different table sizes.
                    </div>
                    <div class="block-chart">
                        <div id="chart0-all"></div>
                    </div>
                    <div class="block-description">
                        This diagram show us that Codeigniter is the fastest framework, second is Yii and Zend is the slowest one.
                    </div>
                </div>
                
            </div>
        </div>
    </body>
</html>
