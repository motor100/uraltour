@if($paginator->hasPages())
<ul class="pager">
    <li class="pager-item pager-item-nav pager-item-previous">
        <a href="{{ $paginator->previousPageUrl() ? $paginator->previousPageUrl() : '#' }}" class="pager-item-link" rel="prev">
            <span class="arrow-left"></span>
        </a>
    </li>
    @foreach($elements as $element)
        @if(is_string($element))
            <li class="pager-item disabled"><span>{{ $element }}</span></li>
        @endif
        @if(is_array($element))
            @foreach($element as $page => $url)
                @if($page == $paginator->currentPage())
                    <li class="pager-item active">
                        <span class="pager-item-span">{{ $page }}</span>
                    </li>
                @else
                    <li class="pager-item">
                        <a href="{{ $url }}" class="pager-item-link">{{ $page }}</a>
                    </li>
                @endif
            @endforeach
        @endif
    @endforeach
    <li class="pager-item pager-item-nav pager-item-next">
        <a href="{{ $paginator->nextPageUrl() ? $paginator->nextPageUrl() : '#' }}" class="pager-item-link" rel="next">
            <span class="arrow-right"></span>
        </a>
    </li>
</ul>
@endif 