<?php

use richardfan\widget\JSRegister;
use yii\helpers\Url;

/* @var $this yii\web\View */

//$this->title = $params->meta_title;
//$this->registerMetaTag(['name' => 'keywords', 'content' => $params->meta_keywords]);
//$this->registerMetaTag(['name' => 'description', 'content' => $params->meta_description]);

$this->registerJsFile('//yookassa.ru/checkout-widget/v1/checkout-widget.js');

lo\widgets\loading\JqueryLoadingAsset::register($this);

?>
<section class="page-item main-section">
    <div class="container">
        <nav class="d-md-block d-none" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= Url::to(['/']) ?>"><?= $this->params['club']->title ?></a></li>
                <li class="breadcrumb-item"><a href="<?= Url::to(['/card/type/']) ?>">Абонементы и цены</a></li>
                <li class="breadcrumb-item active" aria-current="page">Выбор оплаты</li>
            </ol>
        </nav>
        <h2 class="section-heading">Выбор оплаты абонемента <?= $this->params['club']->title ?></h2>

        <div id="payment-form"></div>
        
    </div>
</section>

<div id="custom-overlay">
    <div class="loading-spinner">
        Custom loading...
    </div>
</div>

<?php
JSRegister::begin(); ?>
<script>
    $('.main-section').loading({overlay: $("#custom-overlay")});

    //Инициализация виджета. Все параметры обязательные.
    const checkout = new window.YooMoneyCheckoutWidget({
        confirmation_token: '<?= $token ?>', //Токен, который перед проведением оплаты нужно получить от ЮKassa
        return_url: '<?= Yii::$app->urlManager->hostInfo . Url::to(['/site/success2/', 'id' => $id, 'type' => $type]) ?>', //Ссылка на страницу завершения оплаты
        //Настройка виджета
        customization: {
            //Выбор способа оплаты для отображения
            payment_methods: ['bank_card', 'apple_pay', 'google_pay']
        },
        error_callback: function(error) {
            //Обработка ошибок инициализации
        }
    });

    //Отображение платежной формы в контейнере
    checkout.render('payment-form')
    //После отображения платежной формы метод render возвращает Promise (можно не использовать).
    .then(() => {
        //Код, который нужно выполнить после отображения платежной формы.
        $('.main-section').loading('stop');
    });
</script>
<?php JSRegister::end();
