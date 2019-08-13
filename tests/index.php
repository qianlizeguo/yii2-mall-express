<?php

define('YII_DEBUG', true);

require_once '../vendor/autoload.php';
require_once '../vendor/yiisoft/yii2/Yii.php';

use Hejiang\Express\Waybill;
use Hejiang\Express\Trackers\Kuaidi100;
use Hejiang\Express\Trackers\Kuaidiwang;
use Hejiang\Express\Exceptions\TrackingException;

$wb = \Yii::createObject(
    [
        'class' => 'Hejiang\Express\Waybill',
        'id' => 'YT4007761578045',
        'express' => '圆通',
    ]
);


$tracker = \Yii::createObject(
    [
        'class' => 'Hejiang\Express\Trackers\kuaidi100',
        'CustomerId' => '0C088E72F7CE40DC31721EE8209C6FCF',
        'AppKey' => 'vHjOxEbO1433'
    ]
);

try {
    $traces = $wb->getTraces($tracker);
} catch (TrackingException $ex) {
    var_dump($ex);
    exit;
}

echo json_encode($wb, JSON_PRETTY_PRINT);