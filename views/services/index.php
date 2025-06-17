<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $params \common\models\GroupProgramsParams */
/* @var $seo \common\models\Seo */

$this->title = $seo->title;
$this->registerMetaTag(['name' => 'keywords', 'content' => $seo->keywords]);
$this->registerMetaTag(['name' => 'description', 'content' => $seo->description]);

$sub = explode('.', $_SERVER['HTTP_HOST'])[0];

if ($sub == 'piter') {
    $src = 'piter';
    $active = '';
} else {
    $src = 'clubs';
    $active = 'active';
}

?>

<section id="#services" class="page-item">
    <div class="carousel about slide carousel-fade" id="carouselExampleFade" data-bs-ride="carousel" data-bs-pause="false">
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

<section class="page-section page-item">
    <div class="container">
        <nav class="d-md-block d-none" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= Url::to(['/']) ?>"><?= $this->params['club']->title ?></a></li>
                <li class="breadcrumb-item active" aria-current="page">Услуги</li>
            </ol>
        </nav>
        <h2 class="section-heading">Услуги клуба <?= $this->params['club']->title ?></h2>
        <div class="d-none"><?= $seo->text ?></div>
        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'options' => ['class' => 'row'],
            'itemOptions' => ['tag' => null],
            'layout' => '{items}',
            'emptyText' => 'Записей не найдено',
            'itemView' => function ($model, $key, $index, $widget) {
                return $this->render('_post', ['model' => $model, 'index' => $index]);
            },
        ]) ?>
    </div>
</section>

<!-- Contact-->
<?= $this->render('/club/_subscribe') ?>