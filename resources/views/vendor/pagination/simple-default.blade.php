@if ($paginator->hasPages())
    <nav class="pagination is-centered">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a class="pagination-previous" disabled><span>@lang('pagination.previous')</span></a>
        @else
            <a class="pagination-previous" href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a class="pagination-next" href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a>
        @else
            <a class="pagination-next" disabled><span>@lang('pagination.next')</span></a>
        @endif
    </nav>
@endif
