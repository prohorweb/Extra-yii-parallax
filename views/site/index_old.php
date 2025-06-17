<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\helpers\StringHelper;
use InstagramScraper\Instagram;
use Phpfastcache\Helper\Psr16Adapter;

/* @var $this yii\web\View */
/* @var $club \common\models\Club */
/* @var $shares \common\models\Shares */
/* @var $banners_club \common\models\ClubBanners */
/* @var $banners \common\models\ClubBanners */
/* @var $settings \common\models\Settings */
/* @var $metros \common\models\Metros */


$this->title = Yii::$app->language != 'ru-RU' ? $settings->meta_title : 'Фитнес клуб EXTRASPORT';
$this->registerMetaTag(['name' => 'keywords', 'content' => $settings->meta_keywords]);
$this->registerMetaTag(['name' => 'description', 'content' => $settings->meta_description]);

?>
<section class="index-slide slideshow-wrapper slideshow-wrapper--index">
    <div class="slick" data-slick='{"autoplay": true, "adaptiveHeight": true, "centerPadding": "0px", "infinite": true, "slidesToShow": 1, "dots": true, "appendDots": ".slideshow-wrapper__nav", "arrows": false}'>
        <?php foreach($banners_club as $banner) { ?>
        <div class="slick-slide">
            <?php if ($banner->video) { ?>
                <video class="slideshow-wrapper__video" src="/uploads/video/<?= $banner->video ?>" autoplay muted loop preload playsinline></video>
            <?php } ?>

            <?php if(Yii::$app->devicedetect->isMobile() || Yii::$app->devicedetect->isTablet()) { ?>
                <img src="<?= $banner->img1440 ? '/uploads/image/banners/1440/'.$banner->img1440 : '//placehold.it/1904x1080' ?>" alt="">
            <?php } else { ?>
                <img src="<?= $banner->img1200 ? '/uploads/image/banners/1200/'.$banner->img1200 : '//placehold.it/1904x698' ?>" alt="">
            <?php } ?>

            <div class="slideshow-wrapper__container">
                <div class="container">
                    <div class="slideshow-wrapper__wrap">
                        <a href="<?= $banner->url ?>" class="slideshow-wrapper__link">
                            <div class="slideshow-wrapper__title"><?= $banner->title2 ?></div>
                            <div class="slideshow-wrapper__subtitle"><?= $banner->intro ?></div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
    <div class="slideshow-wrapper__nav"></div>
</section>

<section class="about-section">
    <div class="container">
        <div class="about-section__title title-h1">О клубе</div>
        <div class="about-section__row row row--pad0 row--stretch">
            <div class="col-6 col-xs-12 about-section__text">
                <div class="none visible-xs title-h1">О клубе</div>
                <?= $club->main_content ?>
                <p><a href="<?= Url::to(['/es/club/']) ?>" class="btn btn--lg">Подробнее</a></p>
            </div>
            <?php if(isset($_SESSION["_language"]) && $_SESSION["_language"] != "db2" && $_SESSION["_language"] != "db4") { ?>
            <div class="col-6 col-xs-12 about-section__banner">
                <div class="vr-banner">
                    <img src="/images/<?= $_SESSION["_language"] == "db3" ? 'vr-banner-img' : 'vr_piter' ?>.jpg" alt="" class="vr-banner__img" />
                    <div class="vr-banner__wrap">
                        <a href="<?= $club->url_3d_tour ?>" class="vr-banner__link" target="_blank"><span>VR-тур по клубу</span></a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>

<section class="sale-section">
    <div class="container">
        <div class="sale-section__title title-h1">АКЦИИ <?= $this->params['club']->title ?></div>
        <div class="sale-section__row row">
            <?php foreach($shares as $key => $share) { ?>
            <div class="sale-section__item col-3 col-sm-6 col-xs-12 <?= $key < 3 ? 'col-lg-4' : 'hidden-lg visible-sm' ?>">
                <div class="product-block">
                    <div class="product-block__img">
                        <a href="<?= Url::to(['/card/shares/' . $share->alias]) ?>">
                            <img src="<?= $share->img ? '/uploads/image/share/'.$share->img : '//placehold.it/876x680' ?>" alt="" />
                            <?php if(!empty($share->title2)) { ?>
                            <div class="product-block__time"><?= $share->title2 ?></div>
                            <?php } ?>
                        </a>
                    </div>
                    <div class="product-block__wrap">
                        <div class="product-block__title"><?= $share->title ?></div>
                        <div class="product-block__text"><?= $share->intro ?></div>
                        <div class="product-block__more"><a href="<?= Url::to(['/card/shares/' . $share->alias]) ?>" class="btn btn--product"><span>Подробнее</span></a></div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>

        <div class="sale-section__button"><a href="<?= Url::to(['/card/shares/']) ?>" class="btn btn--lg">Все акции</a></div>
    </div>
</section>

<?= $this->render('/club/_subscribe') ?>

<section class="service-section">
    <div class="container">
        <div class="service-section__title title-h1">УСЛУГИ КЛУБА</div>
        <div class=" tab-wrapper">
            <div class="service-section__tabs tab-nav">
                <?php foreach ($this->params['services'] as $key => $service) { ?>
                    <div class="tab-nav__item <?= $key == 0 ? 'active' : '' ?>"><a href="#tab-service-<?= $service->id ?>"><?= $service->title ?></a></div>
                <?php } ?>
            </div>
            <?php foreach ($this->params['services'] as $key => $service) { ?>
            <div class="tab-box <?= $key == 0 ? 'active' : '' ?>" id="tab-service-<?= $service->id ?>">
                <div class="service-section__row row row--pad0 row--stretch">
                    <div class="service-section__gallery col-6 col-sm-12 slideshow-wrapper slideshow-wrapper--h100 slideshow-wrapper--rb">

                        <div class="slick" data-slick='{"autoplay": true, "adaptiveHeight": false, "centerPadding": "0px", "infinite": true, "slidesToShow": 1, "dots": false, "arrows": true}'>
                            <?php if (isset($banners[$service->id])) {
                                foreach ($banners[$service->id] as $banner) { ?>
                                    <div class="slick-slide">
                                        <img src="/uploads/image/banners/1440/<?= $banner->img1440 ?>" alt=""/>
                                    </div>
                                <?php }
                            } else { ?>
                            <div class="slick-slide">
                                <img src="//placehold.it/878x556" alt=""/>
                            </div>
                            <?php } ?>
                        </div>

                    </div>
                    <div class="service-section__info col-6 col-sm-12">
                        <div class="service-section__info__title"><?= $service->title ?></div>
                        <div class="service-section__text"><?= StringHelper::truncate($service->content, 350) ?></div>
                        <div class="service-section__button"><a href="<?= Url::to(['/services/' . $service->alias]) ?>" class="btn btn--lg">Подробнее</a></div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>

<?= $this->render('_callback') ?>

<section class="map-section">
    <div class="container">
        <div class="map-section__contacts">
            <div class="map-section__title"><?= $this->params['club']->contacts_title ?></div>
            <div class="map-section__phone"><a href="tel:<?= $this->params['club']->tel ?>"><?= $this->params['club']->tel ?></a><a href="#zvon-popup" class="popup-to map-section__zvon">Заказать звонок</a></div>
            <div class="map-section__adres"><?= $this->params['club']->address ?></div>
            <div class="map-section__metro"><?= implode(", ", ArrayHelper::getColumn($metros, 'name')); ?></div>
            <div class="map-section__time">Время работы<br> пн–пт: <?= $this->params['club']->start_work ?><br> сб–вс: <?= $this->params['club']->start_work_weekend ?></div>
            <div class="map-section__prodag mb0">Отдел продаж:<br> пн-вс: 10:00 до 22:00</div>
        </div>
    </div>
    <div id="map" class="map-section__map"></div>
</section>


<?php
$this->registerJsFile('https://api-maps.yandex.ru/2.1/?lang=ru_RU');
$var = Yii::$app->devicedetect->isMobile() ? 0 : 200;
$js = <<< JS
ymaps.ready(init);
    function init () {
        // Создание экземпляра карты и его привязка к контейнеру с
        // заданным id ("map")
        var myMap = new ymaps.Map('map', {
            // При инициализации карты, обязательно нужно указать
            // ее центр и коэффициент масштабирования
            center: [$club->coordinates],
            zoom: 16,
            controls: []
        },{suppressMapOpenBlock: true});
    
        var pixelCenter = myMap.getGlobalPixelCenter();
        pixelCenter = [
            pixelCenter[0] - $var, // Смещение на 200 пикселей вправо
            pixelCenter[1]
        ];
        var geoCenter = myMap.options.get('projection').fromGlobalPixels(pixelCenter, myMap.getZoom());
        myMap.setCenter(geoCenter);
        
        //myMap.controls.add('zoomControl', { top: 75, left: 5 });
        //myMap.behaviors.enable('scrollZoom');

        // Создание метки 
        var myPlacemark = new ymaps.Placemark(
        // Координаты метки
        [$club->coordinates], {
            // Свойства
            // Текст метки
            hintContent: 'ExtraSport'
        }, {
            iconLayout: 'default#image',
            iconImageHref: '/images/marker.png', // картинка иконки
            iconImageSize: [57, 80], // размеры картинки
            iconImageOffset: [-28, -80] // смещение картинки
            });     

        // Добавление метки на карту
        myMap.geoObjects.add(myPlacemark);
    }
JS;
$this->registerJs($js);
