@extends('dashboard.layout')

@section('title', 'Отзывы')

@section('dashboardcontent')

<div class="dashboard-content">

  <div class="testimonials-wrapper">
    @if(count($testimonials) > 0)
      @foreach($testimonials as $testimonial)
        <div class="item">
          <form class="form" action="{{ route('dashboard.testimonials-update', $testimonial->id) }}" method="post">
            <div class="form-group mb-3">
              <label for="inputName" class="form-check-label">Имя</label>
              <input type="text" name="name" id="inputName" class="form-control" value="{{ $testimonial->name }}" required>
            </div>
            <div class="form-group mb-3">
              <label for="inputText" class="form-check-label">Отзыв</label>
              <textarea name="text" id="inputText" class="form-control" required>{{ $testimonial->text }}</textarea>
            </div>
            @if($testimonial->product)
              <div class="form-group mb-3">
                <div class="form-check-label">Товар</div>
                <a href="{{ route('catalog') }}/{{ $testimonial->product->category->slug }}/{{ $testimonial->product->slug }}" class="product-link" target="_blank">{{ $testimonial->product->title }}</a>
              </div>
            @endif
            <div class="form-group mb-3">
              <div class="stars">
                <div class="{{ $testimonial->rating > 1 ? 'star active' : 'star' }}">
                  <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path class="star-path" d="M6 0L7.77994 4.05749L12 4.58359L8.88 7.61736L9.7082 12L6 9.81749L2.2918 12L3.12 7.61736L0 4.58359L4.22006 4.05749L6 0Z"/>
                  </svg>
                </div>
                <div class="{{ $testimonial->rating > 2 ? 'star active' : 'star' }}">
                  <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path class="star-path" d="M6 0L7.77994 4.05749L12 4.58359L8.88 7.61736L9.7082 12L6 9.81749L2.2918 12L3.12 7.61736L0 4.58359L4.22006 4.05749L6 0Z"/>
                  </svg>
                </div>
                <div class="{{ $testimonial->rating > 3 ? 'star active' : 'star' }}">
                  <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path class="star-path" d="M6 0L7.77994 4.05749L12 4.58359L8.88 7.61736L9.7082 12L6 9.81749L2.2918 12L3.12 7.61736L0 4.58359L4.22006 4.05749L6 0Z"/>
                  </svg>
                </div>
                <div class="{{ $testimonial->rating > 4 ? 'star active' : 'star' }}">
                  <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path class="star-path" d="M6 0L7.77994 4.05749L12 4.58359L8.88 7.61736L9.7082 12L6 9.81749L2.2918 12L3.12 7.61736L0 4.58359L4.22006 4.05749L6 0Z"/>
                  </svg>
                </div>
                <div class="{{ $testimonial->rating == 5 ? 'star active' : 'star' }}">
                  <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path class="star-path" d="M6 0L7.77994 4.05749L12 4.58359L8.88 7.61736L9.7082 12L6 9.81749L2.2918 12L3.12 7.61736L0 4.58359L4.22006 4.05749L6 0Z"/>
                  </svg>
                </div>
              </div>
            </div>
            @if(count($testimonial->gallery) > 0)
              <div class="form-group mb-3">
                <div class="form-check-label">Галерея</div>
                <div class="image-preview">
                  @foreach($testimonial->gallery as $item)
                    <img src="{{ Storage::url($item->image) }}" alt="">
                  @endforeach
                </div>
              </div>
            @endif
            
            @csrf
            <button type="submit" class="publicate-btn btn btn-success">Опубликовать</button>
          </form>
          <form class="form rm-testimonial-form" action="{{ route('dashboard.testimonials-destroy', $testimonial->id) }}" method="get">
            <button type="submit" class="rm-btn btn btn-light">Удалить</button>
          </form>
        </div>
      @endforeach
    @endif
  </div>

  <div class="archive">
    @if(isset($publicated_reviews) && count($publicated_reviews) > 0)
      <h3 class="h4 mb-4">Архив отзывов</h3>
      @foreach($publicated_reviews as $p_rws)
        <div class="item d-flex justify-content-between mb-3">
          <div class="title-wrapper">
            <span class="title">{{ $p_rws->name }}</span>
            <span class="date">{{ $p_rws->publicated_at }}</span>
            @if($p_rws->product > 0)
              <a href="/product/{{ $p_rws->slug }}" class="product" target="_blank">Товар</a>
            @endif
            <span class="excerpt">{{ $p_rws->short_text }}</span>
          </div>
          <div class="btns">
            <a class="list-btn edit-btn" href="/dashboard/reviews/edit/{{$p_rws->id}}">
              <i class="far fas fa-pen"></i>
            </a>
            <a class="list-btn delete-btn" href="/dashboard/reviews/del/{{$p_rws->id}}">
              <i class="far fa-times-circle"></i>
            </a>
          </div>
        </div>
      @endforeach
    @endif
  </div>

</div>

<script>
  const menuItem = 1;
</script>
@endsection