@extends('dashboard.layout')

@section('title', 'Архив товаров')

@section('dashboardcontent')

<div class="dashboard-content">

  <div class="item">{{ $product->title }}</div>
  <div class="item">{{ $product->start_date->format('d.m.Y') }}</div>
  <div class="item">{{ number_format($product->price, 0, '', ' ') }} Р</div>
  <div class="item">{!! nl2br($product->description->text_html) !!}</div>
  @if($product->description->recommendation)
    <div class="item">{!! nl2br($product->description->recommendation->text_html) !!}</div>
  @endif
  @if($product->description->paymen)
    <div class="item">{!! nl2br($product->description->payment->text_html) !!}</div>
  @endif
  <div class="item">
    @if($product->image)
      <div class="image-preview">
        <img src="{{ Storage::url($product->image) }}" alt="">
      </div>
    @endif
  </div>
  <div class="item">
    <div class="image-preview gallery-image-preview">
      @if($product->gallery->count() > 0)
        @foreach($product->gallery as $gl)
          <img src="{{ Storage::url($gl->image) }}" alt="">
        @endforeach
      @endif
    </div>
  </div>
  <div class="item">
    <div class="image-preview photo-image-preview">
      @if($product->photos->count() > 0)
        @foreach($product->photos as $gl)
          <img src="{{ Storage::url($gl->image) }}" alt="">
        @endforeach
      @endif
    </div>
  </div>

  <form action="{{ route('dashboard.products-archive-destroy', $product->id) }}" class="form" method="get">
    <input type="submit" class="product-delete" value="Удалить товар">
  </form>

</div>

<script>
  const menuItem = 4;
</script>

@endsection