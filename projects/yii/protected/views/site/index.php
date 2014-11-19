<div class="block-wrapper">
    <h2>Methods description:</h2>
    <h5>
        <p>All methods who start with word 'find' return one result from database, or null if results are not found.</p>
        <p>All methods who start with word 'findAll' return array of results, or empty array if results are not found.</p>
        <p>Every 'find' method has corresponding 'findAll' method.</p>
        <p>Every single result is an object who contains attributes with corresponding columns from database table.</p>
    </h5>
    <div class="block-description">
        <ul>
            <li>
                <strong>find()</strong>
                -
                <span>
                    Receiving an object from class CDbCriteria as parameter 
                    and return one record (row from database/object) as result.
                </span>
            </li>
            <li>
                <strong>findByPk()</strong>
                -
                <span>
                    Receiving integer (primary key for table) as parameter
                    and return object as result.
                </span>
            </li>
            <li>
                <strong>findByAttributes()</strong>
                -
                <span>
                    Receiving an array in format key=>value as parameter,
                    where 'key' is column in database table and 'value' is our condition.
                    Return object as result.
                </span>
            </li>
            <li>
                <strong>findBySql()</strong>
                -
                <span>
                    Can receive one or two parameters:
                    First is custom defined query where all condition values will be replaced with some strings,
                    and second is an array of strings from first parameter and values.
                    Return object as result.
                    <i>Example: findBySql("SELECT * FROM s_post WHERE id = :id", array(":id"=>5))</i>
                </span>
            </li>
            <li>
                <strong>findAll()</strong>
                -
                <span>
                    Receiving an object from class CDbCriteria as parameter 
                    and returns an array of records who are matching this criteria.
                    If parameter is not bounded, all records from database table will be returned.
                </span>
            </li>
            <li>
                <strong>findAllByPk()</strong>
                -
                <span>
                    Receiving an array of integers (primary keys) as parameter
                    and returns an array of records who are matching this criteria.
                </span>
            </li>
            <li>
                <strong>findAllByAttributes()</strong>
                -
                <span>
                    Receiving an array in format key=>value, where 'key' is a column in database
                    and 'value' is our condition. Returns an array of records who are matching this criteria.
                </span>
            </li>
            <li>
                <strong>findAllBySql()</strong>
                -
                <span>
                    Can receive one or two parameters:
                    First is custom defined query where all condition values will be replaced with some strings,
                    and second is an array of strings from first parameter and values.
                    Returns an array of records who are matching this criteria.
                    <i>Example: findAllBySql("SELECT * FROM s_post WHERE id < :id", array(":id"=>5))</i>
                </span>
            </li>
        </ul>
    </div>
</div>

<div class="block-wrapper">
    <div class="block-chart">
        <div id="chart1-yii"></div>
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
</div>

<script type="text/javascript">
    google.load("visualization", "1", {packages:["corechart"]});
    
    google.setOnLoadCallback(drawChart);
    
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            [
                'Database Type',
                'find()', 'findByPk()', 'findByAttributes()', 'findBySql()',
                'findAll()', 'findAllByPk()', 'findAllByAttributes()', 'findAllBySql()'
            ],
            [
                'Small', 
                <?php echo $find_Yii['small']; ?>, <?php echo $findByPk_Yii['small']; ?>, <?php echo $findByAttributes_Yii['small']; ?>, <?php echo $findBySql_Yii['small']; ?>,
                <?php echo $find_Yii['small']; ?>, <?php echo $findByPk_Yii['small']; ?>, <?php echo $findByAttributes_Yii['small']; ?>, <?php echo $findBySql_Yii['small']; ?>
            ],
            [
                'Medium', 
                <?php echo $find_Yii['medium']; ?>, <?php echo $findByPk_Yii['medium']; ?>, <?php echo $findByAttributes_Yii['medium']; ?>, <?php echo $findBySql_Yii['medium']; ?>,
                <?php echo $findAll_Yii['medium']; ?>, <?php echo $findAllByPk_Yii['medium']; ?>, <?php echo $findAllByAttributes_Yii['medium']; ?>, <?php echo $findAllBySql_Yii['medium']; ?>
            ],
            [
                'Large', 
               <?php echo $find_Yii['large']; ?>, <?php echo $findByPk_Yii['large']; ?>, <?php echo $findByAttributes_Yii['large']; ?>, <?php echo $findBySql_Yii['large']; ?>,
                <?php echo $findAll_Yii['large']; ?>, <?php echo $findAllByPk_Yii['large']; ?>, <?php echo $findAllByAttributes_Yii['large']; ?>, <?php echo $findAllBySql_Yii['large']; ?>
            ]
        ]);
        var options = {
            title: 'find(), findByPk(), findByAttributes(), findBySql(), findAll(), findAllByPk(), findAllByAttributes(), findAllBySql() in Yii',
            hAxis: {title: 'Table Size', titleTextStyle: {color: 'red'}},
            height: 300
        };
        var chart = new google.visualization.LineChart(document.getElementById('chart1-yii'));
        chart.draw(data, options);
    }
</script>