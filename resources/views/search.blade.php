<div class="search">
  <form class="search-form" action="/poisk" method="get">
    <div class="flex-container">
      <div class="search-input-wrapper">
        <input type="text" name="search_query" class="search-input" autocomplete="off" placeholder="Найти тур">
        <div class="search-close"></div>
        <div class="search-dropdown">
          <ul class="search-list js-search-result"></ul>
          <a href="#" class="search-see-all">Показать все результаты</a>
        </div>
        <img src="/img/search-lens.png" class="search-lens" alt="">
      </div>
      <button class="search-submit-btn hidden-mobile">
        <img src="/img/search-icon.png" class="search-submit-btn__image" alt="">
        <span class="search-submit-btn__text">Найти тур</span>
      </button>
    </div>
  </form>
</div>