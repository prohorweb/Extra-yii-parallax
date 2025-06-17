<?php

use richardfan\widget\JSRegister;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

?>
<section class="form-section form-section--zvon" id="zvon-section">
    <div class="form-section__wrap">
        <div class="form-section__title">Заказать обратный звонок</div>
        <?php $form = ActiveForm::begin(['id' => 'callback-section', 'action' => Url::to(['/club/subscribe3/']), 'options' => ['onsubmit' => (isset($_SESSION["_language"]) && $_SESSION["_language"] == "db2" ? "gtag('event', 'zayavka', {'event_category': 'form'});" : "") . "ym(21525628, 'reachGoal', 'zayavka'); dataLayer.push({'event': 'zayavka'});", 'class' => 'form-section__form']]) ?>
        <div class="form-section__row row">
            <div class="form-section__item col-6 col-xs-12 input-row">
                <?= Html::textInput('name', null, ['class' => 'inputbox inputbox--border', 'placeholder' => 'Ваше имя *', 'required' => true]) ?>
            </div>
            <div class="form-section__item col-6 col-xs-12 input-row">
                <?= MaskedInput::widget([
                    'options' => ['placeholder' => 'Ваш телефон *', 'class' => 'inputbox inputbox--border'],
                    'name' => 'tel',
                    'mask' => '+7 999 999 99 99',
                ]) ?>
            </div>
        </div>
        <div class="form-section__soglas">
            <div class="checkbox">
                <?= Html::checkbox('accept', false, ['id' => 'soglas-2']) ?>
                <label for="soglas-2">Ознакомлен с <a href="<?= Url::to(['/privacy/']) ?>" target="_blank">политикой конфиденциальности</a></label>
            </div>
        </div>
        <div class="form-section__button"><button type="submit" class="btn btn--lg">Заказать звонок</button></div>
        <?= Html::hiddenInput('url', Yii::$app->getRequest()->getAbsoluteUrl()) ?>
        <?php ActiveForm::end() ?>
    </div>
</section>

<?php
JSRegister::begin(); ?>
<script>
    jQuery('#callback-section').on('beforeValidate', function (e) {
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
</script>
<?php JSRegister::end();
