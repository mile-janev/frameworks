<div class="block-wrapper">
    <h2>Methods description:</h2>
    <h5>All methods who start with word 'find' return one result from database, or null if results are not found.</h5>
    <h5>All methods who start with word 'findAll' return array of results, or empty array if results are not found.</h5>
    <h5>Every 'find' method has corresponding 'findAll' method.</h5>
    <h5>Every single result is an object who contains attributes with corresponding columns from database table.</h5>
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

<div class="block-wrapper">
    
    <div class="block-wrapper-inner">
        <h2>Different methods for same purpose</h2>
        <div class="block-description">
            <p>
                Somethimes we have cases where multiple methods can be used for same purpose.
            </p>
        </div>
    </div>
    
    <div class="block-wrapper-inner">
        <h3>Fastest method</h3>
        <div class="block-description">
            <p>
                Chart above shows us that fastest method
                for selecting data in Zend is fetchAll() method.
            </p>
        </div>
    </div>
    
    <div class="block-wrapper-inner">
        <h3>Selecting one record (find(), findByPk(), findByAttributes(), findBySql())</h3>
        <div class="block-description">
            <p>
                All of these methods will return one record from database. 
                A bit different is findByPk() method who search only by primary key.
                From comparing these methods we can conclude that findByPk() is fastest.
                If we need to search by attribute, than the first option needs to be findByAttributes().
            </p>
        </div>
        <div class="block-chart">
            <div id="chart2-yii"></div>
        </div>
    </div>
    
    <div class="block-wrapper-inner">
        <h3>Selecting multiple records (findAll(), findAllByPk(), findAllByAttributes(), findAllBySql())</h3>
        <div class="block-description">
            <p>
                All of these methods return us all result from database which will satisfy the query.
                First option (after findAllByPk()) needs to be findByAttributes(), a parallel method of 
                findByAttributes().
            </p>
        </div>
        <div class="block-chart">
            <div id="chart3-yii"></div>
        </div>
    </div>
    
</div>

<script type="text/javascript">
    google.load("visualization", "1", {packages:["corechart"]});
    
    google.setOnLoadCallback(drawChart1);
    google.setOnLoadCallback(drawChart2);
    google.setOnLoadCallback(drawChart3);
    
    function drawChart1() {
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
    
    function drawChart2() {
        var data = google.visualization.arrayToDataTable([
            ['Method', 'Small', 'Medium', 'Large', 'Average'],
            ['find()', <?php echo $find_Yii['small']; ?>, <?php echo $find_Yii['medium']; ?>, <?php echo $find_Yii['large']; ?>, <?php echo $find_Yii['average']; ?>],
            ['findByPk()', <?php echo $findByPk_Yii['small']; ?>, <?php echo $findByPk_Yii['medium']; ?>, <?php echo $findByPk_Yii['large']; ?>, <?php echo $findByPk_Yii['average']; ?>],
            ['findByAttributes()', <?php echo $findByAttributes_Yii['small']; ?>, <?php echo $findByAttributes_Yii['medium']; ?>, <?php echo $findByAttributes_Yii['large']; ?>, <?php echo $findByAttributes_Yii['average']; ?>],
            ['findBySql()', <?php echo $findBySql_Yii['small']; ?>, <?php echo $findBySql_Yii['medium']; ?>, <?php echo $findBySql_Yii['large']; ?>, <?php echo $findBySql_Yii['average']; ?>]
        ]);
        var options = {
            title: 'findAll(), findAllByPk(), findAllByAttributes(), findAllBySql() in Yii',
            height: 300,
            vAxis: {title: 'Executions per second'},
            hAxis: {title: "Method"},
            seriesType: "bars",
            series: {3: {type: "line"}}
        };
        var chart = new google.visualization.ComboChart(document.getElementById('chart2-yii'));
        chart.draw(data, options);
    }
    
    function drawChart3() {
        var data = google.visualization.arrayToDataTable([
            ['Method', 'Small', 'Medium', 'Large', 'Average'],
            ['findAll()', <?php echo $findAll_Yii['small']; ?>, <?php echo $findAll_Yii['medium']; ?>, <?php echo $findAll_Yii['large']; ?>, <?php echo $findAll_Yii['average']; ?>],
            ['findAllByPk()', <?php echo $findAllByPk_Yii['small']; ?>, <?php echo $findAllByPk_Yii['medium']; ?>, <?php echo $findAllByPk_Yii['large']; ?>, <?php echo $findAllByPk_Yii['average']; ?>],
            ['findAllByAttributes()', <?php echo $findAllByAttributes_Yii['small']; ?>, <?php echo $findAllByAttributes_Yii['medium']; ?>, <?php echo $findAllByAttributes_Yii['large']; ?>, <?php echo $findAllByAttributes_Yii['average']; ?>],
            ['findAllBySql()', <?php echo $findAllBySql_Yii['small']; ?>, <?php echo $findAllBySql_Yii['medium']; ?>, <?php echo $findAllBySql_Yii['large']; ?>, <?php echo $findAllBySql_Yii['average']; ?>]
        ]);
        var options = {
            title: 'findAll(), findAllByPk(), findAllByAttributes(), findAllBySql() in Yii',
            height: 300,
            vAxis: {title: 'Executions per second'},
            hAxis: {title: "Method"},
            seriesType: "bars",
            series: {3: {type: "line"}}
        };
        var chart = new google.visualization.ComboChart(document.getElementById('chart3-yii'));
        chart.draw(data, options);
    }
</script>