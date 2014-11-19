<div class="block-wrapper">
    <h1>Опис на методите</h1>
    <div class="block-description">
        <p>Опис на методите:</p>
        <ul>
            <li>
                <strong>find()</strong>
                -
                <span>
                    Еден запис со користење на find() методот. 
                    Прима објект од класата CDbCriteria како параметар.
                </span>
            </li>
            <li>
                <strong>findByPk()</strong>
                -
                <span>
                    Еден запис со користење на findByPk() методот.
                    findByPk() прима цел број (примарен клуч) како параметар.
                </span>
            </li>
            <li>
                <strong>findByAttributes()</strong>
                -
                <span>
                    Еден запис со користење на findByAttributes() методот.
                    findByAttributes() како параметар прима низа во која key е атрибутот а value е условот.
                </span>
            </li>
            <li>
                <strong>findBySql()</strong>
                -
                <span>
                    Еден запис со користење на findBySql() методот.
                    Прима два параметри: првиот е query каде наместо услов се става некој стринг,
                    а вториот е низа во која на стринговите од query-то и се доделуваат вредности.
                    Пример, findBySql("SELECT * FROM s_post WHERE id = :id", array(":id"=>5))
                </span>
            </li>
            <li>
                <strong>findAll()</strong>
                -
                <span>
                    Повеќе записи со користење на findAll() методот.
                    Доколку не прима параметар ги враќа сите записи од табелата.
                    Прима параметар објект од класата CDbCriteria().                        
                </span>
            </li>
            <li>
                <strong>findAllByPk()</strong>
                -
                <span>
                    Повеќе записи со користење на findAllByPk() методот.
                    Прима низа од цели броеви (примарни клучеви) како параметар
                    и во низа ги враќа соодветните редови од табелата.
                </span>
            </li>
            <li>
                <strong>findAllByAttributes()</strong>
                -
                <span>
                    Повеќе записи со користење на findAllByAttributes() методот.
                    Прима низа во која key е атрибутот а value е условот,
                    а како резултат враќа низа од редови од табелата кои го исполнуваат условот.
                </span>
            </li>
            <li>
                <strong>findAllBySql()</strong>
                -
                <span>
                    Повеќе записи со користење на findAllBySql() методот.
                    Прима два параметри: првиот е query каде наместо услов се става некој стринг,
                    а вториот е низа во која на стринговите од query-то и се доделуваат вредности.
                    Пример, findBySql("SELECT * FROM s_post WHERE id = :id", array(":id"=>5))
                    Враќа низа од редови од табелата кои го исполниле условот.
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
        var chart = new google.visualization.ColumnChart(document.getElementById('chart1-yii'));
        chart.draw(data, options);
    }
</script>