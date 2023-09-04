<div>
    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-end">
            <div class="flex-1 flex items-center justify-end">
                <div>
                    <span class="relative z-0 inline-flex">
                        <span>
                            {{-- Previous Page Link --}}
                            @if ($paginator->onFirstPage())
                                <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                                    <span class="relative inline-flex items-center px-2 py-2 font-medium text-true-gray-700 cursor-default leading-5" aria-hidden="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <polyline points="15 6 9 12 15 18"></polyline>
                                        </svg>
                                    </span>
                                </span>
                            @else
                                <button wire:click="previousPage" dusk="previousPage.after" rel="prev" class="relative inline-flex items-center px-2 py-2 font-medium text-true-gray-700 leading-5 hover:text-black focus:z-10 focus:outline-none active:text-black transition ease-in-out duration-150" aria-label="{{ __('pagination.previous') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <polyline points="15 6 9 12 15 18"></polyline>
                                    </svg>
                                </button>
                            @endif
                        </span>

                        {{-- Pagination Elements --}}
                        @foreach ($elements as $element)
                            {{-- "Three Dots" Separator --}}
                            @if (is_string($element))
                                <span aria-disabled="true">
                                    <span class="relative inline-flex items-center px-4 py-2 -ml-px font-medium text-gray-700 cursor-default leading-5">{{ $element }}</span>
                                </span>
                            @endif

                            {{-- Array Of Links --}}
                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    <span wire:key="paginator-page{{ $page }}">
                                        @if ($page == $paginator->currentPage())
                                            <span aria-current="page">
                                                <span class="relative inline-flex items-center px-4 py-2 -ml-px font-bold to-black cursor-default leading-5">{{ $page }}</span>
                                            </span>
                                        @else
                                            <button wire:click="gotoPage({{ $page }})" class="relative inline-flex items-center px-4 py-2 -ml-px font-medium text-true-gray-700 leading-5 hover:to-black focus:z-10 focus:outline-none active:text-black transition ease-in-out duration-150" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                                {{ $page }}
                                            </button>
                                        @endif
                                    </span>
                                @endforeach
                            @endif
                        @endforeach

                        <span>
                            {{-- Next Page Link --}}
                            @if ($paginator->hasMorePages())
                                <button wire:click="nextPage" dusk="nextPage.after" rel="next" class="relative inline-flex items-center px-2 py-2 -ml-px font-medium text-true-gray-700 rounded-r-md leading-5 hover:text-black focus:z-10 focus:outline-none active:text-black transition ease-in-out duration-150" aria-label="{{ __('pagination.next') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <polyline points="9 6 15 12 9 18"></polyline>
                                    </svg>
                                </button>
                            @else
                                <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                                    <span class="relative inline-flex items-center px-2 py-2 -ml-px font-medium text-true-gray-700 cursor-default rounded-r-md leading-5" aria-hidden="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <polyline points="9 6 15 12 9 18"></polyline>
                                        </svg>
                                    </span>
                                </span>
                            @endif
                        </span>
                    </span>
                </div>
            </div>
        </nav>
    @endif
</div>
