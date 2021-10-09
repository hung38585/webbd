@if ($paginator->hasPages())
<nav aria-label="Page navigation example">
    <ul class="pagination ml-2" style="margin-left: 15px;">
        @if ($paginator->onFirstPage())
        <li class="page-item disabled">
            <a class="" href="#" tabindex="-1" style="color: #5c5c5c; background: #e4dada;">{{ __('wedding.button_prev') }}</a>
        </li>
        @else
        <li class="page-item"><a class="" href="{{ $paginator->previousPageUrl() }}" style="color: #5c5c5c;">{{ __('wedding.button_prev') }}</a></li>
        @endif

        @foreach ($elements as $element)
        @if (is_string($element))
        <li class="page-item disabled">{{ $element }}</li>
        @endif

        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <li class="page-item active">
            <a class="" style="background: #5c5c5c; border-color: #5c5c5c;">{{ $page }}</a>
        </li>
        @else
        <li class="page-item">
            <a class="" href="{{ $url }}" style="color: #5c5c5c;">{{ $page }}</a>
        </li>
        @endif
        @endforeach
        @endif
        @endforeach

        @if ($paginator->hasMorePages())
        <li class="page-item">
            <a class="" href="{{ $paginator->nextPageUrl() }}" rel="next" style="color: #5c5c5c;">{{ __('wedding.button_next') }}</a>
        </li>
        @else
        <li class="page-item disabled">
            <a class="" href="#" style="color: #5c5c5c; background: #e4dada;">{{ __('wedding.button_next') }}</a>
        </li>
        @endif
    </ul>
</nav>
@endif