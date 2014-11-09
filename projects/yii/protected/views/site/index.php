<div class="block-wrapper">
    <h1>Опис на методите</h1>
    <div class="block-description">
        <p>Опис на методите:</p>
        <ul>
            <li>
                <strong>findByPk()</strong>
                - 
                <span>Прима цел број (примарен клуч) како параметар а како резултат враќа еден ред од база.</span>
            </li>
            <li>
                <strong>find()</strong>
                - 
                <span>Прима објект од класата CDbCriteria како параметар и на основа
                    на параметрите на објектот враќа еден ред од база како резултат.</span>
            </li>
        </ul>
    </div>
</div>

<div id="findByPk-find" class="block-wrapper">
    <h2>findByPk() & find()</h2>
    <div class="block-description">
        <p>Постојат случаеви во кои и двата метода можеме да ги користеме за иста цел 
            (Пример, сакаме да извадеме ред од база кога го имаме примарниот клуч).</p>
        <p>Од извршените тестови можеме да заклучиме дека во овие случаеви подобро е
            да го користиме методот findByPk() одколку find() бидејки е многу побрз.</p>
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
            ['Database Type', 'findByPk()', 'find()'],
            ['Small', <?php echo $findByPk_Yii['small']; ?>, <?php echo $find_Yii['small']; ?>],
            ['Medium', <?php echo $findByPk_Yii['medium']; ?>, <?php echo $find_Yii['medium']; ?>],
            ['Large', <?php echo $findByPk_Yii['large']; ?>, <?php echo $find_Yii['large']; ?>]
        ]);
        var options = {
            title: 'findByPk() & find() in Yii',
            hAxis: {title: 'Table Size', titleTextStyle: {color: 'red'}}
        };
        var chart = new google.visualization.ColumnChart(document.getElementById('chart1-yii'));
        chart.draw(data, options);
    }
</script>