# Yii2 Barion
This extension gives you the ability to easily use the Barion SDK in your Yii project.

## Installation
The extension can be installed via Composer.

### Adding the repository
Add this repository in your composer.json file, like this:
```
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/H3Tech/yii2-barion"
    }
],
```
### Adding dependency
Add an entry for the extension in the require section in your composer.json:
```
"h3tech/yii2-barion": "~1.0"
```
After this, you can execute `composer update h3tech/yii2-barion` in your project directory to install the extension.

### Enabling the component
You can use the classes of the SDK right away. The `Barion` component helps with frequent use cases by providing helper
functions and constants.

The component must be enabled in Yii's configuration by adding an entry for it in the components section, for example:
```
'components' => [
    'barion' => [
        'class' => 'h3tech\barion\Barion',
        'environment' => 'test',
        'payee' => 'payee@example.com',
        'posKey' => 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa',
        'pixelId' => 'BPT-AAAAAAAAAA-FF',
        'callbackUrl' => 'https://example.com/backend/barion/ipn'
    ],
],
```

Please refer to the [Barion API documentation](https://docs.barion.com/Main_Page) for more information on how to use the
API.

You can use the component for example the following way:

```php
use h3tech\barion\Barion;
use h3tech\barion\sdk\enumerations\PaymentStatus;

/** @var Barion $barion */
$barion = Yii::$app->get('barion');

$paymentState = $barion->getPaymentState(Yii::$app->request->post('PaymentId'));

if ($paymentState->Status === PaymentStatus::Succeeded) {
    // TODO: Finalize order
}
```