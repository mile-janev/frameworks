<?php
if (strpos($_SERVER['DOCUMENT_ROOT'], 'wamp')) {
    $password = "";
} else {
    $password = "toor";
}

$executions = 2;

$mysql_database = "frameworks";
$db = @mysql_connect("localhost", "root", $password) or die("Could not connect database");
mysql_select_db($mysql_database, $db) or die("Could not select database");

//Yii
$query = "SELECT COUNT(*) as number FROM statistic WHERE framework = 'yii' AND function = 'selectall'";
$row = mysql_fetch_object(mysql_query($query));
if ($row->number < $executions) {
    $url = 'http://frameworks.dev/projects/yii/index.php?r=site/selectall/';
    execute_link($url);
}

$query = "SELECT COUNT(*) as number FROM statistic WHERE framework = 'yii' AND function = 'find()'";
$row = mysql_fetch_object(mysql_query($query));
if ($row->number < $executions) {
    $url = 'http://frameworks.dev/projects/yii/index.php?r=site/find/';
    execute_link($url);
}

$query = "SELECT COUNT(*) as number FROM statistic WHERE framework = 'yii' AND function = 'findByPk()'";
$row = mysql_fetch_object(mysql_query($query));
if ($row->number < $executions) {
    $url = 'http://frameworks.dev/projects/yii/index.php?r=site/findbypk/';
    execute_link($url);
}

$query = "SELECT COUNT(*) as number FROM statistic WHERE framework = 'yii' AND function = 'findByAttributes()'";
$row = mysql_fetch_object(mysql_query($query));
if ($row->number < $executions) {
    $url = 'http://frameworks.dev/projects/yii/index.php?r=site/findbyattributes/';
    execute_link($url);
}

$query = "SELECT COUNT(*) as number FROM statistic WHERE framework = 'yii' AND function = 'findBySql()'";
$row = mysql_fetch_object(mysql_query($query));
if ($row->number < $executions) {
    $url = 'http://frameworks.dev/projects/yii/index.php?r=site/findbysql/';
    execute_link($url);
}

$query = "SELECT COUNT(*) as number FROM statistic WHERE framework = 'yii' AND function = 'findAll()'";
$row = mysql_fetch_object(mysql_query($query));
if ($row->number < $executions) {
    $url = 'http://frameworks.dev/projects/yii/index.php?r=site/findall/';
    execute_link($url);
}

$query = "SELECT COUNT(*) as number FROM statistic WHERE framework = 'yii' AND function = 'findAllByPk()'";
$row = mysql_fetch_object(mysql_query($query));
if ($row->number < $executions) {
    $url = 'http://frameworks.dev/projects/yii/index.php?r=site/findallbypk/';
    execute_link($url);
}

$query = "SELECT COUNT(*) as number FROM statistic WHERE framework = 'yii' AND function = 'findAllByAttributes()'";
$row = mysql_fetch_object(mysql_query($query));
if ($row->number < $executions) {
    $url = 'http://frameworks.dev/projects/yii/index.php?r=site/findallbyattributes/';
    execute_link($url);
}

$query = "SELECT COUNT(*) as number FROM statistic WHERE framework = 'yii' AND function = 'findAllBySql()'";
$row = mysql_fetch_object(mysql_query($query));
if ($row->number < $executions) {
    $url = 'http://frameworks.dev/projects/yii/index.php?r=site/findallbysql/';
    execute_link($url);
}

//Zend
$query = "SELECT COUNT(*) as number FROM statistic WHERE framework = 'zend' AND function = 'selectall'";
$row = mysql_fetch_object(mysql_query($query));
if ($row->number < $executions) {
    $url = 'http://frameworks.dev/projects/zend/public/site/selectall/';
    execute_link($url);
}

$query = "SELECT COUNT(*) as number FROM statistic WHERE framework = 'zend' AND function = 'find()'";
$row = mysql_fetch_object(mysql_query($query));
if ($row->number < $executions) {
    $url = 'http://frameworks.dev/projects/zend/public/site/find/';
    execute_link($url);
}

$query = "SELECT COUNT(*) as number FROM statistic WHERE framework = 'zend' AND function = 'fetchRow()'";
$row = mysql_fetch_object(mysql_query($query));
if ($row->number < $executions) {
    $url = 'http://frameworks.dev/projects/zend/public/site/fetchrow/';
    execute_link($url);
}

$query = "SELECT COUNT(*) as number FROM statistic WHERE framework = 'zend' AND function = 'fetchAll()'";
$row = mysql_fetch_object(mysql_query($query));
if ($row->number < $executions) {
    $url = 'http://frameworks.dev/projects/zend/public/site/fetchall/';
    execute_link($url);
}

$query = "SELECT COUNT(*) as number FROM statistic WHERE framework = 'zend' AND function = 'Zend_Db_Select'";
$row = mysql_fetch_object(mysql_query($query));
if ($row->number < $executions) {
    $url = 'http://frameworks.dev/projects/zend/public/site/zenddbselect/';
    execute_link($url);
}

//Codeigniter
$query = "SELECT COUNT(*) as number FROM statistic WHERE framework = 'codeigniter' AND function = 'selectall'";
$row = mysql_fetch_object(mysql_query($query));
if ($row->number < $executions) {
    $url = 'http://frameworks.dev/projects/codeigniter/index.php/site/selectall/';
    execute_link($url);
}

$query = "SELECT COUNT(*) as number FROM statistic WHERE framework = 'codeigniter' AND function = 'get_where()'";
$row = mysql_fetch_object(mysql_query($query));
if ($row->number < $executions) {
    $url = 'http://frameworks.dev/projects/codeigniter/index.php/site/getwhere/';
    execute_link($url);
}

$query = "SELECT COUNT(*) as number FROM statistic WHERE framework = 'codeigniter' AND function = 'get()'";
$row = mysql_fetch_object(mysql_query($query));
if ($row->number < $executions) {
    $url = 'http://frameworks.dev/projects/codeigniter/index.php/site/getmethod/';
    execute_link($url);
}

$query = "SELECT COUNT(*) as number FROM statistic WHERE framework = 'codeigniter' AND function = 'query()'";
$row = mysql_fetch_object(mysql_query($query));
if ($row->number < $executions) {
    $url = 'http://frameworks.dev/projects/codeigniter/index.php/site/querymethod/';
    execute_link($url);
}

//Executing url using curl
function execute_link($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url); 
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/6.0 (Windows; U; Windows NT 5.1; en-US; rv:1.7.7) Gecko/20050414 Firefox/1.0.3");
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); 
    $result = curl_exec ($ch); 
    curl_close ($ch);
    
    exit();
}

?>