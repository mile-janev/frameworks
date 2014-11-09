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
                    ['Database Type', 'Select one', 'get_where()'],
                    ['Small', <?php echo $select_ci['small']; ?>, <?php echo $get_where_ci['small']; ?>],
                    ['Medium', <?php echo $select_ci['medium']; ?>, <?php echo $get_where_ci['medium']; ?>],
                    ['Large', <?php echo $select_ci['large']; ?>, <?php echo $get_where_ci['large']; ?>]
                ]);
                var options = {
                    title: 'Select one & get_where() in Codeigniter',
                    hAxis: {title: 'Table Size', titleTextStyle: {color: 'red'}}
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
                    <h1>Опис на методите</h1>
                    <div class="block-description">
                        <p>Опис на методите:</p>
                        <ul>
                            <li>
                                <strong>Select one</strong>
                                - 
                                <span>Селектираме само еден ред според custom query.</span>
                            </li>
                            <li>
                                <strong>get_where()</strong>
                                - 
                                <span>Селектираме еден ред според методот get_where кој е дел од Active Record класата.</span>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div id="selectone-get_where" class="block-wrapper">
                    <h2>Select one & get_where()</h2>
                    <div class="block-description">
                        <p>Постојат случаеви во кои и двата метода можеме да ги користеме за иста цел).</p>
                        <p>Од извршените тестови можеме да заклучиме дека во овие случаеви подобро е
                            да користиме custom query одколку get_where() методот бидејки е многу побрзо.</p>
                    </div>
                    <div class="block-chart">
                        <div id="chart1-codeigniter"></div>
                    </div>
                </div>
                
            </div>
        </div>
        
    </body>
</html>