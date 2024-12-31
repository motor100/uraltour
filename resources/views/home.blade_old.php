<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="shortcut icon" href="{{ asset('/img/favicon.svg') }}" type="image/x-icon">
    @vite(['resources/sass/main.scss'])
</head>
<body>

  <header class="header">
    <div class="container">
      <div class="grid-container">
        <div class="logo">
          <a href="/">
            <img src="/img/logo.png" alt="">
          </a>
        </div>
        <ul class="top-menu">
          <li class="menu-item">
            <a href="/">Главная</a>
          </li>
          <li class="menu-item">
            <a href="/tours">Туры</a>
          </li>
          <li class="menu-item">
            <a href="/testimonials">Отзывы</a>
          </li>
          <li class="menu-item">
            <a href="/contacts">Контакты</a>
          </li>
        </ul>
        <div class="phone">+7 955 212 11 22</div>
      </div>
    </div>
  </header>

  <div class="content-wrapper">
    <div class="container">
      
      <p>Товары</p>
      <div class="products">
        <div class="products-item"></div>
        <div class="products-item"></div>
        <div class="products-item"></div>
        <div class="products-item"></div>
      </div>

      <p>Категории</p>
      <div class="categories">
        <div class="categories-item">
          <div class="categories-item__image">
            <img src="{{ Storage::url('uploads/categories/category1.jpg') }}" alt="">
          </div>
          <a href="/catalog/nacionalnye-marshruty">Национальные маршруты</a>
        </div>
        <div class="categories-item">
          <div class="categories-item__image">
            <img src="{{ Storage::url('uploads/categories/category2.jpg') }}" alt="">
          </div>
          <a href="/catalog/poezdki-po-rossii">Поездки по России</a>
        </div>
        <div class="categories-item">
          <div class="categories-item__image">
            <img src="{{ Storage::url('uploads/categories/category3.jpg') }}" alt="">
          </div>
          <a href="/catalog/tury-vyhodnogo-dnya">Туры выходного дня</a>
        </div>
        <div class="categories-item">
          <div class="categories-item__image">
            <img src="{{ Storage::url('uploads/categories/category1.jpg') }}" alt="">
          </div>
          <a href="/catalog/nacionalnye-marshruty">Национальные маршруты</a>
        </div>
        <div class="categories-item">
          <div class="categories-item__image">
            <img src="{{ Storage::url('uploads/categories/category2.jpg') }}" alt="">
          </div>
          <a href="/catalog/poezdki-po-rossii">Поездки по России</a>
        </div>
        <div class="categories-item">
          <div class="categories-item__image">
            <img src="{{ Storage::url('uploads/categories/category3.jpg') }}" alt="">
          </div>
          <a href="/catalog/tury-vyhodnogo-dnya">Туры выходного дня</a>
        </div>
        <div class="categories-item">
          <div class="categories-item__image">
            <img src="{{ Storage::url('uploads/categories/category2.jpg') }}" alt="">
          </div>
          <a href="/catalog/poezdki-po-rossii">Поездки по России</a>
        </div>
        <div class="categories-item">
          <div class="categories-item__image">
            <img src="{{ Storage::url('uploads/categories/category3.jpg') }}" alt="">
          </div>
          <a href="/catalog/tury-vyhodnogo-dnya">Туры выходного дня</a>
        </div>
      </div>
    </div>
  </div>

  <footer class="footer">
    <div class="container">
      <div class="grid-container">
        <div class="logo">
          <img src="/img/logo.png" alt="">
        </div>
        <div class="club">
          <div class="bottom-menu">
            <div class="menu-item">Контакты</div>
            <div class="menu-item">Документы</div>
            <div class="menu-item">Отзывы</div>
            <div class="menu-item">Оставить отзыв</div>
          </div>
        </div>
        <div class="booking">
          <ul class="bottom-menu">
            <li class="menu-item">Забронировать онлайн</li>
            <li class="menu-item">Спецпредложения</li>
            <li class="menu-item">Способы оплаты</li>
            <li class="menu-item">Забронировать онлайн</li>
          </ul>
        </div>
        <div class="help">
          <ul class="bottom-menu">
            <li class="menu-item">Политика конфиденциальности</li>
            <li class="menu-item">Согласие на обработку персональных данных</li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  @vite(['resources/js/main.js'])
</body>
</html>