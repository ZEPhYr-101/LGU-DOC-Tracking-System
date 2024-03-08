<div class="row">
    <div class="col-sm-12 col-md-5">
        <div class="dataTables_info" id="example_info" role="status" aria-live="polite">
            Showing
            @if ($paginator->firstItem())
                {{ $paginator->firstItem() }} to {{ $paginator->lastItem() }}
            @else
                0
            @endif
            of {{ $paginator->total() }} entries
        </div>
    </div>
    <div class="col-sm-12 col-md-7 d-flex justify-content-end">
        <div class="dataTables_paginate paging_simple_numbers" id="example_paginate">
            <ul class="pagination">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="paginate_button page-item previous disabled" id="example_previous">
                        <span class="page-link">Previous</span>
                    </li>
                @else
                    <li class="paginate_button page-item previous">
                        <button class="page-link" wire:click="previousPage" rel="prev">Previous</button>
                    </li>
                @endif

                {{-- Pagination Element Links --}}
                @foreach ($elements as $element)
                    @if (is_string($element))
                        <li class="paginate_button page-item disabled"><span class="page-link">{{ $element }}</span></li>
                    @endif

                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="paginate_button page-item active">
                                    <span class="page-link">{{ $page }}</span>
                                </li>
                            @else
                                <li class="paginate_button page-item">
                                    <button class="page-link" wire:click='gotoPage({{ $page }})'>{{ $page }}</button>
                                </li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="paginate_button page-item next" id="example_next">
                        <button class="page-link" wire:click="nextPage" rel="next">Next</button>
                    </li>
                @else
                    <li class="paginate_button page-item next disabled" id="example_next">
                        <span class="page-link">Next</span>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
