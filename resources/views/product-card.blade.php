<div class="products-item">
  <div class="products-item__image">
    <img src="{{ Storage::url($product->image) }}" alt="">
  </div>
  <div class="products-item__content">
    <a href="/catalog/{{ $category->slug }}/{{ $product->slug }}" class="products-item__title">{{ $product->title }}</a>
    <div class="product-item__description">БАДЕН - БАДЕН «Лесная сказка»! Купание 3 часа (+15 мин)</div>
    <div class="products-grid-container">
      <div class="price-wrapper">
        <div class="products-item__price">
          <span class="value">3750</span>
          <span class="currency"> Р</span>
        </div>
        <div class="big-product__rating">
          <img src="/img/temp-rating.png" alt="">
        </div>
      </div>
      <a href="/catalog/{{ $category->slug }}/{{ $product->slug }}" class="view-more-btn">Смотреть тур</a>
    </div>
  </div>
  
</div>