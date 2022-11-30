<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('main.css')}}">
    <link rel="stylesheet" type="text/css" href="js/slick-1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="js/slick-1.8.1/slick/slick-theme.css"/>
    <title>@yield('title')</title>
</head>
<body>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="js/slick-1.8.1/slick/slick.min.js"></script>
    <header>
        
        <img src="{{ asset('imagens/icon.png') }}" alt="Logo" class="logoini">
        
        <nav>
            <ul>
                <li><a href="{{route('site.index')}}"> <img src="{{ asset('imagens/menu.png') }}" alt="menu icon" class="menu">PÁGINA INICIAL</a></li>
            </ul>
        </nav>
        
        <form action="{{ route('site.index') }}" method="GET" class="nav-form">
            <div class="input-field">
                <img src="{{ asset('imagens/filtro.png') }}" alt="filtro icon" class="filtro-icon">
                <select name="categoria_id" id="categoria_id">
                    <option value="">Selecione uma categoria</option>


                    @foreach($categorias as $categoria)
                    <option value="{{$categoria->id}}" @if(isset($filtro) && $filtro == $categoria->id) selected @endif>
                        {{$categoria->category_name}}
                    </option>
                    @endforeach
                </select>
                <button class="botao">Pesquisar</button>
            </div>
                
        </form>

    </header>
    
    <main>
        @yield('content')
    </main>

    <footer class="rodape">
        <img src="{{ asset('imagens/icon.png') }}" alt="Logo" class="logo">
    
        <a href="https://www.instagram.com/pedrobrito04/" target="_blank">
            <img src="{{ asset('imagens/instagram.svg') }}" alt="instagram icon" class="insta">
        </a>
        <a href="https://www.linkedin.com/in/pedro-henrique-brito-lucas-6a8073216/" target="_blank">
            <img src="{{ asset('imagens/linkedin.png') }}" alt="linkedin icon" class="linkedin">
        </a>    
        <p class="footer-message">
            Desenvolvido por Pedro Brito - 2022
        </p>
    </footer>
</body>
</html>