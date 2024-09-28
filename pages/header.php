<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $title?></title>
    <link rel="stylesheet" href="../styles.css" type="text/css" />
    <link
      rel="stylesheet"
      href="../font-awesome-4.7.0/css/font-awesome.css"
      type="text/css"
    />
    <!-- Фавикон -->
    <link
      rel="apple-touch-icon"
      sizes="180x180"
      href="../img/favicon//apple-touch-icon.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="32x32"
      href="../img/favicon//favicon-32x32.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="../img/favicon/favicon-16x16.png"
    />
    <link rel="manifest" href="../img/favicon//site.webmanifest" />
    <link
      rel="mask-icon"
      href="../img/favicon//safari-pinned-tab.svg"
      color="#5bbad5"
    />
    <meta name="msapplication-TileColor" content="#da532c" />
    <meta name="theme-color" content="#ffffff" />
  </head>
  <body>
    <header>
      <nav>
        <a href="actions.php">Акции</a>
        <a href="stores.php">Магазины</a>
        <a href="help.php">Помощь</a>
        <a href="reviews.php">Отзывы</a>
        <a href="about.php">О нас</a>
      </nav>
    </header>

    <div class="header-placeholder" id="header-placeholder"></div>
    <div class="header-container" id="header-container">
      <div class="container header">
        <div
          class="logo"
          onmouseover="startGradient()"
          onmouseout="stopGradient()"
        >
          <img
            src="../img/logo.png"
            alt="Logo"
            onclick="window.location.href='index.php';"
          />
        </div>

        <div action="/search" method="get" class="search-container">
          <input
            type="search"
            name="q"
            placeholder="Поиск по сайту"
            class="search"
          />
          <button type="submit" class="search-button">
            <i class="fa fa-search" style="font-size: 20px"></i>
          </button>
        </div>

        <?php
        require_once("login.php");
        ?>
      </div>
    </div>