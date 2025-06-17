<?php

use himiklab\yii2\recaptcha\ReCaptcha3;
use richardfan\widget\JSRegister;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\HtmlPurifier;
use yii\widgets\MaskedInput;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $models \common\models\ClubCards */
/* @var $params \common\models\ClubCardsParams */


$this->title = $params->meta_title;
$this->registerMetaTag(['name' => 'keywords', 'content' => $params->meta_keywords]);
$this->registerMetaTag(['name' => 'description', 'content' => $params->meta_description]);

?>

<section class="page-item">
    <div class="container">
        <nav class="d-md-block d-none" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= Url::to(['/']) ?>"><?= $this->params['club']->title ?></a></li>
                <li class="breadcrumb-item"><a href="<?= Url::to(['/card/type/']) ?>">Абонементы и цены</a></li>
                <li class="breadcrumb-item active" aria-current="page">Выбор абонемента</li>
            </ol>
        </nav>
        <h2 class="section-heading">Выбор Абонемента <?= $this->params['club']->title ?></h2>
        <h3 class="mb-5 text-center">В каждый абонемент входит</h3>

        <div class="row justify-content-center">
            <div class="col-md-3 col-6 text-center">
                <img src="/images/card-choice-services-1.svg" alt="" />
                <p>Безлимитный <br>фитнес *</p>
            </div>
            <div class="col-md-3 col-6 text-center">
                <img src="/images/card-choice-services-3.svg" alt="" />
                <p>Полный доступ <br>во все зоны клуба *</p>
            </div>
            <div class="col-md-3 col-6 text-center">
                <img src="/images/card-choice-services-5.svg" alt="" />
                <p><?= explode('.', $_SERVER['HTTP_HOST'])[0] == "iyun" || explode('.', $_SERVER['HTTP_HOST'])[0] == "polyus" ? 'Финская сухая сауна' : 'Турецкая парная' ?>,<br> неограничено</p>
            </div>
            <?php if (explode('.', $_SERVER['HTTP_HOST'])[0] == "piter") { ?>
                <div class="col-md-3 col-6 text-center">
                    <img src="/images/card-choice-services-6.svg" alt="" />
                    <p>Плавательный<br> бассейн *</p>
                </div>
            <?php } ?>
        </div>

        <div class="text-center my-3"><span>* наличие и период варьируются в зависимости от абонемента</span></div>

        <?php foreach ($models as $key => $model) { ?>
            <div class="abonement card py-0 py-md-5" style="background-image: url(<?= $model->img ? '/uploads/image/club_cards/' . $model->img : '//placehold.it/1752x390' ?>);">
                <div class="row">
                    <div class="col-lg-4 d-flex align-items-center justify-content-center py-4">
                        <img class="w-100 px-3"src="/images/card-img.png" alt="" />
                    </div>
                    <div class="col-lg-8 d-flex align-items-center justify-content-center">
                        <div class=" flex-wrap ">
                            <div class="card-title">
                                <h1><?= Html::encode($model->title) ?></h1>
                                <h3><?= Html::encode($model->comment) ?></h3>
                            </div>
                            <div class="my-3">
                                <div class="form-action">
                                    <a href="#card-popup<?= $key ?>" data-bs-toggle="modal" id="card-<?= $model->id ?>">
                                        <div class="btn btn-primary btn-lg m-3"><i class="fa-sharp fa-solid fa-phone-arrow-down-left me-1"></i>Заказать звонок</div>
                                    </a>
                                    <!-- <?php if (explode('.', $_SERVER['HTTP_HOST'])[0] == 'piter' && $model->price) { ?> -->
                                    <!-- <a href="#buy-popup<?= $key ?>" data-bs-toggle="modal" id="card-<?= $model->id ?>" onclick="ym(21525628, 'reachGoal', 'click_buy_online');">
                                        <div class="btn btn-primary btn-lg m-3"><i class="fa-light fa-bag-shopping me-1"></i></i>Купить онлайн</div>
                                    </a> -->
                                    <!-- <?php } ?> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="card-choice__seo-text">
                <?= HtmlPurifier::process($params->text) ?>
            </div>


            <div class="modal fade popup-wrap" id="card-popup<?= $key ?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-sm">
                    <div class="modal-content">
                        <div class="close-modal" data-bs-dismiss="modal"><button class="btn-close btn-close-white" type="button" aria-label="Close"></button></div>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="modal-body p-4">
                                    <?php $form = ActiveForm::begin(['id' => 'callback_' . $key, 'action' => Url::to(['/club/subscribe3/']), 'options' => ['onsubmit' => (explode('.', $_SERVER['HTTP_HOST'])[0] == "iyun" ? "gtag('event', 'zayavka', {'event_category': 'form'});" : "") . "ym(21525628, 'reachGoal', 'zayavka');  dataLayer.push({'event': 'zayavka'});", 'class' => 'popup__form callback2']]) ?>
                                    <div class="row">
                                        <div class="col-12 input-row form-group mb-4">
                                            <?= Html::textInput('name', null, ['class' => 'inputbox inputbox--border form-control', 'placeholder' => 'Ваше имя *'/*, 'required' => true*/]) ?>
                                        </div>
                                        <div class="col-12 input-row form-group mb-4">
                                            <?= MaskedInput::widget([
                                                'options' => ['class' => 'form-control input-phone inputbox inputbox--border', 'placeholder' => 'Ваш телефон *'/*, 'required' => true*/],
                                                'name' => 'tel',
                                                'mask' => '+7 999 999 99 99',
                                            ]) ?>
                                        </div>
                                    </div>
                                    <div class="form-section__soglas mb-3">
                                        <div class="checkbox">
                                            <?= Html::checkbox('accept', false, ['id' => "soglas-$key"]) ?>
                                            <label class="d-inline" for="soglas-<?= $key ?>">Ознакомлен с <a href="<?= Url::to(['/privacy/']) ?>" target="_blank">политикой конфиденциальности</a></label>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class=" btn btn-primary btn-lg">Заказать звонок</button>
                                    </div>

                                    <?= ReCaptcha3::widget([
                                        'name' => 'reCaptcha',
                                        'siteKey' => '6Ld2_VopAAAAALCXizlp0XRDUqiFZuQdbrUmCBHl',
                                        'action' => '/club/subscribe3/'
                                    ]) ?>
                                    <?= Html::hiddenInput('title', Html::encode($model->title)) ?>
                                    <?= Html::hiddenInput('url', Yii::$app->getRequest()->getAbsoluteUrl()) ?>
                                    <?php ActiveForm::end() ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade popup-wrap" id="buy-popup<?= $key ?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-sm">
                    <div class="modal-content">
                        <div class="close-modal" data-bs-dismiss="modal"><button class="btn-close btn-close-white" type="button" aria-label="Close"></button></div>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="modal-body p-4">
                                    <h3>Оплата</h3>
                                    <p>Для отправки чека (согласно 54-ФЗ) и связи менеджера с вами, введите,пожалуйста, данные:</p>
                                    <?php $form = ActiveForm::begin(['id' => 'callback_' . $key, 'action' => Url::to(['/type/buy/', 'id' => $model->id]), 'options' => ['onsubmit' => (explode('.', $_SERVER['HTTP_HOST'])[0] == "iyun" ? "gtag('event', 'zayavka', {'event_category': 'form'});" : "") . "ym(21525628, 'reachGoal', 'zayavka'); ym(21525628, 'reachGoal', 'shop_online'); dataLayer.push({'event': 'zayavka'});", 'class' => 'popup__form callback2']]) ?>
                                    <div class="row">
                                        <div class="col-12 input-row form-group mb-4">
                                            <?= Html::textInput('name', null, ['class' => 'inputbox inputbox--border form-control', 'placeholder' => 'ФИО *', 'required' => true]) ?>
                                        </div>
                                        <div class="col-12 input-row form-group mb-4">
                                            <?= MaskedInput::widget([
                                                'options' => ['class' => 'form-control input-phone inputbox inputbox--border', 'placeholder' => 'Ваш телефон *', 'required' => true],
                                                'name' => 'tel',
                                                'mask' => '+7 999 999 99 99',
                                            ]) ?>
                                        </div>
                                        <div class="col-12 input-row form-group mb-4">
                                            <?= Html::input('email', 'email', null, ['class' => 'form-control', 'placeholder' => 'Email', 'required' => true]) ?>
                                        </div>
                                    </div>
                                    <div class="form-section__soglas mb-3">
                                        <div class="checkbox">
                                            <?= Html::checkbox('accept', false, ['id' => "soglas2-$key", 'required' => true]) ?>
                                            <label class="d-inline" for="soglas2-<?= $key ?>">Ознакомлен с <a href="<?= Url::to(['/privacy/']) ?>" target="_blank">политикой конфиденциальности</a></label>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class=" btn btn-primary btn-lg">Перейти к оплате</button>
                                    </div>

                                    <?= Html::hiddenInput('title', Html::encode($model->title)) ?>
                                    <?= Html::hiddenInput('url', Yii::$app->getRequest()->getAbsoluteUrl()) ?>
                                    <?php ActiveForm::end() ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>
</section>

<?= $this->render('/club/_subscribe') ?>
<?php
JSRegister::begin(); ?>
<script>
    $('.callback2').on('beforeValidate', function(e) {
        $('.help-block').remove();
        var ret = true;

        if ($(this)[0][1].value.length == 0) {
            $(this).find('div.input-row:first').append('<div class="help-block" style="color: #ff0000;">Поле имя не может быть пустым!</div>');
            ret = false;
        } else if ($(this)[0][1].value.match(/[^а-яё ]+/gi)) {
            $(this).find('div.input-row:first').append('<div class="help-block" style="color: #ff0000;">Поле имя должно содержать только буквы кириллицы</div>');
            ret = false;
        }
        if ($(this)[0][2].value.length == 0) {
            $(this).find('div.input-row:last').append('<div class="help-block" style="color: #ff0000;">Поле телефон не может быть пустым</div>');
            ret = false;
        } else if ($(this)[0][2].value.match(/[_]+/ig)) {
            $(this).find('div.input-row:last').append('<div class="help-block" style="color: #ff0000;">Поле телефон заполнено неправильно</div>');
            ret = false;
        }
        if (!$(this)[0][3].checked) {
            $(this).find('div.checkbox').append('<div class="help-block" style="color: #ff0000;">Для продолжения, пожалуйста, установите флажок "Ознакомлен"</div>');
            ret = false;
        }

        return ret;
    });
</script>
<?php JSRegister::end();

if (isset($_POST['id'])) {
    $this->registerJs(
        <<<JS
jQuery('#card-{$_POST['id']}').click();
JS
    );
}

$this->registerJs(
    <<<JS
    $(".toggle-box").click(function(){
        var href = $(this).attr("href");
        $(this).toggleClass("active").parents(".parent-show-box").slideToggle(350);
        $(href).slideToggle(350);
        return false;
    });

    jQuery('.content-line .link-more').click(function (e) {
        jQuery('#popup_overflow').fadeIn(500);
        $(this).parents('.card-box').next('.popup_wrap').fadeIn(500);

        var top_h = jQuery(window).scrollTop() - 50;
        $(this).parents('.card-box').next('.popup_wrap').css("top", top_h);
        return false;
    });
JS
);
