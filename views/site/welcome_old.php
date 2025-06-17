<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'EХTRASPORT сеть фитнес-клубов Санкт-Петербург';
$this->params['breadcrumbs'][] = $this->title;

$model = common\models\Club::find()->where(['id' => 1])->one(Yii::$app->db);
$model2 = common\models\Club::find()->where(['id' => 1])->one(Yii::$app->db2);
$model3 = common\models\Club::find()->where(['id' => 1])->one(Yii::$app->db3);
$model4 = common\models\Club::find()->where(['id' => 1])->one(Yii::$app->db4);

$url = $_SERVER['HTTP_HOST'];


?>
 <header class="main">
    <video muted loop autoplay class="w-100">
        <source src="video/bg_moution.mp4" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
        <source src="video/bg_moution.webm" type='video/webm; codecs="vp8, vorbis"'>
    </video>

    <div class="masthead d-flex align-items-center mt-0">
        <div class="container fade-in">
            <div class="d-flex justify-content-center">
                <div class="col-md-6"><img class="w-100" src="/img/logo.svg" alt="extrasport logo"></div>
            </div>
            <div class="masthead-heading text-uppercase">Сеть фитнес клубов на результат!</div>
            <a class="btn btn-primary btn-xl text-uppercase bg-black" href="#actions">Выберите клуб</a>
        </div>
    </div>
</header>
 <!-- Clubs-->
 <section class="page-section" id="actions">
    <div class="container">
      <div class="row text-center">
        <div class="col-lg-4 col-md-6"> 
          <a class="card" href="https://piter.<?=$url?>"><img class="card-img-top" src="/img/clubs/welcom-block-img-2.jpg" alt="...">
            <div class="card-body p-0">
              <div class="d-flex">
                <div class="w-100 py-2">
                  <h5 class="card-title">ТРЦ «Питер»</h5>
                  <div class="card-text">Санкт-Петербург, ул. Типанова, 21</div>
                </div>
                <div class="btn-arrow d-flex align-items-center"><i class="fa-sharp fa-solid fa-arrow-right">  </i></div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-md-6">
          <a class="card" href="https://iyun.<?=$url?>"><img class="card-img-top" src="/img/clubs/welcom-block-img-1.jpg" alt="...">
            <div class="card-body p-0">
              <div class="d-flex">
                <div class="w-100 py-2">
                  <h5 class="card-title">ТРЦ «Июнь»</h5>
                  <div class="card-text">Санкт-Петербург, Индустриальный пр., 24</div>
                </div>
                <div class="btn-arrow d-flex align-items-center"><i class="fa-sharp fa-solid fa-arrow-right"> </i></div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-md-6"> 
          <a class="card" href="https://polyus.<?=$url?>"><img class="card-img-top" src="/img/clubs/welcom-block-img-3.jpg" alt="...">
            <div class="card-body p-0">
              <div class="d-flex">
                <div class="w-100 py-2">
                  <h5 class="card-title">ТРЦ «Южный полюс»</h5>
                  <div class="card-text">Санкт-Петербург, ул. Пражская, 48/50</div>
                </div>
                <div class="btn-arrow d-flex align-items-center"><i class="fa-sharp fa-solid fa-arrow-right">  </i></div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-6 col-md-6"> 
          <a class="card" href="https://matros.<?=$url?>"><img class="card-img-top" src="/img/clubs/welcom-block-img-4.jpg" alt="...">
            <div class="card-body p-0">
              <div class="d-flex">
                <div class="w-100 py-2">
                  <h5 class="card-title">«Матроса железняка»</h5>
                  <div class="card-text">Санкт-Петербург, ул. Матроса Железняка, 57А</div>
                </div>
                <div class="btn-arrow d-flex align-items-center"><i class="fa-sharp fa-solid fa-arrow-right">  </i></div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-6 col-md-12"> 
          <a class="card" href="https://de-vision.ru"><img class="card-img-top" src="/img/clubs/welcom-block-img-5.jpg" alt="...">
            <div class="card-body p-0">
              <div class="d-flex">
                <div class="w-100 py-2">
                  <h5 class="card-title">De-vision</h5>
                  <div class="card-text">Санкт-Петербург, пр. Культуры, 1</div>
                </div>
                <div class="btn-arrow d-flex align-items-center"><i class="fa-sharp fa-solid fa-arrow-right">  </i></div>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!--Map-->
  <section class="map-section welcome">
    <div class="map-section__map" id="map"> </div>
  </section>
  
 
  <!-- Footer-->
  <footer>
    <div class="footer-top py-5">
      <div class="container">
        <div class="row">
          <div class="col-xl-6 col-md-4">
            <div class="row">
              <div class="col-lg-6 text-center">
                <ul class="map-section__list p-0">
                  <li><a href="https://piter.<?=$url?>">ТРЦ «Питер»</a></li>
                  <li><a href="https://iyun.<?=$url?>">ТРЦ «Июнь»</a></li>
                  <li><a href="https://polyus.<?=$url?>">ТРЦ «Южный полюс»</a></li>
                </ul>
              </div>
              <div class="col-lg-6 text-center">
                <ul class="map-section__list p-0">
                  <li><a href="https://matros.<?=$url?>">«Матроса железняка»</a></li>
                  <li><a href="https://de-vision.ru">De-Vision</a></li>
                </ul>
              
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-md-8">
            <div class="row align-items-center">
              <div class="col-lg-7">
                 <div class="d-flex justify-content-center mt-3">Мы в:<a class="fa-brands fa-vk fs-2 ps-3" href="https://vk.com/extrasport_ru" target="_blunk"></a><a class="fa-brands fa-youtube fs-2 ps-3" href="https://www.youtube.com/channel/UCCUUiy9ZROCNHBmDvPF-dxw/featured" target="_blunk"></a></div>
              </div>
              <div class="col-lg-5">                  
                <div class="footer__api d-flex flex-lg-column justify-content-center"><a class="d-flex align-items-center justify-content-end my-3 ps-3" href="https://play.google.com/store/apps/details?id=air.com.extrasport" target="_blunk" onclick="ym(21525628, 'reachGoal', 'download_app');">
                    <p class="m-0 text-end">Доступно в <br><b>GOOGLE PLAY</b></p><i class="fa-brands fa-google-play fs-1 ps-3"></i></a><a class="d-flex align-items-center justify-content-end my-3 ps-3" href="https://itunes.apple.com/ru/app/extra-sport/id1462883244?mt=8" target="_blunk" onclick="ym(21525628, 'reachGoal', 'download_app');">
                    <p class="m-0 text-end">Загрузите в <br><b>APP STORE</b></p><i class="fa-brands fa-app-store-ios fs-1 ps-3"> </i></a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom col-lg-12">
      <div class="container">
        <div class="row">
          <div class="col-md-4 text-md-start">&copy; 2023 EХTRASPORT, LLC</div>
          <div class="col-md-8 text-md-end"><a class="text-decoration-none me-2" href="#rules"  data-bs-toggle="modal">Правила поведения в клубе &nbsp; |</a>
          <a class="text-decoration-none" href="https://piter.<?= $url ?>/legal/" target="_blunk">Правовая информация</a></div>
        </div>
      </div>
    </div>
  </footer>
  
  <div class="modal fade popup-wrap" id="rules" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-bs-dismiss="modal"><button class="btn-close btn-close-white" type="button"
                    aria-label="Close"></div>
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">ПРАВИЛА СПОРТИВНОГО КЛУБА «ЭКСТРА СПОРТ»</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>1. Часы работы Клуба устанавливаются с 8.00 до 22.00 (вход в Клуб до 21.30). В праздничные и выходные
                    дни с 09.00 до 22.00 (Вход в клуб до 21.30). Клуб имеет право изменять часы работы. Информация об
                    изменениях часов работы распространяется на информационных стендах.</p>

                <p>2. Пропуском в Клуб является клубная карта, которая оформляется только по предъявлению паспорта и
                    после подписания договора с Клубом. Клубная карта является собственностью клуба &laquo;Экстра
                    Спорт&raquo;. Член Клуба обязан предъявлять клубную карту при входе в помещение Клуба. В случае
                    разового временного отсутствия клубной карты у Члена Клуба, доступ в Клуб осуществляется по
                    временному пропуску, который выписывается по предъявлению документа, удостоверяющего личность Члена
                    Клуба. При утере карты необходимо уведомить клуб в обязательном порядке и заплатить штраф, согласно
                    прейскуранту Клуба, во избежание недоразумений.</p>

                <p>3. Членство в Клубе является персональным и не может быть передано или использовано другими лицами
                    без переоформления клубной карты. Член Клуба обязан предъявить клубную карту или ключ от шкафа
                    работникам Клуба по их требованию. Если Клубное Членство было передано другому лицу без
                    переоформления, то абонемент закрывается без возврата денег.</p>

                <p>4. Член Клуба имеет право переоформить клубную карту на другое лицо в случае невозможности
                    самостоятельного посещения Клуба. Для переоформления клубной карты Члену Клуба необходимо письменно
                    изъявить свое желание, предъявить оригинал договора оказания физкультурно-оздоровительных и
                    спортивных услуг и документ, удостоверяющий личность. С момента переоформления прежняя клубная карта
                    прекращает свое действие. Оформление новой клубной карты оплачивается отдельно согласно прейскуранту
                    на рецепции клуба.</p>

                <p>5. Член Клуба имеет право получить ключ от шкафа в обмен на клубную карту. В случае утери (или порчи)
                    клубной карты, ключа от шкафа или любого другого инвентаря, выдаваемого Клубом на время занятий,
                    Член Клуба обязан заплатить штраф, размер которого устанавливается Клубом. При выходе из клуба после
                    тренировки Член Клуба обязан вернуть ключ с замком на рецепцию и забрать свои карточку или договор.
                    Нельзя покидать территорию Клуба, не вернув замок с ключом.</p>

                <p>6. В период нахождения в Клубе личные вещи Члена Клуба должны храниться в шкафах раздевалки. Клуб не
                    несет ответственности за личные вещи, оставленные в раздевалках и в помещениях для тренировок. После
                    занятия Член Клуба обязан освободить шкаф от личных вещей и сдать ключ на рецепцию. Ценные вещи
                    рекомендуется сдавать на хранение в сейф на рецепции клуба. Нельзя оставлять свои личные вещи в
                    шкафчиках в раздевалках не на время тренировок.</p>

                <p>7. При первом посещении Клуба, Члену Клуба необходимо сфотографироваться в отделе продаж, в противном
                    случае Клуб имеет право не допустить клиента до занятий.</p>

                <p>8. При первом посещении Клуба Члену Клуба настоятельно рекомендуется пройти инструктаж и консультацию
                    спортивного врача и в дальнейшем строго придерживаться рекомендаций врача, инструкторов и персонала
                    Клуба.</p>

                <p>9. Член Клуба обязан осуществлять тренировки в Клубе в чистой спортивной одежде (верхняя часть тела
                    должна быть закрыта) и закрытой чистой спортивной обуви, соблюдать правила общей гигиены, перед
                    посещением сауны принять душ. Запрещается тренироваться босиком, в пляжных или домашних тапочках и
                    т.п. Исключения составляют спец. классы (например: йога,Pilates). Обувь должна быть сменной.</p>

                <p>10. Клуб имеет право не допускать Члена Клуба на тренировку в одежде и обуви, не предназначенной для
                    конкретного типа занятий.</p>

                <p>11. Член Клуба обязан соблюдать чистоту во всех помещениях Клуба, которые используются им до, во
                    время и после тренировок. 12. Запрещено лить воду на камни в сауне. Сауна финская, сухая, с
                    постоянной температурой не более 98 С.</p>

                <p>13. Член Клуба помимо настоящих Правил обязан соблюдать правила посещения отдельных зон Клуба (салон
                    красоты, банный комплекс, сауну и т.д.). Запрещается пользоваться в душевых и в сауне скрабом для
                    тела.</p>

                <p>14. Член Клуба в период нахождения в Клубе обязуется соблюдать правила общественного порядка (вести
                    себя культурно, не использовать в своей речи ненормативную лексику, не доставлять неудобства
                    посетителям Клуба и т.д.). В случае несоблюдения данной нормы, Клуб имеет право расторгнуть договор
                    в одностороннем порядке без возврата денежных средств. При наличии договоренности с администрацией
                    Клуба расторжение договора может быть заменено на сокращение срока его действия.</p>

                <p>15. Член Клуба обязан покидать территорию Клуба не позднее установленного времени его закрытия. При
                    задержке выхода из клуба более, чем на 5 минут, Члену Клуба делается предупреждение в письменном
                    виде, и после 3-х предупреждений администрация Клуба в праве закрыть абонемент за нарушение Правил
                    Клуба.</p>

                <p>16. Для обеспечения безопасности тренировочного процесса в тренажерном зале, Член Клуба обязан
                    выполнять упражнения с весами, определенными инструктором Клуба. Определение весов для конкретного
                    Клиента производится тренером во время персональной тренировки, которая оплачивается отдельно в
                    кассу или на расчетный счет Клуба.</p>

                <p>17. После окончания тренировок Член Клуба обязан вернуть спортивный инвентарь (грифы, блины, гантели
                    и т.д.) в специально отведенные места в надлежащем состоянии. За утерю и порчу оборудования,
                    инвентаря Член Клуба несет материальную ответственность.</p>

                <p>18. Групповые занятия в Клубе проводятся по расписаниям, установленным Клубом. Клуб оставляет за
                    собой право вносить изменения и дополнения в расписание и осуществлять замену заявленного в
                    расписании инструктора. Член Клуба обязан приходить на групповые занятия без опозданий.</p>

                <p>19. Родители несут персональную ответственность за детей на территории Клуба. Дети до 14 лет обязаны
                    посещать Клуб только с персональным тренером Клуба (либо с тренером групповых специализированных для
                    детей тренировок в назначенное расписанием время только в указанном в расписании помещении). Время
                    персонального тренера Клуба либо коммерческие групповые занятия оплачиваются отдельно.</p>

                <p>20. Запрещено проведение персональных тренировок лицами, не являющимися тренерами-инструкторами
                    Клуба.</p>

                <p>21. Во время проведения клубных мероприятий Клуб имеет право ограничить зону, предназначенную для
                    тренировок. Клуб имеет право закрывать помещения на время проведения специальных мероприятий и/или
                    ремонтных работ, о чем Члены Клуба информируются заранее путем размещения в Клубе объявлений не
                    менее чем за 24 часа до проведения указанных мероприятий.</p>

                <p>22. Член Клуба не возражает против осуществления в здании Клуба и на прилегающей к зданию территории
                    видеосъемки и видеонаблюдения.</p>

                <p>23. Члену Клуба запрещено осуществлять кино- и фотосъемку в Клубе без письменного разрешения Клуба.
                </p>

                <p>24. Члену Клуба запрещено самостоятельно пользоваться музыкальной и другой технической аппаратурой
                    Клуба.</p>

                <p>25. Все помещения Клуба являются зонами, свободными от курения. Члену Клуба запрещено приносить в
                    Клуб напитки и продукты питания, а также употреблять алкогольные и слабоалкогольные напитки, включая
                    пиво в помещениях Клуба. Члену Клуба запрещено находиться в Клубе в нетрезвом виде, принимать пищу в
                    местах, предназначенных для тренировок, в зонах отдыха и раздевалках.</p>

                <p>26. Члену Клуба запрещено входить на территорию, предназначенную для служебного пользования, за
                    исключением случаев, когда имеется специальное приглашение.</p>

                <p>27. Члену Клуба запрещено размещать объявления, рекламные материалы, проводить опросы и
                    распространять товары на территории Клуба без письменного разрешения Клуба.</p>

                <p>28. В Клубе действует закрытая клубная система. Клуб вправе отказать Члену Клуба и/или гостю Члена
                    Клуба в заключение договора и/или в пропуске в здание Клуба. Клуб вправе в одностороннем порядке
                    расторгнуть договор без объяснения причин.</p>

                <p>29. Члену Клуба запрещено входить на территорию Клуба с домашними животными.</p>

                <p>30. Члену Клуба, а также приглашенным им (и/или сопровождающим его лицам) запрещено проносить на
                    территорию Клуба любое холодное и/или огнестрельное оружие.</p>

                <p>31. Клуб не несет ответственности за технические неудобства, вызванные проведением муниципальными
                    властями и арендодателями профилактических, ремонтно-строительных и иных работ.</p>

                <p>32. Гости клуба, не являющиеся его членами и никогда ранее не посещавшими клуб, имеют право на один
                    гостевой визит, который может состояться только во время, установленное администрацией клуба (в
                    будние дни с 10:00 до 18:00, в выходные и праздники с 10:00 до 22:00) и в помещениях, установленных
                    администрацией клуба в специальных объявлениях/приказах. Вход осуществляется ТОЛЬКО при наличии
                    документа удостоверяющего личность. Гостевой визит оформляется в отделе продаж.</p>

                <p>33. Абонементы с пометкой &laquo;VIP&raquo; переоформлению и возврату не подлежат.</p>

                <p>34. Все дополнительные услуги Клуба, не включенные в договор на клубное членство, являются платными и
                    оплачиваются перед оказанием данной услуги.</p>

                <p>35. Клуб имеет право в одностороннем порядке дополнять и изменять настоящие Правила. Новые правила и
                    / или их дополнения, изменения вступают в силу для Члена Клуба с момента размещения Правил или
                    соответствующих приказов/нормативных актов для всеобщего ознакомления на рецепции или в других
                    доступных для Клиентов помещениях Клуба.</p>

            </div>
            <div class="modal-footer">
                <a class="btn btn-primary btn-lg" href="/uploads/rules.pdf" target="">Cкачать PDF</a>
            </div>
        </div>
    </div>

<?php
$this->registerJsFile('https://api-maps.yandex.ru/2.1/?lang=ru_RU');
$js = <<< JS
ymaps.ready(init);
    function init () {
        var host = window.location.hostname; 
        var myMap = new ymaps.Map('map', {
                // При инициализации карты, обязательно нужно указать
                // ее центр и коэффициент масштабирования
                //center: [68.956833,33.067446],
                center: [$model->coordinates],
                zoom: 11,
                controls: []
            },{suppressMapOpenBlock: true});
            
            //myMap.controls.add('zoomControl', { top: 75, left: 5 });
            myMap.behaviors.disable('scrollZoom');
    
            var myPlacemark = new ymaps.Placemark(
            [$model->coordinates], {
                hintContent: 'EХTRASPORT Питер'
            }, {
                iconLayout: 'default#image',
                iconImageHref: '/images/marker.png', // картинка иконки
                iconImageSize: [57, 80], // размеры картинки
                iconImageOffset: [-28, -80] // смещение картинки
                });
            
            var myPlacemark2 = new ymaps.Placemark(
            [$model2->coordinates], {
                hintContent: 'EХTRASPORT Июнь'
            }, {
                iconLayout: 'default#image',
                iconImageHref: '/images/marker.png', // картинка иконки
                iconImageSize: [57, 80], // размеры картинки
                iconImageOffset: [-28, -80] // смещение картинки
                });
            
            var myPlacemark3 = new ymaps.Placemark(
            [$model3->coordinates], {
                hintContent: 'EХTRASPORT Полюс'
            }, {
                iconLayout: 'default#image',
                iconImageHref: '/images/marker.png', // картинка иконки
                iconImageSize: [57, 80], // размеры картинки
                iconImageOffset: [-28, -80] // смещение картинки
                });
            
            var myPlacemark4 = new ymaps.Placemark(
            [$model4->coordinates], {
                hintContent: 'EХTRASPORT Матроса Железняка'
            }, {
                iconLayout: 'default#image',
                iconImageHref: '/images/marker.png', // картинка иконки
                iconImageSize: [57, 80], // размеры картинки
                iconImageOffset: [-28, -80] // смещение картинки
                });
            
            var myPlacemark5 = new ymaps.Placemark(
            [60.033517089690086,30.36834735319519], {
                hintContent: 'De-vision'
            }, {
                iconLayout: 'default#image',
                iconImageHref: '/images/marker2.png', // картинка иконки
                iconImageSize: [57, 80], // размеры картинки
                iconImageOffset: [-28, -80] // смещение картинки
                });
            
            myMap.geoObjects.add(myPlacemark);
            myMap.geoObjects.add(myPlacemark2);
            myMap.geoObjects.add(myPlacemark3);
            myMap.geoObjects.add(myPlacemark4);
            myMap.geoObjects.add(myPlacemark5);
            
            myMap.setBounds(myMap.geoObjects.getBounds());
            
            myPlacemark.events.add('click', function (e) { window.location.href = 'https://piter.' + host});
            myPlacemark2.events.add('click', function (e) { window.location.href = 'https://iyun.'  + host });
            myPlacemark3.events.add('click', function (e) { window.location.href = 'https://polyus.'  + host });
            myPlacemark4.events.add('click', function (e) { window.location.href = 'https://matros.'  + host });
            myPlacemark5.events.add('click', function (e) { window.location.href = 'https://de-vision.ru' });
    }
JS;
$this->registerJs($js);