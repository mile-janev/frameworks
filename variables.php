<?php
    $object = new Library();
    
    $selectall_Yii = $object->findStatistic('yii', 'selectall');
    $selectall_Zend = $object->findStatistic('zend', 'selectall');
    $selectall_CI = $object->findStatistic('codeigniter', 'selectall');
    
    $findAll_Yii = $object->findStatistic('yii', 'findAll()');
    $fetchAll_Zend = $object->findStatistic('zend', 'fetchAll()');
    $get_where_CI = $object->findStatistic('codeigniter', 'get_where()');
    
    $find_Yii = $object->findStatistic('yii', 'find()');
    $fetchRow_Zend = $object->findStatistic('zend', 'fetchRow()');
    $get = $object->findStatistic('codeigniter', 'get()');
?>