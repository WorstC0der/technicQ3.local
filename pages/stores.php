<?php
    $title = "Магазины";
    require_once("header.php");
    
?>

    <div class="container">
      <p class="title">Магазины в г. Белгород</p>
    </div>

    <div class="container shop-info">
      <div class="shop-group">
        <div class="shop-card">
          <h4>МТРК «Сити Молл»</h4>
          <p>г. Белгород, Белгородский р-н, п. Дубовое, ул. Щорса 64</p>
          <p>Ежедневно с 10:00 до 22:00</p>
        </div>

        <div class="shop-card">
          <h4>Народный бульвар</h4>
          <p>г. Белгород, Народный б-р, д. 70</p>
          <p>Ежедневно с 10:00 до 22:00</p>
        </div>

        <div class="shop-card-last">
          <h4>ТРЦ «РИО»</h4>
          <p>г. Белгород, пр-т Богдана Хмельницкого, д. 164</p>
          <p>Ежедневно с 10:00 до 22:00</p>
        </div>
      </div>
      <div class="map">
        <script
          type="text/javascript"
          charset="utf-8"
          async
          src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A01409a394611156f49be55c041aa4ec306cd27ee00799edeb8f184c80ea1639a&amp;width=512&amp;height=512&amp;lang=ru_RU&amp;scroll=true"
        ></script>
      </div>
    </div>

    <?php
    require_once("footer.php");
    ?>
