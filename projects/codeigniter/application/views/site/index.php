<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Codeigniter | PHP Frameworks Performance Benchmark</title>
        <link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/css/main.css" />
        <script type="text/javascript" src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/js/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/js/main.js"></script>
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        
        <script type="text/javascript">
            google.load("visualization", "1", {packages:["corechart"]});

            jQuery(window).resize(function(){
                drawChart();
            });

            google.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Database Type', 'get_where()', 'get()', 'query()'],
                    ['Small', <?php echo $get_where_ci['small']; ?>, <?php echo $get_ci['small']; ?>, <?php echo $query_ci['small']; ?>],
                    ['Medium', <?php echo $get_where_ci['medium']; ?>, <?php echo $get_ci['medium']; ?>, <?php echo $query_ci['medium']; ?>],
                    ['Large', <?php echo $get_where_ci['large']; ?>, <?php echo $get_ci['large']; ?>, <?php echo $query_ci['large']; ?>]
                ]);
                var options = {
                    title: 'get_where(), get() & query() in Codeigniter',
                    vAxis: {title: 'Executions per second', titleTextStyle: {color: 'red'}},
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
                    
                    <h2>Different methods for same purpose</h2>
                    <div class="block-description">
                        <p>
                            Somethimes we have cases where multiple methods can be used for same purpose. 
                        </p>
                    </div>
                    
                    <div class="block-wrapper-inner">
                        <h3>Fastest method</h3>
                        <div class="block-description">
                            <p>
                                Chart above shows us that fastest method
                                for selecting data in Codeigniter is query() method.
                            </p>
                        </div>
                    </div>

                    <div class="block-wrapper-inner">
                        <h3>get() & query()</h3>
                        <div class="block-description">
                            <p>
                                If we need to build complicated select query, we can use get() or query() functions.
                                As we can see from the diagram above, using query() is much faster than using get() method.
                            </p>
                            <p>
                                But, Codeigniter programmers preffer using get() method before query().
                                Main reason is because get() allows query to be written partially (dynamically),
                                not just as string which is case for query() method.
                            </p>
                        </div>
                    </div>
                    
                </div>
                
            </div>
        </div>
        
    </body>
</html>