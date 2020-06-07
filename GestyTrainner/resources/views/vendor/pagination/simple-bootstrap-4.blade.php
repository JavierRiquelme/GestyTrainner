@if ($paginator->hasPages())
    <nav>
        <div class="clearfix">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span class="btn btn-primary float-right">Anterior</span>  
            @else
                <a class="btn btn-primary float-right" href="{{ $paginator->previousPageUrl() }}">&larr; Anterior</a>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a class="btn btn-primary float-left" href="{{ $paginator->nextPageUrl() }}">Siguiente &rarr;</a>
            @else
                <span class="btn btn-primary float-left">Siguiente</span>
            @endif
        </div>
    </nav>
@endif

    
        
    