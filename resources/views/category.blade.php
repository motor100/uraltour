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
  </div>

  @if(count($products) > 0 || count($attributes) > 0)
    <div class="{{ count($regular_products) > 0 ? 'products-section' : 'products-section section' }}">
      <div class="container">

        <div id="filter-menu-btn" class="filter-menu-btn hidden-desktop">Фильтры</div>

        <div class="sort">
          <span class="sort-text">Сортировка</span>
          <a href="{{ request()->fullUrlWithQuery(['sort' => 'desc']) }}" class="expensive-first first {{ request()->sort == 'desc' ? 'active' : '' }}" data-sort="desc">сначала дорогие</a>
          <a href="{{ request()->fullUrlWithQuery(['sort' => 'asc']) }}" class="cheap-first first {{ request()->sort == 'asc' ? 'active' : '' }}" data-sort="asc">сначала дешевые</a>
        </div>

        <div class="grid-container">
          <form class="filter" action="{{ url()->current() }}" method="get">
            @foreach($attributes as $attribute)
              <div class="checkbox-group">
                <div class="checkbox-group__title">{{ $attribute['title'] }}</div>
                @foreach($attribute['values'] as $value)
                  <label class="checkbox-label">
                    <span class="custom-checkbox-text">{{ $value->title }}</span>
                    <input type="checkbox" name="{{ $attribute['slug'] }}[]" class="checkbox" value="{{ $value->slug }}" @checked(is_array(request()->input($attribute['slug'])) && in_array($value->slug, request()->input($attribute['slug'])))>
                    <span class="custom-checkbox"></span>
                  </label>
                @endforeach
              </div>
            @endforeach

            <button type="submit" class="submit-btn primary-btn">Применить</button>
            <a href="{{ url()->current() }}" class="secondary-btn clear-btn">
              <svg class="clear-btn__svg" width="23" height="23" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_285_758)">
                <path d="M15 9L9 15" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M9 9L15 15" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z" stroke-linecap="round" stroke-linejoin="round"/>
                </g>
                <defs>
                <clipPath id="clip0_285_758">
                <rect width="24" height="24" fill="white"/>
                </clipPath>
                </defs>
              </svg>
              <span class="clear-btn__text">Очистить</span>
            </a>
          </form>

          <div class="content">

            <!-- 
            <div class="big-product products-item">
              <div class="big-product__image">
                <img src="/img/temp-big-product.jpg" alt="">
              </div>
              <div class="big-product__content">
                <div class="grid-container">
                  <div class="left">
                    <a href="#" class="big-product__title products-item__title">15.12 - гора Малый УВАЛ (1007м.) Новинка!</a>
                    <div class="big-product__excerpt products-item__excerpt">Вершина Малый УВАЛ находится в южной части хребта Сука, но представляет отдельную большую гору, разделенную Макаровым долом...</div>
                    <div class="big-product__rating">
                    <div class="stars">
                      <div class="star active">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path class="star-path" d="M6 0L7.77994 4.05749L12 4.58359L8.88 7.61736L9.7082 12L6 9.81749L2.2918 12L3.12 7.61736L0 4.58359L4.22006 4.05749L6 0Z"/>
                        </svg>
                      </div>
                      <div class="star active">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path class="star-path" d="M6 0L7.77994 4.05749L12 4.58359L8.88 7.61736L9.7082 12L6 9.81749L2.2918 12L3.12 7.61736L0 4.58359L4.22006 4.05749L6 0Z"/>
                        </svg>
                      </div>
                      <div class="star active">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path class="star-path" d="M6 0L7.77994 4.05749L12 4.58359L8.88 7.61736L9.7082 12L6 9.81749L2.2918 12L3.12 7.61736L0 4.58359L4.22006 4.05749L6 0Z"/>
                        </svg>
                      </div>
                      <div class="star active">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path class="star-path" d="M6 0L7.77994 4.05749L12 4.58359L8.88 7.61736L9.7082 12L6 9.81749L2.2918 12L3.12 7.61736L0 4.58359L4.22006 4.05749L6 0Z"/>
                        </svg>
                      </div>
                      <div class="star">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path class="star-path" d="M6 0L7.77994 4.05749L12 4.58359L8.88 7.61736L9.7082 12L6 9.81749L2.2918 12L3.12 7.61736L0 4.58359L4.22006 4.05749L6 0Z"/>
                        </svg>
                      </div>
                    </div>
                    </div>
                  </div>
                  <div class="right">
                    <div class="content">
                      <div class="big-product__price products-item__price">
                        <span class="value">{{ number_format(3750, 0, '', ' ') }}</span>
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
             -->
            @if (count($products) > 0)
              <div class="products">
                @foreach($products as $product)
                  @include('product-card')
                @endforeach
              </div>

              <div class="pagination-links">
                {{ $products->links() }}
              </div>
            @else
              <p>Не найдено</p>
            @endif

          </div>
        </div>
        
      </div>
    </div>
  @endif

  @if(count($regular_products) > 0)
    <div class="regular-products-section products-section section">
      <div class="container">
        <div class="grid-container">
          <div class="filter"></div>
          <div class="content">
            <div class="section-title-small">Регулярные туры</div>
            <div class="products">
              @foreach($regular_products as $product)
                @include('product-card')
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  @endif

  @if(count($products) == 0 && count($regular_products) == 0)
    <div class="category-is-empty-section section">
      <div class="container">
        <div class="category-is-empty-text">В этой категории нет товаров</div>
        <a href="/catalog" class="category-is-empty-btn primary-btn">В каталог</a>
      </div>
    </div>
  @endif

  @include('booking-section')

  @switch($category->id)
    @case(1)
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
            <div class="description-item start4">
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
      @break

    @case(2)
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
            <div class="description-item start4">
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
      @break

    @case(3)
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
            <div class="description-item start4">
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
      @break

    @case(4)
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
            <div class="description-item start4">
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
      @break

    @case(5)
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
            <div class="description-item start4">
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
      @break

    @case(6)
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
            <div class="description-item start4">
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
      @break

    @case(7)
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
            <div class="description-item start4">
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
      @break

    @case(8)
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
            <div class="description-item start4">
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
      @break

  @endswitch

  @include('callback-section')

  <div id="to-top" class="to-top hidden-mobile">
    <div class="circle">
      <img src="/img/arrow-up.svg" alt="">
    </div>
  </div>

</div>

@endsection