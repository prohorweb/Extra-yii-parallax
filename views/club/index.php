<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $banner \common\models\MainBanners */
/* @var $metros \common\models\Metros */

$this->title = $this->params['club']->meta_title;
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['club']->meta_keywords]);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['club']->meta_description]);

$sub = explode('.', $_SERVER['HTTP_HOST'])[0];

if ($sub == 'piter') {
    $src = 'piter';
    $active = '';
} else {
    $src = 'clubs';
    $active = 'active';
}
?>

<section id="about">
    <div class="carousel slide carousel-fade" id="carouselExampleFade" data-bs-ride="carousel" data-bs-pause="false">
        <?php if ($sub == 'piter') { ?>
            <a class="carousel-item active" data-bs-interval=4000 href="/services/bassejn/">
                <div class="d-flex align-items-center justify-content-center title">БАССЕЙН</div>
                <video src="/video/aqua.mp4" autoplay muted loop> </video>
                <div class="overlay "></div>
            </a>
        <?php } ?>
        <a class="carousel-item  <?= $active ?>" data-bs-interval=4000 href="/services/personal_training/">
            <div class="d-flex align-items-center justify-content-center title">ПЕРСОНАЛЬНЫЙ ТРЕНИНГ</div>
            <video src="/video/personal.mp4" muted loop autoplay></video>
            <div class="overlay "></div>
        </a>
        <a class="carousel-item" data-bs-interval=4000 href="/services/programs/">
            <div class="d-flex align-items-center justify-content-center title">ГРУППОВЫЕ ПРОГРАММЫ</div>
            <video src="/video/group.mp4" muted loop autoplay></video>
            <div class="overlay "></div>
        </a>
        <a class="carousel-item" data-bs-interval=4000 href="/services/detskij-klub/">
            <div class="d-flex align-items-center justify-content-center title">ДЕТСКИЙ КЛУБ</div>
            <video src="/video/children.mp4" muted loop autoplay></video>
            <div class="overlay "></div>
        </a>
        <a class="carousel-item" data-bs-interval=4000 href="/services/boevye-iskusstva/">
            <div class="d-flex align-items-center justify-content-center title">БОЕВЫЕ ИСКУССТВА</div>
            <video src="/video/fight.mp4" muted loop autoplay></video>
            <div class="overlay "></div>
        </a>
    </div>
</section>

<section class="page-item">
    <div class="container">
        <nav class="d-md-block d-none" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= Url::to(['/']) ?>"><?= $this->params['club']->title ?></a></li>
                <li class="breadcrumb-item"><a href="<?= Url::to(['/es/club/']) ?>">О клубе</a></li>
                <li class="breadcrumb-item active" aria-current="page">Обзор клуба</li>
            </ol>
        </nav>
        <h2 class="section-heading">Обзор клуба <?= $this->params['club']->title ?></h2>
    </div>
</section>

<?php if (explode('.', $_SERVER['HTTP_HOST'])[0] != "iyun" && explode('.', $_SERVER['HTTP_HOST'])[0] != "matros") { ?>
    <section class="vr-banner">
        <a href="<?= $this->params['club']->url_3d_tour ?>" target="_blank" class="service-header">
            <div class="d-flex align-items-center justify-content-center title" target="_blank">VR-тур по клубу</div>
            <div class="overlay"></div>
            <img class="w-100" src="/images/<?= explode('.', $_SERVER['HTTP_HOST'])[0] == "polyus" ? 'vr-full-img' : 'vr-full-piter-img' ?>.jpg" alt="" class="vr-banner__img" />
        </a>
    </section>
<?php } ?>

<section class="about-page">
    <div class="carousel slide carousel-fade" id="carouselAboutFade" data-bs-ride="carousel" data-bs-pause="false">
        <?php $i = 0;
        foreach ($banners as $banner) {  ?>
            <div class="carousel-item  <?php if ($i == 0) { ?>active<?php } ?>" data-bs-interval=3000>
                <img class="w-100" src="<?= $banner->img ? '/uploads/image/banners/' . $banner->img : '//placehold.it/900x300' ?>" alt="" />
            </div>
        <?php $i++;
        } ?>
    </div>
</section>
<section class="item-page my-3">
    <div class="container">
        <div class="about-page__text text-break">
            <?= $this->params['club']->content ?>
        </div>
        <div class="about-page__params">
            <h2 class="text-center my-5">Технические характеристики клуба</h2>
            <div class="d-flex flex-wrap justify-content-around my-5">
                <?php if (explode('.', $_SERVER['HTTP_HOST'])[0] == "piter") { ?>
                    <div class="about-page__params__item ">
                        <div class="param-block">
                            <div class="param-block__num">2008</div>
                            <div class="param-block__text">2008 год — год<br> открытия клуба</div>
                        </div>
                    </div>
                    <div class="about-page__params__item ">
                        <div class="param-block">
                            <div class="param-block__num">2240</div>
                            <div class="param-block__text">2240 м2 — общая<br> площадь клуба</div>
                        </div>
                    </div>
                    <div class="about-page__params__item ">
                        <div class="param-block">
                            <div class="param-block__num">450</div>
                            <div class="param-block__text">450 м2 — <br>тренажерный зал</div>
                        </div>
                    </div>
                    <div class="about-page__params__item ">
                        <div class="param-block">
                            <div class="param-block__num">290</div>
                            <div class="param-block__text">290 м2 —<br> 2 аэробных зала</div>
                        </div>
                    </div>
                    <div class="about-page__params__item ">
                        <div class="param-block">
                            <div class="param-block__num">96</div>
                            <div class="param-block__text">96 м2 — <br>зал единоборств</div>
                        </div>
                    </div>
                    <div class="about-page__params__item ">
                        <div class="param-block">
                            <div class="param-block__num">35</div>
                            <div class="param-block__text">35 м2 — <br>Cycle-студия</div>
                        </div>
                    </div>
                    <div class="about-page__params__item ">
                        <div class="param-block">
                            <div class="param-block__num">20</div>
                            <div class="param-block__text">20 метров — бассейн <br>на 3 дорожки</div>
                        </div>
                    </div>
                <?php } elseif (explode('.', $_SERVER['HTTP_HOST'])[0] == "iyun") { ?>
                    <div class="about-page__params__item ">
                        <div class="param-block">
                            <div class="param-block__num">2007</div>
                            <div class="param-block__text">2007 год — год<br> открытия клуба</div>
                        </div>
                    </div>
                    <div class="about-page__params__item ">
                        <div class="param-block">
                            <div class="param-block__num">2020</div>
                            <div class="param-block__text">2020 м2 — общая<br> площадь клуба</div>
                        </div>
                    </div>
                    <div class="about-page__params__item ">
                        <div class="param-block">
                            <div class="param-block__num">630</div>
                            <div class="param-block__text">630 м2 — <br>тренажерный зал</div>
                        </div>
                    </div>
                    <div class="about-page__params__item ">
                        <div class="param-block">
                            <div class="param-block__num">136</div>
                            <div class="param-block__text">136 м2 —<br>аэробные залы</div>
                        </div>
                    </div>
                    <div class="about-page__params__item ">
                        <div class="param-block">
                            <div class="param-block__num">49</div>
                            <div class="param-block__text">49 м2 — <br>Cycle-студия</div>
                        </div>
                    </div>
                <?php } elseif (explode('.', $_SERVER['HTTP_HOST'])[0] == "polyus") { ?>
                    <div class="about-page__params__item ">
                        <div class="param-block">
                            <div class="param-block__num">2016</div>
                            <div class="param-block__text">2016 год — год<br> открытия клуба</div>
                        </div>
                    </div>
                    <div class="about-page__params__item ">
                        <div class="param-block">
                            <div class="param-block__num">1580</div>
                            <div class="param-block__text">1580 м2 — общая<br> площадь клуба</div>
                        </div>
                    </div>
                    <div class="about-page__params__item ">
                        <div class="param-block">
                            <div class="param-block__num">386</div>
                            <div class="param-block__text">386 м2 — <br>тренажерный зал</div>
                        </div>
                    </div>
                    <div class="about-page__params__item ">
                        <div class="param-block">
                            <div class="param-block__num">243</div>
                            <div class="param-block__text">243 м2 —<br>аэробные залы</div>
                        </div>
                    </div>
                    <div class="about-page__params__item ">
                        <div class="param-block">
                            <div class="param-block__num">155</div>
                            <div class="param-block__text">155 м2 — <br>Cycle-студия</div>
                        </div>
                    </div>
                <?php } ?>
            </div>


        </div>
    </div>
</section>

<?= $this->render('/club/_subscribe') ?>