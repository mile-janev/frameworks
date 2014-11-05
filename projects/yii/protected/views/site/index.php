<div id="find-findByPk" class="block-wrapper">
    <h2>find() & findByPk()</h2>
    <div class="block-description">
        Компарација помеѓу find() и findByPk() со цел да се докаже дека е подобро да се користи
        findByPk() наместо find() кога како параметар за пребарување имаме примарен клуч.
    </div>
    <div class="block-chart">
        <div id="chart1-yii"></div>
    </div>
</div>

<script type="text/javascript">
    google.load("visualization", "1", {packages:["corechart"]});
    
    google.setOnLoadCallback(drawChart);
    
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Database Type', 'find()', 'findByPk()'],
            ['Small', <?php echo $find_Yii['small']; ?>, <?php echo $findByPk_Yii['small']; ?>],
            ['Medium', <?php echo $find_Yii['medium']; ?>, <?php echo $findByPk_Yii['medium']; ?>],
            ['Large', <?php echo $find_Yii['large']; ?>, <?php echo $findByPk_Yii['large']; ?>]
        ]);
        var options = {
            title: 'find() & findByPk() in Yii',
            hAxis: {title: 'Table Size', titleTextStyle: {color: 'red'}}
        };
        var chart = new google.visualization.ColumnChart(document.getElementById('chart1-yii'));
        chart.draw(data, options);
    }
</script>