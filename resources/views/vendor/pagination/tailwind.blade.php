@if ($paginator->hasPages())
<div class="mu-pagination">
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}">
        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">    
        <ul class="pagination">
            @if ($paginator->onFirstPage())
            <li>
                <a aria-label="Previous" >
                <span class="fa fa-angle-left"></span>Prev
                </a>
            </li>
            @else
            <li>
                <a href="{{ $paginator->previousPageUrl() }}" aria-label="Previous">
                     <span class="fa fa-angle-left"></span>Prev
                </a>
            </li>
            @endif

            @if ($paginator->hasMorePages())
            <li>
                <a href="{{ $paginator->nextPageUrl() }}" aria-label="Next">
                    Next<span class="fa fa-angle-right"></span>
                </a>
            </li>
            @else
            <li>
                <a aria-label="Next">
                    Next<span class="fa fa-angle-right"></span>
                </a>
            </li>
            @endif
        </ul>
        </div>
            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                <p class="text-sm text-gray-700 leading-5">
                    {!! __('Showing') !!}
                    <span class="font-medium">{{ $paginator->firstItem() }}</span>
                    {!! __('to') !!}
                    <span class="font-medium">{{ $paginator->lastItem() }}</span>
                    {!! __('of') !!}
                    <span class="font-medium">{{ $paginator->total() }}</span>
                    {!! __('results') !!}
                </p>
            </div>

            <ul class="pagination">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                    <li >
                         <a aria-label="Previous" >
                            <span class="fa fa-angle-left"></span>Prev
                        </a>
                      </li>
                    @else
                    <li>
                        <a href="{{ $paginator->previousPageUrl() }}" aria-label="Previous">
                            <span class="fa fa-angle-left"></span>Prev
                        </a>
                    </li>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <li>
                                <a>{{ $element }}</a>
                            </li>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="active">
                                        <a >{{ $page }}</a>
                                    </li>
                                @else
                                <li>
                                    <a href="{{ $url }}" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                        {{ $page }}
                                    </a>
                                </li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                    <li>
                        <a href="{{ $paginator->nextPageUrl() }}" aria-label="Next">
                            Next<span class="fa fa-angle-right"></span>
                        </a>
                    </li>
                    @else
                    <li >
                    <a aria-label="Next">
                        Next<span class="fa fa-angle-right"></span>
                    </a>
                </li>
                    @endif
            </ul>
    </nav>
</div>
@endif
