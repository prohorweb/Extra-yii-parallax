<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\HtmlPurifier;
use yii\widgets\ActiveForm;
use yii\widgets\ListView;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model \common\models\Shares */
/* @var $dataProviderOther yii\data\ActiveDataProvider */

$this->title = $model->meta_title;
$this->registerMetaTag(['name' => 'keywords', 'content' => $model->meta_keywords]);
$this->registerMetaTag(['name' => 'description', 'content' => $model->meta_description]);
if ($model->only_url) {
    $this->registerMetaTag(['name' => 'robot', 'content' => 'noindex, nofollow']);
}
?>
<section class="breadcramb-section breadcramb-section--grey breadcramb-section--pb0">
    <div class="container">
        <div class="breadcramb">
            <a href="/">Главная страница</a>
            <a href="<?= Url::to(['/']) ?>"><?= $this->params['club']->title ?></a>
            <a href="<?= Url::to('/card/shares/') ?>">Акции</a>
            <span><?= Html::encode($model->title) ?></span>
        </div>
    </div>
</section>

<main class="main-section main-section--share share-page">
    <div class="container">

        <h1 class="share-page__title"><?= Html::encode($model->title) ?></h1>

        <div class="share-page__row row row--stretch">
            <div class="share-page__info col-6 col-sm-12">
                <div class="share-page__subtitle title-h1"><?= Html::encode($model->intro) ?></div>
                <div class="item-page">
                    <?= $model->content ?>
                </div>
                <div class="share-page__button">
                    <a href="#offer-popup" class="btn btn--lg popup-to" onclick="ym(21525628, 'reachGoal', 'click_reserve');">Забронировать</a>
                    <?php if(explode('.', $_SERVER['HTTP_HOST'])[0] == 'piter' && $model->price) { ?>
                    <a href="#buy-popup" class="btn btn--lg popup-to">Купить онлайн</a>
                    <?php } ?>
                </div>
            </div>
            <div class="share-page__photo col-6 col-sm-12">
                <?php if (!empty($model->title2)) { ?>
                    <div class="product-block__time"><?= $model->title2 ?></div>
                <?php } ?>
                <img src="<?= $model->img ? '/uploads/image/share/' . $model->img : '//placehold.it/876x680' ?>" alt="" />
            </div>
        </div>

        <div class="share-page__soc-share soc-list soc-list--right">
            <div class="soc-list__label">поделиться</div>
            <div class="soc-list__item"><a href="#" onclick="Share.vkontakte('<?= Url::base(true) . Url::to() ?>', '<?= Html::encode($model->title) ?>', '')"><img src="/images/soc-share-2.png" alt="" /></a></div>
        </div>

    </div>
</main>

<?php if(explode('.', $_SERVER['HTTP_HOST'])[0] != "iyun" && explode('.', $_SERVER['HTTP_HOST'])[0] != "matros") { ?>
<section class="vr-section">
    <div class="container">
        <div class="vr-banner vr-banner--full">
            <img src="/images/<?= explode('.', $_SERVER['HTTP_HOST'])[0] == "polyus" ? 'vr-full-img' : 'vr-full-piter-img' ?>.jpg" alt="" class="vr-banner__img" />
            <div class="vr-banner__wrap">
                <a href="<?= $this->params['club']->url_3d_tour ?>" class="vr-banner__link" target="_blank"><span>VR-тур по клубу</span></a>
            </div>
        </div>
    </div>
</section>
<?php } ?>

<!--<section class="videos-section">
	<div class="videos-section__container container">
		<div class="videos-section__title title-h1">Видео-тренировки</div>
		<div class="videos-section__subtitle">В любое время, в любом удобном месте смотрите и занимайтесь правильно.</div>
		<div class="videos-section__row row">
			<div class="videos-section__col col-6 col-xs-12">
				<div class="video-block">
					<div class="video-block__img">
						<a href="#">
							<img src="/images/video-block-img-1.jpg" alt="">
						</a>
					</div>
					<div class="video-block__title">5-min Functional Training</div>
				</div>
			</div>
			<div class="videos-section__col col-6 col-xs-12">
				<div class="video-block">
					<div class="video-block__img">
						<a href="#">
							<img src="/images/video-block-img-2.jpg" alt="">
						</a>
					</div>
					<div class="video-block__title">Special Workout with Ivan Petrov </div>
				</div>
			</div>
		</div>
		<div class="videos-section__bottom">Оформите подписку на доступ к 80 видео-тренировкам под ваш уровень сложности</div>
		<div class="videos-section__buttons">
			<a href="#" class="btn btn--border">Оформить подписку</a>
		</div>
	</div>
</section>-->

<?php if (!empty($dataProviderOther)) { ?>
<section class="sale-section sale-section--other">
    <div class="container">
        <div class="sale-section__title title-h1">Другие акции клуба</div>
        <?= ListView::widget([
            'id' => 'shares_other-list',
            'dataProvider' => $dataProviderOther,
            'itemOptions' => function ($model, $key, $index, $widget) {
                return ['class' => 'sale-section__item col-3 col-sm-6 ' . ($index < 3 ? 'col-lg-4' : 'hidden-lg visible-sm') . ' col-xs-12'];
            },
            'layout' => '<div class="sale-section__row row">{items}</div><div class="other-services__buttons">{pager}</div>',
            'emptyText' => 'Записей не найдено',
            'itemView' => '_post',
            'pager'        => [
                'class' => 'mranger\load_more_pager\LoadMorePager',
                'id' => 'shares_other-list-pagination',
                'buttonText' => 'Показать еще',
                'contentSelector' => '#shares_other-list',
                'contentItemSelector' => '.sale-section__item:not(.even)',
            ],
        ]); ?>
    </div>
</section>
<?php } ?>


<div class="popup-wrap" id="offer-popup">
    <div class="popup-wrap__overflow"></div>

    <div class="popup popup--form">
        <a href="#" class="popup__close close"></a>
        <div class="popup__title">Заказать<br> обратный звонок</div>

        <?php $form = ActiveForm::begin(['id' => 'callback2', 'action' => Url::to(['/club/subscribe3/']), 'options' => ['onsubmit' => (explode('.', $_SERVER['HTTP_HOST'])[0] == "iyun" ? "gtag('event', 'zayavka', {'event_category': 'form'});" : "") . "ym(21525628, 'reachGoal', 'zayavka'); ym(21525628, 'reachGoal', 'reserve'); dataLayer.push({'event': 'zayavka'});", 'class' => 'popup__form']]) ?>
        <div class="form-section__row row">
            <div class="form-section__item col-12 input-row">
                <?= Html::textInput('name', null, ['class' => 'inputbox inputbox--border', 'placeholder' => 'Ваше имя *', 'required' => true]) ?>
            </div>
            <div class="form-section__item col-12 input-row">
                <?= MaskedInput::widget([
                    'options' => ['class' => 'input-phone inputbox inputbox--border', 'placeholder' => 'Ваш телефон *'],
                    'name' => 'tel',
                    'mask' => '+7 999 999 99 99',
                ]) ?>
            </div>
        </div>
        <div class="form-section__soglas">
            <div class="checkbox">
                <?= Html::checkbox('accept', false, ['id' => 'soglas-1']) ?>
                <label for="soglas-1">Ознакомлен с <a href="/privacy/" target="_blank">политикой конфиденциальности</a></label>
            </div>
        </div>
        <div class="form-section__button"><button type="submit" class="btn btn--lg">Заказать звонок</button></div>

        <?= Html::hiddenInput('title', Html::encode($model->title)) ?>
        <?= Html::hiddenInput('url', Yii::$app->getRequest()->getAbsoluteUrl()) ?>
        <?php ActiveForm::end() ?>
    </div>
</div>

<div class="popup-wrap" id="buy-popup">
    <div class="popup-wrap__overflow"></div>

    <div class="popup popup--form">
        <a href="#" class="popup__close close"></a>
        <div class="form-section__title title-h1">Оплата</div>
        <div class="form-section__text">Для отправки чека (согласно 54-ФЗ) и связи менеджера с вами, введите,
            пожалуйста, данные:</div>

        <?php $form = ActiveForm::begin(['id' => 'callback_2', 'action' => Url::to(['/shares/buy/', 'id' => $model->id]), 'options' => ['onsubmit' => (explode('.', $_SERVER['HTTP_HOST'])[0] == "iyun" ? "gtag('event', 'zayavka', {'event_category': 'form'});" : "") . "ym(21525628, 'reachGoal', 'zayavka');  dataLayer.push({'event': 'zayavka'});", 'class' => 'popup__form callback2']]) ?>
        <div class="form-section__row row">
            <div class="form-section__item col-12 input-row">
                <?= Html::textInput('name', null, ['class' => 'inputbox inputbox--border', 'placeholder' => 'ФИО *', 'required' => true]) ?>
            </div>
            <div class="form-section__item col-12 input-row">
                <?= MaskedInput::widget([
                    'options' => ['class' => 'input-phone inputbox inputbox--border', 'placeholder' => 'Ваш телефон *'],
                    'name' => 'tel',
                    'mask' => '+7 999 999 99 99',
                ]) ?>
            </div>
            <div class="form-section__item col-12 input-row">
                <?= Html::input('email', 'email', null, ['class' => 'inputbox inputbox--border', 'placeholder' => 'Email']) ?>
            </div>
        </div>
        <div class="form-section__soglas">
            <div class="checkbox">
                <?= Html::checkbox('accept', false, ['id' => "soglas-2"]) ?>
                <label for="soglas-2">Ознакомлен с <a href="/privacy/" target="_blank">политикой конфиденциальности</a></label>
            </div>
        </div>
        <div class="form-section__button"><button type="submit" class="btn btn--lg">Перейти к оплате</button></div>

        <?= Html::hiddenInput('title', Html::encode($model->title)) ?>
        <?= Html::hiddenInput('url', Yii::$app->getRequest()->getAbsoluteUrl()) ?>
        <?php ActiveForm::end() ?>
    </div>
</div>

<?php
$this->registerJs(<<<JS
    $('#callback2').on('beforeValidate', function (e) {
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
    
     jQuery('.content-line .link-more').click(function (e) {

        jQuery('#popup_overflow').fadeIn(500);
        jQuery('#zapis-popup').fadeIn(500);
        
        var top_h = jQuery(window).scrollTop() - 50;
        jQuery('#zapis-popup').css("top", top_h);
        
        return false;
    });

Share = {
	vkontakte: function(purl, ptitle, pimg) {
		url  = 'http://vkontakte.ru/share.php?';
		url += 'url='          + encodeURIComponent(purl);
		url += '&title='       + encodeURIComponent(ptitle);
		url += '&image='       + encodeURIComponent(pimg);
		//url += '&noparse=true';
		Share.popup(url);
	},

	popup: function(url) {
		window.open(url,'','toolbar=0,status=0,width=626,height=436');
	}
}
JS
);
