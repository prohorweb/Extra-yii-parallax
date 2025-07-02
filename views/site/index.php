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

$this->registerJsFile('@web/js/nav.js', ['depends' => [\frontend\assets\AppAsset::class]]);
$this->registerJsFile('@web/js/parallax.js', ['depends' => [\frontend\assets\AppAsset::class]]);
$this->registerCssFile('@web/css/sections.css', ['depends' => [\frontend\assets\AppAsset::class]]);
$this->registerJsFile('@web/js/carousel-wheel.js', ['depends' => [\frontend\assets\AppAsset::class]]);

$sub = explode('.', $_SERVER['HTTP_HOST'])[0];

if ($sub == 'piter') {
    $src = 'piter';
    $active = '';
} else {
    $src = 'clubs';
    $active = 'active';
}
?>


<!-- Parallax Section -->
<div class="parallax-container" id="parallaxSection">
    <!-- Foreground Content -->
    <!-- <div class="parallax-content">
            <h1>Welcome to Our Website</h1>
            <p>Enjoy the parallax effect on the images as you scroll down!</p>
        </div> -->

    <!-- Foreground Image -->
    <!-- <img src="https://picsum.photos/1200/800?random" alt="Parallax Image" class="parallax-image" id="parallaxImage"> -->
</div>

<header class="masthead">

    <div class="carousel actions carousel-fade" id="carouselActionsFade" data-bs-ride="carousel" touch="true">

        <?php
        // Carousel items:
        $counter = 1; ?>

        <div class="carousel-item active" data-bs-interval=4000>
            <div
                class="masthead-heading text-uppercase d-flex flex-column align-items-center justify-content-center title">
                Сеть фитнес клубов на результат!
                <div class="masthead-subheading white">Ваш клуб - <?= $this->params['club']->title ?></div>
            </div>
            <video muted loop autoplay class="w-100">
                <source src="video/bg_moution.mp4" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
                <source src="video/bg_moution.webm" type='video/webm; codecs="vp8, vorbis"'>
            </video>
        </div>
        <div class="carousel-item" data-bs-interval=400000>
            <div class="masthead-heading text-uppercase d-flex flex-column align-items-end justify-content-end title">
                <a class="btn btn-primary btn-xl text-uppercase bg-black more" href="#">Узнать больше  >>></a>
            </div>
            <img src="img/slide-1.jpeg" class="d-block w-100" alt="Slide 1">
        </div>
        <div class="carousel-item" data-bs-interval=4000>
            <div class="masthead-heading text-uppercase d-flex flex-column align-items-end justify-content-end title">
                <a class="btn btn-primary btn-xl text-uppercase bg-black more" href="#">Узнать больше  >>></a>
            </div>
            <img src="img/slide-2.jpeg" class="d-block w-100" alt="Slide 1">
        </div>
        <div class="carousel-item" data-bs-interval=4000>
            <div class="masthead-heading text-uppercase d-flex flex-column align-items-end justify-content-end title">
                <a class="btn btn-primary btn-xl text-uppercase bg-black more" href="#">Узнать больше  >>></a>
            </div>
            <img src="img/slide-3.jpeg" class="d-block w-100" alt="Slide 1">
        </div>

        <!-- <?php foreach($banners_club as $banner) { ?>
        <div class="carousel-item slide" data-bs-interval=40000 >

            <div
                class="masthead-heading text-uppercase d-flex flex-column align-items-center justify-content-center title">
                <?= $banner->title2 ?>
                <div class="masthead-subheading white"><?= $banner->intro ?></div>
                <a class="btn btn-primary btn-xl text-uppercase bg-black" href="<?= $banner->url ?>">Узнать больше ></a>
            </div>

            <?php if ($banner->video) { ?>
            <video src="/uploads/video/<?= $banner->video ?>" autoplay muted loop></video>
            <?php } ?>

            <?php if(Yii::$app->devicedetect->isMobile() || Yii::$app->devicedetect->isTablet()) { ?>
            <img class="d-block w-100"
                src="<?= $banner->img1440 ? '/uploads/image/banners/1440/'.$banner->img1440 : '//placehold.it/1904x1080' ?>"
                alt="">
            <?php } else { ?>
            <img class="d-block w-100"
                src="<?= $banner->img1200 ? '/uploads/image/banners/1200/'.$banner->img1200 : '//placehold.it/1904x698' ?>"
                alt="">
            <?php } ?>
            <div class="overlay "></div>

        </div>

        <?php   $counter++; } ?> -->

        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselActionsFade" data-bs-slide-to="0" class="active"> </button>
            <button type="button" data-bs-target="#carouselActionsFade" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#carouselActionsFade" data-bs-slide-to="2"></button>
            <button type="button" data-bs-target="#carouselActionsFade" data-bs-slide-to="3" s></button>
            <!-- <?php   $counter = 1;
                foreach($banners_club as $banner){?>

            <button type="button" data-bs-target="#carouselActionsFade" data-bs-slide-to="<?= $counter ?>"></button>
            <?php $counter++; } ?> -->
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselActionsFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselActionsFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>

    </div>
</header>


<!-- About-->
<section id="about" style="position: relative; height: 100vh;">
    <video src="video/service.mp4" style="height: 100vh !important; width: 100%;
            object-fit: cover;
            object-position: center center;" autoplay="" muted="" loop=""> </video>
</section>


<!-- Actions-->
<section class="page-section" id="actions" style="position: relative; 
height: 100vh;
background-color: #00000095;
background-blend-mode: overlay;
background-image: url('/img/actions-bg.jpg'); 
/* background-size: 140%; */
background-position: center; 
background-repeat: no-repeat;
/* background-attachment: fixed; */
  z-index: 1;">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Акции клуба <?= $this->params['club']->title ?></h2>
        </div>
        <div class="row text-center">
            <?php $i = 0; foreach ($shares as $key => $share) { ?>
            <div class="col-lg-4 col-md-6">
                <a class="card <?php if ($i == 2) { echo"d-lg-block d-md-none"; } ?>"
                    href="<?= Url::to(['/card/shares/' . $share->alias]) ?>">
                    <?php if (!empty($share->title2)) { ?>
                    <div class="date-action"><?= $share->title2 ?></div>
                    <?php } ?>
                    <img class="card-img-top"
                        src="<?= $share->img ? '/uploads/image/share/' . $share->img : '//placehold.it/876x680' ?>"
                        alt="...">
                    <div class="card-body p-0">
                        <div class="d-flex">
                            <div class="card-body_wrapper">
                                <h5 class="card-title"><?= $share->title ?></h5>
                                <div class="card-text"><?= $share->intro ?></div>
                            </div>
                            <div class="btn-arrow d-flex align-items-center">
                                <i class="fa-sharp fa-solid fa-arrow-right"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <?php $i++; } ?>
        </div>
        <div class="d-flex justify-content-center">
            <a class="btn btn-primary btn-xl" href="<?= Url::to(['/card/shares/']) ?>">Все акции</a>
        </div>
    </div>
</section>

<!-- Contact-->
<?= $this->render('/club/_subscribe') ?>

<!-- Map-->
<section class="map-section" id="contacts">
    <div class="container">
        <div class="d-flex justify-content-start">
            <div class="map-section__contacts">
                <h2 class="map-section__title section-heading">Контакты</h2>
                <ul class="map-section__list">
                    <li class="map-section__phone"><i class="fa-regular fa-mobile fs-4"></i><a class="fs-4"
                            href="tel:<?= $this->params['club']->tel ?>"><?= $this->params['club']->tel ?></a></li>
                    <li class="map-section__mail"><i class="fa-regular fa-envelope"></i><a
                            href="mailto:<?= $this->params['club']->email ?>"><?= $this->params['club']->email ?></a>
                    </li>
                    <li class="map-section__adres"> <i
                            class="fa-regular fa-location-dot"></i><?= $this->params['club']->address ?></li>
                    <li class="map-section__metro"> <i
                            class="fa-regular fa-train-subway"></i><?= implode(", ", ArrayHelper::getColumn($metros, 'name')); ?>
                    </li>
                    <li class="map-section__time"><i class="fa-regular fa-timer"></i>Время работы<br> пн–пт:
                        <?= $this->params['club']->start_work ?><br> сб–вс:
                        <?= $this->params['club']->start_work_weekend ?></li>
                    <li class="map-section__prodag"><i class="fa-regular fa-user-tie-hair"></i>Отдел продаж:<br>
                        пн-вс: 10:00 до 22:00</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="map-section__map" id="map"> </div>
</section>
</div>
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