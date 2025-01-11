<div class="testimonials-item">
  <div class="testimonials-item__title">{{ $testimonial->name }}</div>
  <div class="flex-container">
    <div class="testimonials-item__rating">
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
    <div class="testimonials-item__date">{{ $testimonial->created_at->format('d.m.Y') }}</div>
  </div>
  <div class="testimonials-item__text">{{ $testimonial->text }}</div>
  @if($testimonial->gallery)
    <div class="testimonials-item__gallery">
      @foreach($testimonial->gallery as $gallery)
        @if($loop->index < 3)
          <div class="testimonials-item__image">
            <img src="{{ Storage::url($gallery->image) }}" alt="">
          </div>
        @endif
      @endforeach
    </div>
  @endif
</div>