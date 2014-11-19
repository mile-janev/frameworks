<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Codeigniter | PHP Frameworks Speed Benchmark</title>
        <link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/css/main.css" />
        <script type="text/javascript" src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/js/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/js/main.js"></script>
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        
        <script type="text/javascript">
            google.load("visualization", "1", {packages:["corechart"]});

            google.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Database Type', 'query()', 'get()', 'get_where()'],
                    ['Small', <?php echo $query_ci['small']; ?>, <?php echo $get_ci['small']; ?>, <?php echo $get_where_ci['small']; ?>],
                    ['Medium', <?php echo $query_ci['medium']; ?>, <?php echo $get_ci['medium']; ?>, <?php echo $get_where_ci['medium']; ?>],
                    ['Large', <?php echo $query_ci['large']; ?>, <?php echo $get_ci['large']; ?>, <?php echo $get_where_ci['large']; ?>]
                ]);
                var options = {
                    title: 'query(), get() & get_where() in Codeigniter',
                    hAxis: {title: 'Table Size', titleTextStyle: {color: 'red'}},
                    height: 300
                };
                var chart = new google.visualization.ColumnChart(document.getElementById('chart1-codeigniter'));
                chart.draw(data, options);
            }
        </script>
        
    </head>

    <body>

        <div id="menu"><?php include_once $_SERVER['DOCUMENT_ROOT'].'/menu.php'; ?></div>

        <div class="body">
            <div class="container" id="page">
                
                <div class="block-wrapper">
                    <h2>Methods description:</h2>
                    <h5>
                        All methods return object of class CI_DB_mysql_result.
                        Requires using of row() or result() on this object, so all records
                        will be fetched into stdClass object or array of objects from stdClass.
                    </h5>
                    <div class="block-description">
                        <ul>
                            <li>
                                <strong>get_where()</strong>
                                - 
                                <span>
                                    Receiving four parameters:
                                    First is table name (string),
                                    second is condition (array of key=>value, where 'key' is table column and 'value' is our condition),
                                    third is limit and fourth is offset. Third and fourth parameters are not mandatory.
                                </span>
                            </li>
                            <li>
                                <strong>get()</strong>
                                - 
                                <span>
                                    Custom partial query.
                                </span>
                            </li>
                            <li>
                                <strong>query()</strong>
                                - 
                                <span>
                                    Custom query prepared for direct executing in database.
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="block-wrapper">
                    <div class="block-chart">
                        <div id="chart1-codeigniter"></div>
                    </div>
                </div>
                
                <div id="query-get_where" class="block-wrapper">
                    <h2>query(), get() & get_where()</h2>
                    <div class="block-description">
                        <p>Постојат случаеви во кои query(), get() и get_where() методите можеме да ги користеме за иста цел.</p>
                        <p>Од извршените тестови можеме да заклучиме дека во овие случаеви најбрз е query() методот.</p>
                    </div>
                </div>
                
            </div>
        </div>
        
    </body>
</html>