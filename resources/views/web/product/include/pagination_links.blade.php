@if ($paginator->hasPages())
<div class="d-flex flex-md-row flex-column justify-content-between pagination-bar">
    <ul class="pagination-item list-unstyled d-flex gap-3">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled" aria-disabled="true">
                <a href="#" class="active">Previous</a>
            </li>
        @else
            <li>
                <a class="active" href="{{ $paginator->previousPageUrl() }}" rel="prev">Previous</a>
            </li>
        @endif

        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                    <li>
                        <a class="active">{{ $page }}</a>
                    </li>
                    @else
                    <li>
                        <a href="{{ $url }}">{{ $page }}</a>
                    </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li>
                <a href="{{ $paginator->nextPageUrl() }}" class="active">Next</a>
            </li>
        @else
            <li>
                <a class="active">Next</a>
            </li>
        @endif
    </ul>
    <p class="list-view-card-result mb-0">
        {{ $paginator->firstItem() }} - {{ $paginator->lastItem() }} of <span>{{ $paginator->total() }} Results</span>
    </p>
</div>
@endif