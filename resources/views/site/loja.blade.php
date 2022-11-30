@extends('layouts.site')

@section('title', 'Catálogo de produtos')


@section('content')
<section >
    <div class="banner" style="
        margin-right: auto;
        margin-left: auto;">
        <img src="{{ asset('imagens/fto.jpg') }}" alt="">
        <img src="{{ asset('imagens/fto4.jpg') }}" alt="">
        <img src="{{ asset('imagens/fto3.jpg') }}" alt="">
    </div>
    <div class="loja">
        
        @foreach ($produtos as $produto)
            
                <div class="card">
                    <h2 class="titulo">{{$produto->name}}</h2> 
                    <span class="categoria">Categoria: {{$produto->categoria->category_name}}</span>
    
                    @if ($produto->photo)
                        <img class="imagem"src="/storage/{{$produto->photo}}" alt="{{$produto->name}}">
                    @else
                        <img class="imagem" src="{{asset('imagens/edicao-limitada.jpg')}}" alt="{{$produto->name}}">
                    @endif
            
                        <div class="money">
                            @if(($produto->amount)>0)
                                <span class="preco">R${{$produto->price}}</span>
                                <span class="quantidade">{{$produto->amount}} .unds</span>
                            @else
                                <span class="quantidade">Esgotado</span>
                            @endif
                        </div>
    
                    <p class="texto">{{$produto->getTitleShortAttribute()}}</p>
                </div>
        @endforeach
    </div>
</section>
@if (isset($filters))
    <span class="pag">{{$produtos->appends($filters)->links()}}</span>
@else
    <span class="pag">{{$produtos->links()}}</span>
@endif

<script>
    const teste = document.querySelector('.pag');
    teste.style.color = 'red';
    $('.banner').slick({
        dots: true,
        infinite: true,
        autoplay: true,
        speed: 2000,
        slidesToShow: 1,
    });
</script>
@endsection