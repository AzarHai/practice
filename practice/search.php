<?php
if (isset($_POST['query'])) {
    $query = htmlspecialchars($_POST['query']); // Получаем поисковый запрос и защищаемся от XSS
    $pages = [
        'index.php' => [
            'title' => 'Главная',
            'content' => '<h2 class="featurette-heading">Гарантии качества</h2>
                          <p class="lead">Наша компания работает с 1996 года. Основными клиентами являются приборостроительные заводы, заводы точного машиностроения,предприятия авиационно-космической техники, центры стандартизации и метрологии, научно-исследовательские институты и учреждения высшего образования.
            Мы поставляем и внедряем измерительный инструмент и системы лучших мировых производителей.
            Наши инженеры по оборудованию решают сложнейшие измерительные задачи и обучают заказчиков.
            Наша сервисная служба обеспечивает постоянную техническую поддержку всего поставляемого оборудования.
            Наш коммерческий отдел всегда заботится о наших заказчиках.
            Все это позволяет нам быть одним из крупнейших поставщиков измерительной техники в РФ и странах СНГ.</p>',
            'date' => '2023-01-01',
            'author' => 'Администратор'
        ],
        'company.php' => [
            'title' => 'Информация о компании, история, миссия и ценности.',
            'content' => '<p>Описание компании...</p>',
            'date' => '2023-01-01',
            'author' => 'Администратор'
        ],
        'about.php' => [
              'title' => 'Подробнее о нас и нашей команде.',
              'content' => '<h2 class="featurette-heading">Гарантии качества</h2>
                            <p class="lead">Наша компания работает с 1996 года...',
                'date' => '2023-01-01',
              'author' => 'Администратор'
        ],
        'contact.php' => [
              'title' => 'Контактная информация для связи с нами.',
              'content' => '<h2 class="featurette-heading">Гарантии качества</h2>
                            <p class="lead">Наша компания работает с 1996 года...',
              'date' => '2023-01-01',
              'author' => 'Администратор'
        ],
        'vacance.php' => [
            'title' => 'Актуальные вакансии и возможности для трудоустройства.',
            'content' => '<h2 class="featurette-heading">Гарантии качества</h2>
                          <p class="lead">Наша компания работает с 1996 года...',
            'date' => '2023-01-01',
            'author' => 'Администратор'
        ],
        'postavka.php' => [
            'title' => 'Информация о поставках и партнёрах.',
            'content' => '<h2 class="featurette-heading">Гарантии качества</h2>
                          <p class="lead">Наша компания работает с 1996 года...',
            'date' => '2023-01-01',
            'author' => 'Администратор'
        ],
        'map.php' => [
            'title' => 'Карта сайта для быстрого навигации.',
            'content' => '<h2 class="featurette-heading">Гарантии качества</h2>
                          <p class="lead">Наша компания работает с 1996 года...',
            'date' => '2023-01-01',
            'author' => 'Администратор'],
        'news.php' => [
            'title' => 'Последние новости и события компании.',
            'content' => '<h2 class="featurette-heading">Гарантии качества</h2>
                          <p class="lead">Наша компания работает с 1996 года...',
            'date' => '2023-01-01',
            'author' => 'Администратор'],
        'catalog.php' => [
            'title' => 'Каталог насосов и оборудования, которые мы предлагаем.',
            'content' => '<h2 class="featurette-heading">Гарантии качества</h2>
                          <p class="lead">Наша компания работает с 1996 года...',
            'date' => '2023-01-01',
            'author' => 'Администратор']
     ];

     $results = [];

     // Максимально допустимое расстояние Левенштейна для поиска похожих слов
     $max_distance = 2;
 
     // Ищем совпадения, игнорируя регистр
     foreach ($pages as $page => $data) {
         $title = $data['title'];
         $content = strip_tags($data['content']); // Удаляем HTML-теги из содержимого
 
         // Если есть точное совпадение в заголовке или содержимом
         if (stripos($title, $query) !== false || stripos($content, $query) !== false) {
             $results[$page] = [
                 'title' => $title,
                 'date' => $data['date'],
                 'author' => $data['author']
             ];
         } else {
             // Разбиваем заголовок и содержимое на слова и проверяем каждое слово
             $words = array_merge(explode(' ', $title), explode(' ', $content));
             foreach ($words as $word) {
                 // Если расстояние Левенштейна между словом и запросом меньше или равно допустимому, добавляем результат
                 if (levenshtein(mb_strtolower($word), mb_strtolower($query)) <= $max_distance) {
                     $results[$page] = [
                         'title' => $title,
                         'date' => $data['date'],
                         'author' => $data['author']
                     ];
                     break; // Достаточно одного совпадения, чтобы добавить страницу в результаты
                 }
             }
         }
     }
 }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>"Дора" — Проектирование высокоэффективных систем насосов</title>
    <link rel="icon" href="water_pump_icon_229881.ico">
    <link rel="stylesheet" href="./header.css" !important;/>
    <style>
       .copyright {
        color: white; /* Цвет текста */
        }
        .brand-icon {
      width: 125px; /* Задайте нужный размер значка */
      height: 125px; /* Задайте нужный размер значка */
      margin-right: 32px; /* Отступ справа от значка */
      margin-left: 32px; /* Отступ справа от значка */
    }
    .brand-icon1 {
      width: 32px; /* Задайте нужный размер значка */
      height: 32px; /* Задайте нужный размер значка */
      margin-right: 0px; /* Отступ справа от значка */
      margin-left: 15px; /* Отступ справа от значка */
    }
  .search-button1 {
          width: 30px; /* Размер кнопки поиска */
          height: 30px; /* Размер кнопки поиска */
          display: flex;
          align-items: center;
          justify-content: center;
          border: 1px solid #ccc; /* Граница кнопки */
          border-radius: 4px; /* Радиус границы кнопки */
          background-color: #f8f9fa; /* Цвет фона кнопки */
          cursor: pointer;
        }
        .search-button1 img {
          width: 20px; /* Задайте нужный размер значка */
          height: 20px; /* Задайте нужный размер значка */
        }
      body {
        padding-top: 85px; /* Отступ сверху, равный высоте header */
      }
      section {
        background-color: #ffffff;
        max-width: 1200px;
        margin: 0 auto 10px; /* Отступы: сверху 0, снизу 50px, авто для центрирования по горизонтали */
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding-top: 95px; /* Отступ сверху, равный высоте header */
      }
      .preserve-whitespace {
        white-space: pre-wrap; /* Сохраняем пробелы и переносы строк */
      }
      .carousel-item {
        height: 32rem;
        background:#000;
        color:white;
        position: relative;
        background-position:center;
        background-size:cover;
      }
      .container{
        position:absolute;
        bottom:0;
        left:0;
        right:0;
        padding-bottom: 50px;
      }
      .overlay-image{
        position:absolute;
        bottom:0;
        left:0;
        right:0;
        top:0;
        background-position:center;
        background-size:cover;
        opacity:0.5;
        background-repeat: no-repeat;
      }
      .link-container {
        width: 224px;
        height: 114px; /* Автоматическая высота */
        background-color: #898c8a; /* Серый цвет фона для области ссылок */
        display: block;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 20px;
        margin-bottom: 10px;
        margin-right: 20px; /* Уменьшенный отступ справа */
        margin-left: 200px; /* Сдвиг влево */
        margin-top: -220px; /* Поднятие вверх */
      }

      .featurette-text {
          margin-bottom: 10px; /* Отступ снизу между блоками */
      }

      .featurette-text a {
          display: block; /* Делаем ссылки блочными элементами */
          padding: 5px; /* Внутренний отступ вокруг текста ссылки */
          color: black; /* Цвет ссылок */
          line-height: 0.55; /* Высота строки */
      }

      .row.featurette {
        display: flex;
        align-items: center;
        flex-wrap: wrap; /* Разрешаем перенос элементов */
        margin-left: -250px; /* Сдвиг влево */
      }
      .col-md-7 {
        flex: 1;
        min-width: 200px; /* Минимальная ширина для адаптивности */
      }
      .col-md-5 {
        flex: 0.5;
        min-width: 200px; /* Минимальная ширина для адаптивности */
      }
      .brand-header .tagline {
        font-size: 0.8em; 
        margin-top: 70px; 
        margin-left: -690px; 
        color: black; 
        position: relative;
        
      }
      .brand-header .contact-info1 {
        position: absolute; /* Абсолютное позиционирование */
        left: 950px; /* Сдвиг влево */
        top: 30%; /* Вертикальное выравнивание */
        transform: translateY(-50%); /* Центрирование по вертикали */
        font-size: 0.6em; 
      }
      .brand-header .contact-info2 {
        position: absolute; /* Абсолютное позиционирование */
        left: 1000px; /* Сдвиг влево */
        top: 15%; /* Вертикальное выравнивание */
        transform: translateY(-50%); /* Центрирование по вертикали */
        font-size: 0.6em; 
      }
      .sticky-header {
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 1000;
        background-color: white; /* Убедитесь, что фон совпадает с цветом заголовка */
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Тень для визуального отделения */
        display: none; /* Изначально скрыта */
      }
      input[type="text"] {
        width: 100%;
        padding: 10px; /* Подходящий отступ вокруг текста */
        font-size: 16px; /* Размер шрифта */
        border: 1px solid #ccc; /* Подходящий цвет рамки */
        border-radius: 4px; /* Скругление углов (если нужно) */
        box-sizing: border-box; /* Учет внутреннего отступа и рамки в общей ширине */
    }

    .search-icon {
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        cursor: pointer;
    }

    @media (max-width: 768px) {
        input[type="text"] {
            font-size: 14px; /* Пример настройки для маленьких экранов */
        }
    }
    input[type="text"] {
            padding: 10px 20px; /* Отступы слева и справа для текста внутри поля */
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
            width: 300px; /* Ширина поля ввода */
            background-image: url('лупа.png'); /* Изображение лупы как фон */
            background-size: 20px; /* Размер изображения лупы */
            background-position: right 10px center; /* Положение лупы справа */
            background-repeat: no-repeat; /* Запрет на повтор изображения */
        }

        input[type="text"]:focus {
            border-color: #0f5e9c; /* Цвет рамки при фокусе */
        }
        .search-results {
            background-color: #f0f0f0;
            padding: 10px;
            margin-top: 20px;
            border-radius: 8px;
            display: flex;
            flex-wrap: wrap; /* Разрешает перенос элементов на новую строку */
        }

        .result {
            width: calc(33.33% - 20px); /* Ширина блока, минус отступы между элементами */
            margin: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            box-sizing: border-box; /* Учитывает padding и border в расчете ширины */
        }

        .no-results {
            background-color: #f0f0f0;
            padding: 10px;
            margin-top: 20px;
            border-radius: 8px;
            width: 100%; /* Чтобы занимал всю ширину родительского контейнера */
        }
        .result-content {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
        }
        .result h4 a {
              text-decoration: none; 
              color:black;
          }
          .result h4 a:hover {
              color: blue; /* Новый цвет при наведении курсора */
          }
    </style>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="./style.css" />
    <script src="https://api-maps.yandex.ru/2.1/?apikey=98b95686-dd86-4029-b8f1-40b354e9c474&lang=ru_RU" type="text/javascript"></script>
</head>
  <body style="background-color:#0f5e9c;">
    <header>
        <div class="brand-header">
            <a class="navbar-brand" href="/index.php">
              <img src="4070419.png" alt="Icon" class="brand-icon">
            </a>
            <p1 class="company-name"style="font-size: 1.5em;color: #0f3e8c;" >ЗАО Производственная фирма «Дора» </p1>
            <p2 class="tagline">Новейшие технологии</p2>
            <p3 class="contact-info1">Телефон: +7 (XXX) XXX-XX-XX</p3>
            <p4 class="contact-info2">Email: info@dora.com</p4>
        </div>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
          <div class="container-xxl">
            <button
              class="navbar-toggler"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link" href="index.php">Главная</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="company.php">О компании</a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="about.php">О нас</a></li>
                    <li><a class="dropdown-item" href="contact.php">Контакты</a></li>
                    <li><a class="dropdown-item" href="vacance.php">Вакансии</a></li>
                    <li><a class="dropdown-item" href="postavka.php">Поставка</a></li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="map.php">Карта сайта</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="news.php">Новости</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="catalog.php">Каталог насосов</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contact.php">Контакты</a>
                </li>
              </ul>
              <div class="search-container">
                <button class="search-button" type="button" id="search-button">
                  <img src="лупа.png" alt="Icon" class="brand-search">
                </button>
                <form action="search.php" method="post" >
                  <input type="text" class="form-control" id="search-input" placeholder="Поиск..." name="query">
                </form>
              </div>
            </div>
          </div>
        </nav>
    </header>
    <header class="sticky-header">
      <nav class="navbar navbar-expand-lg bg-body-tertiary">
          <div class="container-xxl">
            <button
              class="navbar-toggler"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <a class="navbar-brand" href="/index.php">
                  <img src="4070419.png" alt="Icon" class="brand-icon1">
                </a>
                <li class="nav-item">
                  <a class="nav-link" href="index.php">Главная</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="company.php">О компании</a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="about.php">О нас</a></li>
                    <li><a class="dropdown-item" href="contact.php">Контакты</a></li>
                    <li><a class="dropdown-item" href="vacance.php">Вакансии</a></li>
                    <li><a class="dropdown-item" href="postavka.php">Поставка</a></li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="map.php">Карта сайта</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="news.php">Новости</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="catalog.php">Каталог насосов</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contact.php">Контакты</a>
                </li>
              </ul>
              <div class="search-container">
                <button class="search-button" type="button" id="search-button">
                  <img src="лупа.png" alt="Icon" class="brand-search">
                </button>
                <form action="search.php" method="post" >
                  <input type="text" class="form-control" id="search-input" placeholder="Поиск..." name="query">
                </form>
              </div>
            </div>
          </div>
        </nav>
    </header>
    <section>
    <?php if (isset($results)) : ?>
    <h3 style="font-size: 2.4em;">Результаты поиска:</h3>
    <?php if (count($results) > 0) : ?>
        <div class="search-results">
            <?php foreach ($results as $page => $result) : ?>
                <div class="result">
                    <div class="result-content">
                        <h4 style="font-size: 1.2em;"><a href="<?= $page ?>"><?= $result['title'] ?></a></h4>
                        <p style="font-size: 0.9em;">Дата: <?= $result['date'] ?> / Автор: <?= $result['author'] ?></p>
                        <p><?= $result['content'] ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else : ?>
        <div class="no-results">
            <p style="font-size: 1em;">Извините, но по вашему запросу ничего не найдено. Пожалуйста, попробуйте ввести другие ключевые слова.</p>
            <form method="post" action="">
                <input type="text" style="width: 1000px;" name="query" placeholder="Введите поисковый запрос" value="<?= isset($query) ? htmlspecialchars($query) : '' ?>" />
            </form>
        </div>
    <?php endif; ?>
<?php endif; ?>
        
    </section>
    <footer style="background-color:black;">
      <p class="copyright">&copy; 2023-2024 by Arturchik and Ivan</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        const searchButton = document.getElementById('search-button');
        const searchInput = document.getElementById('search-input');

        searchButton.addEventListener('click', function() {
          if (searchInput.classList.contains('show')) {
            searchInput.classList.remove('show');
            searchInput.value = '';
          } else {
            searchInput.classList.add('show');
            searchInput.focus();
          }
        });

        document.addEventListener('click', function(event) {
          if (!searchButton.contains(event.target) && !searchInput.contains(event.target)) {
            searchInput.classList.remove('show');
            searchInput.value = '';
          }
        });
      });
      document.addEventListener('DOMContentLoaded', function() {
    const stickyHeader = document.querySelector('.sticky-header');
    const originalHeader = document.querySelector('header');

    window.addEventListener('scroll', function() {
        if (window.scrollY > originalHeader.offsetHeight) {
            stickyHeader.style.display = 'block';
        } else {
            stickyHeader.style.display = 'none';
        }
    });

    // Обработчики для кнопки поиска
    const searchButtonSticky = document.getElementById('search-button-sticky');
    const searchInputSticky = document.getElementById('search-input-sticky');

    searchButtonSticky.addEventListener('click', function() {
        if (searchInputSticky.classList.contains('show')) {
            searchInputSticky.classList.remove('show');
            searchInputSticky.value = '';
        } else {
            searchInputSticky.classList.add('show');
            searchInputSticky.focus();
        }
    });

    document.addEventListener('click', function(event) {
        if (!searchButtonSticky.contains(event.target) && !searchInputSticky.contains(event.target)) {
            searchInputSticky.classList.remove('show');
            searchInputSticky.value = '';
        }
    });
});

    </script>
  </body>
</html>
