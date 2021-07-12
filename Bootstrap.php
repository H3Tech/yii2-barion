<?php

namespace h3tech\barion;

use yii\base\BootstrapInterface;

class Bootstrap implements BootstrapInterface
{
    protected $constants = [
        'BARION_API_URL_PROD',
        'BARION_WEB_URL_PROD',
        'BARION_API_URL_TEST',
        'BARION_WEB_URL_TEST',
        'API_ENDPOINT_PREPAREPAYMENT',
        'API_ENDPOINT_PAYMENTSTATE',
        'API_ENDPOINT_QRCODE',
        'API_ENDPOINT_REFUND',
        'API_ENDPOINT_FINISHRESERVATION',
        'API_ENDPOINT_CAPTURE',
        'API_ENDPOINT_CANCELAUTHORIZATION',
        'API_ENDPOINT_3DS_COMPLETE',
        'PAYMENT_URL',
    ];

    public function bootstrap($app)
    {
        foreach ($this->constants as $name) {
            defined($name) or define($name, constant(Barion::class . '::' . $name));
        }
    }
}
