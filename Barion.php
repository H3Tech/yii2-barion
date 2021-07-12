<?php

namespace h3tech\barion;

use h3tech\barion\sdk\BarionClient;
use h3tech\barion\sdk\enumerations\BarionEnvironment;
use h3tech\barion\sdk\enumerations\UILocale;
use h3tech\barion\sdk\models\payment\PreparePaymentRequestModel;
use yii\base\Component;
use yii\base\InvalidConfigException;
use yii\web\UrlManager;

class Barion extends Component
{
    const BARION_API_URL_PROD = 'https://api.barion.com';
    const BARION_WEB_URL_PROD = 'https://secure.barion.com/Pay';
    const BARION_API_URL_TEST = 'https://api.test.barion.com';
    const BARION_WEB_URL_TEST = 'https://secure.test.barion.com/Pay';
    const API_ENDPOINT_PREPAREPAYMENT = '/Payment/Start';
    const API_ENDPOINT_PAYMENTSTATE = '/Payment/GetPaymentState';
    const API_ENDPOINT_QRCODE = '/QR/Generate';
    const API_ENDPOINT_REFUND = '/Payment/Refund';
    const API_ENDPOINT_FINISHRESERVATION = '/Payment/FinishReservation';
    const API_ENDPOINT_CAPTURE = '/Payment/Capture';
    const API_ENDPOINT_CANCELAUTHORIZATION = '/Payment/CancelAuthorization';
    const API_ENDPOINT_3DS_COMPLETE = '/Payment/Complete';
    const PAYMENT_URL = '/Pay';

    protected $environment;
    public $payee;
    public $posKey;
    public $pixelId;
    public $callbackUrl;

    public $defaultUiLocale = UILocale::EN;

    const UNIT_PIECE = 'piece';

    public function setEnvironment($environment)
    {
        $validEnvironments = [BarionEnvironment::Test, BarionEnvironment::Prod];

        if (!is_string($environment)) {
            throw new InvalidConfigException('Environment must be string');
        } elseif (!in_array($environment, $validEnvironments)) {
            throw new InvalidConfigException(
                'Invalid environment: ' . $environment . ', should be one of ' . join(', ', $validEnvironments)
            );
        }

        $this->environment = $environment;
    }

    public function getEnvironment()
    {
        return $this->environment;
    }

    public function getValidUiLocale($language)
    {
        $constantName = UILocale::class . '::' . strtoupper($language);
        return defined($constantName) ? constant($constantName) : $this->defaultUiLocale;
    }

    public function createClient()
    {
        return new BarionClient($this->posKey, 2, $this->environment);
    }

    public function getPaymentState($paymentId)
    {
        return ($this->createClient())->GetPaymentState($paymentId);
    }

    public function getWebUrl()
    {
        return constant(static::class . '::BARION_WEB_URL_' . strtoupper($this->environment));
    }

    public function getPaymentUrl($paymentId)
    {
        return $this->getWebUrl() . '?id=' . $paymentId;
    }

    public function preparePayment(PreparePaymentRequestModel $request)
    {
        return $this->createClient()->PreparePayment($request);
    }
}