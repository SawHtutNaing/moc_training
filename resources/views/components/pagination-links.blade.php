@props(['paginator'])

<div class="flex justify-center items-center space-x-2 mt-4">
    @if ($paginator->hasPages())
        <!-- Previous Button -->
        @if ($paginator->onFirstPage())
            <span class="px-3 py-1 bg-gray-200 text-gray-500 rounded-md cursor-not-allowed">Previous</span>
        @else
            <button wire:click="previousPage" class="px-3 py-1 bg-info text-light rounded-md hover:bg-primary transition-colors">Previous</button>
        @endif

        <!-- Page Numbers -->
        @foreach ($paginator->getUrlRange(1, $paginator->lastPage()) as $page => $url)
            @if ($page == $paginator->currentPage())
                <span class="px-3 py-1 bg-primary text-light rounded-md">{{ $page }}</span>
            @else
                <button wire:click="gotoPage({{ $page }})" class="px-3 py-1 bg-info text-light rounded-md hover:bg-primary transition-colors">{{ $page }}</button>
            @endif
        @endforeach

        <!-- Next Button -->
        @if ($paginator->hasMorePages())
            <button wire:click="nextPage" class="px-3 py-1 bg-info text-light rounded-md hover:bg-primary transition-colors">Next</button>
        @else
            <span class="px-3 py-1 bg-gray-200 text-gray-500 rounded-md cursor-not-allowed">Next</span>
        @endif
    @endif
</div>
