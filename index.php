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
                    hAxis: {titleTextStyle: {color: 'red'}},
                    height:300
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
                    ['Small', <?php echo $find_Yii['small']; ?>, <?php echo $fetchRow_Zend['small']; ?>, <?php echo $get_where_CI['small']; ?>],
                    ['Medium', <?php echo $find_Yii['medium']; ?>, <?php echo $fetchRow_Zend['medium']; ?>, <?php echo $get_where_CI['medium']; ?>],
                    ['Large', <?php echo $find_Yii['large']; ?>, <?php echo $fetchRow_Zend['large']; ?>, <?php echo $get_where_CI['large']; ?>]
                ]);
                var options = {
                    title: 'Comparation between find(Yii), fetchRow(zend), get_where(codeigniter)',
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
                            <b>
                                Comparing similar methods in different frameworks allows us to determine
                                which framework is faster.
                            </b>
                        </p>
                        <p>
                            <b>
                                Comparing three different table sizes will allows us to discover
                                how they will behave with increasing number of data.
                                This is very important question for choosing right framework for new project.
                            </b>
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
                        Zend is always fastest, no mather how many records we have in our table.
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