<?php
    $object = new Library();
    
    $selectall_Yii = $object->findStatistic('yii', 'selectall');
    $selectall_Zend = $object->findStatistic('zend', 'selectall');
    $selectall_CI = $object->findStatistic('codeigniter', 'selectall');
    
    $findAll_Yii = $object->findStatistic('yii', 'findAll()');
    $fetchAll_Zend = $object->findStatistic('zend', 'fetchAll()');
    $get_CI = $object->findStatistic('codeigniter', 'get()');
    
    $find_Yii = $object->findStatistic('yii', 'find()');
    $fetchRow_Zend = $object->findStatistic('zend', 'fetchRow()');
    $get_where_CI = $object->findStatistic('codeigniter', 'get_where()');
    
    $all_Yii = $object->findStatistic('yii', 'all');
    $all_Zend = $object->findStatistic('zend', 'all');
    $all_CI = $object->findStatistic('codeigniter', 'all');
?>