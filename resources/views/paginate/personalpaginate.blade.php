<style>
.pagination-links {
    text-align: center;
    margin-top: 20px;
}

.page-link {
    display: inline-block;
    padding: 10px 15px;
    background-color: #840705;
    color: #C3BB38;
    font-family: "Solitreo";
    border-color: #C3BB38;
    border: 1px solid;
    text-decoration: none;
    font-size: 30px;
    border-radius: 4px;
    margin: 0 5px;
}

.page-link:hover {
    background-color:rgb(93, 6, 4);
}

.disabled {
    font-size: 30px;
    cursor: not-allowed;
    display: inline-block;
    padding: 10px 15px;
    background-color: #840705;
    color: #C3BB38;
    font-family: "Solitreo";
    border-color: #C3BB38;
    border: 1px solid;
    text-decoration: none;
    border-radius: 4px;
    margin: 0 5px;
}

.page-link i {
    margin-right: 5px;
}

.page-link:active {
    background-color: #840705;
}
</style>

{{-- Comprobamos si el número total de páginas excede 5 --}}
@if ($paginable->lastPage() > 5)
    <div class="pagination-links">
        {{-- Botón Anterior --}}
        @if ($paginable->onFirstPage())
            <span class="disabled"><i class="fa fa-arrow-left"></i> Anterior</span>
        @else
            <a href="{{ $paginable->previousPageUrl() }}" class="page-link"><i class="fa fa-arrow-left"></i> Anterior</a>
        @endif

        {{-- Números de página --}}
        @foreach ($paginable->links()->elements[0] as $page => $url)
            <a href="{{ $url }}" class="page-link @if ($paginable->currentPage() == $page) active @endif">
                {{ $page }}
            </a>
        @endforeach

        {{-- Botón Siguiente --}}
        @if ($paginable->hasMorePages())
            <a href="{{ $paginable->nextPageUrl() }}" class="page-link">Siguiente <i class="fa fa-arrow-right"></i></a>
        @else
            <span class="disabled">Siguiente <i class="fa fa-arrow-right"></i></span>
        @endif
    </div>
@endif
