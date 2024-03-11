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
        <div class="dataTables_paginate paging_simple_numbers" id="example_paginate" style="overflow-x:auto;">
            <ul class="pagination" style="display: flex; flex-wrap: nowrap; padding-bottom: 20px;">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="page-item previous disabled"><a class="page-link">Previous</a></li>
                @else
                    <li class="page-item previous"><a class="page-link" href="#" wire:click.prevent="previousPage" rel="prev">Previous</a></li>
                @endif

                {{-- Pagination Element Links --}}
                @foreach ($elements as $element)
                    @if (is_string($element))
                        <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
                    @endif

                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                            @else
                                <li class="page-item"><a class="page-link" href="#" wire:click.prevent='gotoPage({{ $page }})'>{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item next"><a class="page-link" href="#" wire:click.prevent="nextPage" rel="next">Next</a></li>
                @else
                    <li class="page-item next disabled"><span class="page-link">Next</span></li>
                @endif
            </ul>
        </div>
    </div>
</div>
