<div id="find-findByPk" class="block-wrapper">
    <h1>find() & findByPk()</h1>
    <div class="block-description">
        Some description
    </div>
    <div class="block-chart">
        <div id="chart-find-findByPk"></div>
    </div>
</div>

<script type="text/javascript">
    google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawChart);
    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Database Type', 'find()', 'findByPk()'],
            ['Small', <?php echo $findData['small']; ?>, <?php echo $pkData['small']; ?>],
            ['Medium', <?php echo $findData['medium']; ?>, <?php echo $pkData['medium']; ?>],
            ['Large', <?php echo $findData['large']; ?>, <?php echo $pkData['large']; ?>]
        ]);

        var options = {
            title: 'find() & findByPk()',
            hAxis: {title: 'Database size', titleTextStyle: {color: 'red'}}
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart-find-findByPk'));

        chart.draw(data, options);

    }
</script>