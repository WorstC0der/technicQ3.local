<?php
    $title = "Главная страница";
    require_once("header.php");
    
?>

    <div class="container">
      <div class="sidebar">
        <ul>
          <li>
            <a href="">
              <img src="../img/index/computer.svg" class="pic" />
              ПК, ноутбуки
            </a>
          </li>
          <li>
            <a href="">
              <img src="../img/index/processor.svg" class="pic" />
              Комплектующие для ПК
            </a>
          </li>
          <li>
            <a href="">
              <img src="../img/index/power.svg" class="pic" />
              Периферия и аксессуары
            </a>
          </li>
        </ul>
      </div>

      <div class="main-content">
        <div class="content">
          <a class="card actions" href="../pages/actions.php">
            <h3>Акции</h3>
            <p>Скидки, рассрочки, выгодные комплекты</p>
          </a>
          <a class="card build-pc" href="">
            <h3>Собрать ПК</h3>
            <p>Без проблем с совместимостью</p>
          </a>
          <a class="card ready-made-assemblies" href="">
            <h3>Готовые сборки</h3>
            <p>Горячие сборки ПК от пользователей</p>
          </a>
          <a class="card help" href="../pages/help.php">
            <h3>Помощь</h3>
            <p>Частые вопросы, полезная информация</p>
          </a>
        </div>
        <br />
        <div class="content">
          <div class="transparent-card">
            <h3>Работаем из дома</h3>
            <div class="actual-offers">
              <div class="white-card">
                <img src="../img/index/laptop.jpg" class="actual-offers-img" />
              </div>
              <div class="nav-card">
                <a href="">Ноутбуки</a>
                <a href="">Мониторы</a>
                <a href="">Персональные <br />компьютеры</a>
                <a href="">Моноблоки</a>
              </div>
            </div>
          </div>

          <div class="transparent-card" style="margin: 0 15px">
            <h3>Пора обновиться</h3>
            <div class="actual-offers">
              <div class="white-card">
                <img
                  src="../img/index/video_card.webp"
                  class="actual-offers-img"
                />
              </div>
              <div class="nav-card">
                <a href="">Видеокарты</a>
                <a href="">Процессоры</a>
                <a href="">Материнские<br />платы</a>
                <a href="">Блоки питания</a>
              </div>
            </div>
          </div>

          <div class="transparent-card">
            <h3>Периферия для каждого</h3>
            <div class="actual-offers">
              <div class="white-card">
                <img
                  src="../img/index/headphones.jpg"
                  class="actual-offers-img"
                />
              </div>
              <div class="nav-card">
                <a href="">Наушники и<br />гарнитуры</a>
                <a href="">Мыши</a>
                <a href="">Клавиатуры</a>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-container">
          <div class="carousel-track">
            <div class="carousel-item">
              <a class="brand-card" href=""
                ><img src="../img/index/asus.png"
              /></a>
            </div>
            <div class="carousel-item">
              <a class="brand-card" href=""
                ><img src="../img/index/msi.png"
              /></a>
            </div>
            <div class="carousel-item">
              <a class="brand-card" href=""
                ><img src="../img/index/corsair.webp"
              /></a>
            </div>
            <div class="carousel-item">
              <a class="brand-card" href=""
                ><img src="../img/index/logitech.webp"
              /></a>
            </div>
            <div class="carousel-item">
              <a class="brand-card" href=""
                ><img src="../img/index/amd.png"
              /></a>
            </div>
            <div class="carousel-item">
              <a class="brand-card" href=""
                ><img src="../img/index/palit.png"
              /></a>
            </div>
            <div class="carousel-item">
              <a class="brand-card" href=""
                ><img src="../img/index/deepCool.png"
              /></a>
            </div>
            <div class="carousel-item">
              <a class="brand-card" href=""
                ><img src="../img/index/ardor.png"
              /></a>
            </div>
            <div class="carousel-item">
              <a class="brand-card" href=""
                ><img src="../img/index/cougar.jpg"
              /></a>
            </div>
            <div class="carousel-item">
              <a class="brand-card" href=""
                ><img src="../img/index/xpg.png"
              /></a>
            </div>
          </div>
          <button class="carousel-button prev disabled">&lt;</button>
          <button class="carousel-button next">&gt;</button>
        </div>
      </div>
    </div>

    <script src="../scripts/index.js"></script>
    <?php
    require_once("footer.php");
    ?>
    