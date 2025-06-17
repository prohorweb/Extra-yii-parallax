<?php

use richardfan\widget\JSRegister;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;
use lajax\translatemanager\helpers\Language;

?>
<section class="form-section">
    <img src="/images/fitnes-test-section-bg.jpg" alt="" class="form-section__bg" />
    <div class="form-section__wrap">
        <div class="form-section__title title-h1">фитнес тест-драйв!</div>
        <div class="form-section__text">Хотите больше узнать о нашем клубе? Оставьте заявку, и наши менеджеры проведут для вас подробную экскурсию. Для тех, кому экскурсии мало мы предлагаем «фитнес тест-драйв» — безлимитную неделю фитнеса, чтобы вы могли окончательно понять, насколько вам комфортно у нас.</div>
        <?php $form = ActiveForm::begin(['id' => 'subscribe', 'action' => Url::to(['/club/subscribe/']), 'options' => ['onsubmit' => (isset($_SESSION["_language"]) && $_SESSION["_language"] == "db2" ? "gtag('event', 'zayavka', {'event_category': 'form'});" : "") . "ym(21525628, 'reachGoal', 'zayavka'); ym(21525628, 'reachGoal', 'test_drive'); dataLayer.push({'event': 'zayavka'}); return true;", 'class' => 'form-section__form']]) ?>
            <div class="form-section__row row">
                <div class="form-section__item col-6 col-xs-12 input-row">
                    <?= Html::textInput('name', null, ['class' => 'inputbox inputbox--border inputbox--white', 'placeholder' => 'Ваше имя *', 'required' => true]) ?>
                </div>
                <div class="form-section__item col-6 col-xs-12 input-row">
                    <?= MaskedInput::widget([
                        'options' => ['class' => 'inputbox inputbox--border inputbox--white', 'placeholder' => 'Ваш телефон *'/*, 'required' => true*/],
                        'name' => 'tel',
                        'mask' => '+7 999 999 99 99',
                    ]) ?>
                </div>
            </div>
            <div class="form-section__soglas">
                <div class="checkbox checkbox--white">
                    <?= Html::checkbox('accept', false, ['id' => 'soglas']) ?>
                    <label for="soglas">Ознакомлен с <a href="<?= Url::to(['/privacy/']) ?>" target="_blank">политикой конфиденциальности</a></label>
                </div>
            </div>
            <div class="form-section__button">
                <button type="submit" class="btn btn--white btn--lg">Записаться</button>
            </div>
        <?= Html::hiddenInput('url', Yii::$app->getRequest()->getAbsoluteUrl()) ?>
        <?php ActiveForm::end() ?>
    </div>
</section>

<?php
$this->registerJs(<<<JS
    jQuery('#subscribe').on('beforeValidate', function (e) {
        $('.help-block').remove();
        var ret = true;

        if($(this)[0][1].value.length == 0){
            $(this).find('div.input-row:first').append('<div class="help-block" style="color: #ff0000;">Поле имя не может быть пустым</div>');
            ret = false;
        } else if($(this)[0][1].value.match(/[^а-яё ]+/gi)){
            $(this).find('div.input-row:first').append('<div class="help-block" style="color: #ff0000;">Поле имя должно содержать только буквы кириллицы</div>');
            ret = false;
        }
        if($(this)[0][2].value.length == 0){
            $(this).find('div.input-row:last').append('<div class="help-block" style="color: #ff0000;">Поле телефон не может быть пустым</div>');
            ret = false;
        } else if($(this)[0][2].value.match(/[_]+/ig)) {
            $(this).find('div.input-row:last').append('<div class="help-block" style="color: #ff0000;">Поле телефон заполнено неправильно</div>');
            ret = false;
        }
        if(!$(this)[0][3].checked){
            $(this).find('div.checkbox').append('<div class="help-block" style="color: #ff0000;">Для продолжения, пожалуйста, установите флажок "Ознакомлен"</div>');
            ret = false;
        }

        return ret;
    });
JS
);