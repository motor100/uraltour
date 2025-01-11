@section('title', $category->title)

@extends('layouts.main')

@section('content')

<div class="search-section">
  <div class="container">
    @include('search')
  </div>
</div>

<div class="breadcrumbs">
  <div class="container">
    <div class="parent">
      <img src="/img/breadcrumbs-home.png" class="home-icon" alt="">
      <a href="{{ route('home') }}">Главная</a>
    </div>
    <div class="separator">/</div>
    <div class="active">{{ $category->title }}</div>
  </div>
</div>

<div class="category-page">
  <div class="container">
    <div class="page-title">{{ $category->title }}</div>

    <div class="sort">
      <select name="" id="">
        <option value="">По популярности</option>
        <option value="">По цене</option>
      </select>
    </div>

    <div class="content-wrapper">
      <div class="content-grid-container">
        <div class="filter">
          <div class="checkbox-group">
            <div class="checkbox-group__title">Вид тура</div>
              <label class="checkbox-label">
                <span class="custom-checkbox-text">Вид 1</span>
                <input type="checkbox" name="checkbox" class="checkbox">
                <span class="custom-checkbox"></span>
              </label>
              <label class="checkbox-label">
                <span class="custom-checkbox-text">Вид 2</span>
                <input type="checkbox" name="checkbox" class="checkbox">
                <span class="custom-checkbox"></span>
              </label>
              <label class="checkbox-label">
                <span class="custom-checkbox-text">Вид 3</span>
                <input type="checkbox" name="checkbox" class="checkbox">
                <span class="custom-checkbox"></span>
              </label>
              <label class="checkbox-label">
                <span class="custom-checkbox-text">Вид 4</span>
                <input type="checkbox" name="checkbox" class="checkbox">
                <span class="custom-checkbox"></span>
              </label>
          </div>
          <div class="checkbox-group">
            <div class="checkbox-group__title">Город</div>
            <label class="checkbox-label">
              <span class="custom-checkbox-text">Москва</span>
              <input type="checkbox" name="checkbox" class="checkbox">
              <span class="custom-checkbox"></span>
            </label>
            <label class="checkbox-label">
              <span class="custom-checkbox-text">Екатеринбург</span>
              <input type="checkbox" name="checkbox" class="checkbox">
              <span class="custom-checkbox"></span>
            </label>
            <label class="checkbox-label">
              <span class="custom-checkbox-text">Санкт-Петербург</span>
              <input type="checkbox" name="checkbox" class="checkbox">
              <span class="custom-checkbox"></span>
            </label>
            <label class="checkbox-label">
              <span class="custom-checkbox-text">Казань</span>
              <input type="checkbox" name="checkbox" class="checkbox">
              <span class="custom-checkbox"></span>
            </label>
          </div>
        </div>
        <div class="content">

          <div class="big-product">
            <div class="big-product__image">
              <img src="/img/temp-big-product.jpg" alt="">
            </div>
            <div class="big-product__content">
              <div class="grid-container">
                <div class="left">
                  <div class="big-product__title">15.12 - гора Малый УВАЛ (1007м.) Новинка!</div>
                  <div class="big-product__description">Вершина Малый УВАЛ находится в южной части хребта Сука, но представляет отдельную большую гору, разделенную Макаровым долом...</div>
                  <div class="big-product__rating">
                    <img src="/img/temp-rating.png" alt="">
                  </div>
                </div>
                <div class="right">
                  <div class="content">
                    <div class="big-product__price">
                      <span class="value">3750</span>
                      <span class="currency">Р</span>
                    </div>
                    <div class="date">
                      <div class="date-text">Дата тура</div>
                      <div class="date-value">3.01.2025</div>
                    </div>
                  </div>
                  <a href="/catalog/nacionalnye-marshruty/perferendis-aliquam-quia-vero-saepe-qui-qui-cumque-necessitatibus-nisi" class="big-product__btn primary-btn">Смотреть тур</a>
                </div>
              </div>
            </div>
          </div>

          @if(count($products) > 0)
          <div class="products">
            @foreach($products as $product)
              @include('product-card')
            @endforeach
          </div>
          @else
            <div class="category-is-empty ccf-is-empty">
              <div class="category-is-empty-text ccf-is-empty-text">В этой категории нет товаров</div>
              <button class="primary-btn btn-305 ccf-is-empty-btn" onclick="history.back();">ВЕРНУТЬСЯ НАЗАД</button>
            </div>
          @endif

          <div class="pagination-links">
            {{ $products->onEachSide(1)->links() }}
          </div>

          @if(count($regular_products) > 0)
            <div class="regular-products">
              <div class="section-title-small">Регулярные туры</div>
              <div class="products">
                @foreach($regular_products as $product)
                  @include('product-card')
                @endforeach
              </div>
            </div>
          @endif

        </div>
      </div>

      @include('booking-section')

      <div class="faq-section section">
        <div class="container">
          <div class="grid-container">
            <div class="title">
              <div class="section-title">Отвечаем<br>на вопросы</div>
            </div>      
            <div class="questions">
              <div class="questions-item active">
                <div class="questions-item__title">Вопрос 1</div>
                <div class="questions-item__content">Рыбатекст используется дизайнерами, проектировщиками и фронтендерами, когда нужно быстро заполнить макеты или прототипы содержимым. Это тестовый контент, который не должен нести никакого смысла, лишь показать наличие самого текста или продемонстрировать типографику в деле.</div>
                <div class="circle">
                  <div class="arrow"></div>
                </div>
              </div>
              <div class="questions-item">
                <div class="questions-item__title">Вопрос 2</div>
                <div class="questions-item__content">Являясь всего лишь частью общей картины, интерактивные прототипы, инициированные исключительно синтетически, объективно рассмотрены соответствующими инстанциями. Как принято считать, ключевые особенности структуры проекта, вне зависимости от их уровня, должны быть смешаны с не уникальными данными до степени совершенной неузнаваемости, из-за чего возрастает их статус бесполезности. С другой стороны, социально-экономическое развитие является качественно новой ступенью своевременного выполнения сверхзадачи.</div>
                <div class="circle">
                  <div class="arrow"></div>
                </div>
              </div>
              <div class="questions-item">
                <div class="questions-item__title">Вопрос 3</div>
                <div class="questions-item__content">Прародителем текста-рыбы является известный "Lorem Ipsum" — латинский текст, ноги которого растут аж из 45 года до нашей эры. Сервисов по созданию случайного текста на основе Lorem Ipsum великое множество, однако все они имеют один существенный недостаток.</div>
                <div class="circle">
                  <div class="arrow"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="description-section">
        <div class="container">
          <div class="grid-container">
            <div class="description-item">
              <div class="section-title">{{ $category->title }}</div>
              <p class="description-text">Мы же, фактически, предлагаем Lorem Ipsum на русском языке — вы можете использовать полученный здесь контент абсолютно бесплатно и в любых целях, не запрещённых законодательством.</p>
              <p class="description-text">Другое название — "универсальный генератор речей". По легенде, всякие депутаты и руководители в СССР использовали в своих выступлениях заготовленный набор совмещающихся между собой словосочетаний, что позволяло нести псевдоумную ахинею часами.</p>
            </div>
            <div class="description-item">
              <div class="description-gallery">
                <div class="description-gallery-item">
                  <img src="/img/temp-description-gallery1.jpg" alt="">
                </div>
                <div class="description-gallery-item">
                  <img src="/img/temp-description-gallery2.jpg" alt="">
                </div>
              </div>
            </div>
            <div class="description-item">
              <div class="description-gallery">
                <div class="description-gallery-item">
                  <img src="/img/temp-description-gallery3.jpg" alt="">
                </div>
                <div class="description-gallery-item">
                  <img src="/img/temp-description-gallery4.jpg" alt="">
                </div>
              </div>
            </div>
            <div class="description-item">
              <div class="description-subtitle">Еще информация</div>
              <p class="description-text">Генерация рыбатекста происходит довольно просто: есть несколько фиксированных наборов фраз и словочетаний, из которых в опредёленном порядке формируются предложения. Предложения складываются в абзацы — и вы наслаждетесь очередным бредошедевром.</p>
            </div>
          </div>
        </div>
      </div>

      @include('callback-section')

    </div>
    
  </div>

</div>
@endsection