<div class="products-item">
  <div class="products-item__image">
    <a href="/catalog/{{ $product->category->slug }}/{{ $product->slug }}" class="products-item__link full-link">
      <img src="{{ Storage::url($product->image) }}" alt="">
    </a>
  </div>
  <div class="products-item__content">
    <a href="/catalog/{{ $product->category->slug }}/{{ $product->slug }}" class="products-item__title">{{ $product->title }}</a>
    <div class="products-item__excerpt">{{ $product->excerpt }}</div>
      <div class="products-item__price">
        <span class="value">{{ number_format($product->price, 0, '', ' ') }}</span>
        <span class="currency">Р</span>
      </div>
      <div class="product-item__rating">
        <div class="stars">
          <div class="{{ $product->rating >= 1 ? 'star active' : 'star' }}">
            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path class="star-path" d="M6 0L7.77994 4.05749L12 4.58359L8.88 7.61736L9.7082 12L6 9.81749L2.2918 12L3.12 7.61736L0 4.58359L4.22006 4.05749L6 0Z"/>
            </svg>
          </div>
          <div class="{{ $product->rating >= 2 ? 'star active' : 'star' }}">
            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path class="star-path" d="M6 0L7.77994 4.05749L12 4.58359L8.88 7.61736L9.7082 12L6 9.81749L2.2918 12L3.12 7.61736L0 4.58359L4.22006 4.05749L6 0Z"/>
            </svg>
          </div>
          <div class="{{ $product->rating >= 3 ? 'star active' : 'star' }}">
            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path class="star-path" d="M6 0L7.77994 4.05749L12 4.58359L8.88 7.61736L9.7082 12L6 9.81749L2.2918 12L3.12 7.61736L0 4.58359L4.22006 4.05749L6 0Z"/>
            </svg>
          </div>
          <div class="{{ $product->rating >= 4 ? 'star active' : 'star' }}">
            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path class="star-path" d="M6 0L7.77994 4.05749L12 4.58359L8.88 7.61736L9.7082 12L6 9.81749L2.2918 12L3.12 7.61736L0 4.58359L4.22006 4.05749L6 0Z"/>
            </svg>
          </div>
          <div class="{{ $product->rating == 5 ? 'star active' : 'star' }}">
            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path class="star-path" d="M6 0L7.77994 4.05749L12 4.58359L8.88 7.61736L9.7082 12L6 9.81749L2.2918 12L3.12 7.61736L0 4.58359L4.22006 4.05749L6 0Z"/>
            </svg>
          </div>
        </div>
      </div>
    <a href="/catalog/{{ $product->category->slug }}/{{ $product->slug }}" class="product-btn primary-btn">Смотреть тур</a>
  </div>
  
</div>