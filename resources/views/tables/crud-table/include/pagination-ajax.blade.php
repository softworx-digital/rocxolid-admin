@if ($paginator->hasPages())
<ul class="pagination margin-top-no">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
        <li class="disabled"><span><i class="fa fa-angle-double-left"></i></span></li>
        <li class="disabled"><span><i class="fa fa-angle-left"></i></span></li>
    @else
        <li><a data-ajax-url="{{ $paginator->url(1) }}" rel="prev"><i class="fa fa-angle-double-left"></i></a></li>
        <li><a data-ajax-url="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="fa fa-angle-left"></i></a></li>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
            <li class="disabled"><span>{{ $element }}</span></li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li class="active"><span>{{ $page }}</span></li>
                @else
                    <li><a data-ajax-url="{{ $url }}">{{ $page }}</a></li>
                @endif
            @endforeach
        @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <li><a data-ajax-url="{{ $paginator->nextPageUrl() }}" rel="next"><i class="fa fa-angle-right"></i></a></li>
        <li><a data-ajax-url="{{ $paginator->url($paginator->lastPage()) }}" rel="next"><i class="fa fa-angle-double-right"></i></a></li>
    @else
        <li class="disabled"><span><i class="fa fa-angle-right"></i></span></li>
        <li class="disabled"><span><i class="fa fa-angle-double-right"></i></span></li>
    @endif
</ul>
@endif