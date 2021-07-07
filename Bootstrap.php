<?php

namespace h3tech\barion;

use yii\base\BootstrapInterface;

class Bootstrap implements BootstrapInterface
{
    protected $constants = [
        'BARION_API_URL_PROD' => 'https://api.barion.com',
        'BARION_WEB_URL_PROD' => 'https://secure.barion.com/Pay',
        'BARION_API_URL_TEST' => 'https://api.test.barion.com',
        'BARION_WEB_URL_TEST' => 'https://secure.test.barion.com/Pay',

        'API_ENDPOINT_PREPAREPAYMENT' => '/Payment/Start',
        'API_ENDPOINT_PAYMENTSTATE' => '/Payment/GetPaymentState',
        'API_ENDPOINT_QRCODE' => '/QR/Generate',
        'API_ENDPOINT_REFUND' => '/Payment/Refund',
        'API_ENDPOINT_FINISHRESERVATION' => '/Payment/FinishReservation',
        'API_ENDPOINT_CAPTURE' => '/Payment/Capture',
        'API_ENDPOINT_CANCELAUTHORIZATION' => '/Payment/CancelAuthorization',
        'API_ENDPOINT_3DS_COMPLETE' => '/Payment/Complete',

        'PAYMENT_URL' => '/Pay',
    ];

    public function bootstrap($app)
    {
        foreach ($this->constants as $name => $value) {
            defined($name) or define($name, $value);
        }
    }
}
