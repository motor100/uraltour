<div class="products-item">
  <div class="products-item__image">
    <img src="{{ Storage::url($product->image) }}" alt="">
  </div>
  <a href="/catalog/{{ $category->slug }}/{{ $product->slug }}" class="products-item__title">{{ $product->title }}</a>
</div>