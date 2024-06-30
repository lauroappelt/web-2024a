@extends('layout')
@section('content')
    <div class="container-home">
        {{-- Mapa --}}
        <div class="map-conteiner">
            <div id="map"></div>
        </div>
        {{-- Menu --}}
        <div class="menu-container">
            <div class="menu-itens-container">
                <div class="icons-container">
                    <div class="icon-style" data-toggle="open-login">
                        <span class="icon icon-user" data-bs-placement="right" data-toggle="tooltip" title="User"><ion-icon name="person-circle-outline"></ion-icon></span>
                    </div>
                    <div class="icon-style" data-toggle="open-lista-catastrofes">
                        <span class="icon icons-size" data-bs-placement="right" data-toggle="tooltip" title="Lista de Desastres"><ion-icon name="thunderstorm-outline"></ion-icon></ion-icon></span>
                    </div>
                    @if(auth()->user())
                    <div class="icon-style" data-toggle="open-cadastro-catastrofes">
                        <span class="icon icons-size" data-bs-placement="right" data-toggle="tooltip" title="Cadastro de Desastres"><ion-icon name="flash-outline"></ion-icon></ion-icon></span>
                    </div>
                    @endif
                </div>
                <div class="icons-container">
                    <div class="icon-style" data-toggle="open">
                        <a href="{{route('logout')}}"><span class="icon icons-size" data-bs-placement="right" data-toggle="tooltip" title="Logout"><ion-icon name="log-out-outline"></ion-icon></span></a>
                    </div>
                </div>
            </div>
        </div>
        {{-- Side Panel for menu --}}
        <div id="side-panel-login" class="side-panel">
            @if(!auth()->user())
                <form id="form-login" action="{{route('login')}}" method="post" class="form">
                    @csrf
                    <span class="title">Login</span>
                    <input type="text" id="usuario" name="email" placeholder="Usuário" class="input-text input-cadastro">
                    <input type="password" id="senha" name="password" placeholder="Senha" class="input-text input-cadastro">
                    <input type="submit" class="input-button" value="Logar">
                </form>
                <div class="separator-container">
                    <div class="separator-line"></div>
                    <div class="separator-text">OU</div>
                    <div class="separator-line"></div>
                </div>
                <form id="form-cadastro" action="{{route('register-user')}}" method="post" class="form">
                    @csrf
                    <span class="title">Cadastro</span>
                    <input type="text" id="usuario" name="name" placeholder="Nome" class="input-text input-cadastro">
                    <input type="email" id="email" name="email" placeholder="Email" class="input-text input-cadastro">
                    <input type="password" id="senha" name="password" placeholder="Senha" class="input-text input-cadastro">
                    
                    <input type="submit" class="input-button" value="Cadastrar">
                </form>
            @else
                <span class="title">Dados de usuário</span>
                <input type="text" id="usuario" name="email" placeholder="Usuário"  value="{{auth()->user()->name}}" class="input-text input-cadastro" disabled>
                <input type="email" id="email" name="email" placeholder="Email" value="{{auth()->user()->email}}" class="input-text input-cadastro" disabled>
                <a href="{{route('logout')}}"><input type="" class="input-button" value="Logout"></a>
            @endif
            
        </div>

        <div id="side-panel-lista-catastrofes" class="side-panel">
            <span class="title">Lista de Catastrofes</span>
            <div class="catastrofes-container">
                @foreach($calamidades as $calamidade)
                    <div class="catastrofe-item">
                        <div class="catastrofe-titulo">{{$calamidade->name}}</div>
                        <div class="catastrofe-tipo">Tipo: {{$calamidade->tipo}}</div>
                        <div class="catastrofe-data">Inicio: {{$calamidade->date_start}}</div>
                        <div class="catastrofe-data">Termino: {{$calamidade->date_end}}</div>
                        <div class="catastrofe-descricao text-wrap">{{$calamidade->description}}</div>
                        @if(auth()->user() && auth()->user()->is_admin )
                        <form action="" class="form-catastrofes-button-icons">
                            <button type="submit" class="btn-catastrofes-icons btn-confirmar-catastrofe"><ion-icon name="checkmark-outline"></ion-icon> Confirmar</button>
                            <button type="submit" class="btn-catastrofes-icons btn-rejeitar-catastrofe"><ion-icon name="close-outline"></ion-icon> Rejeitar</button>
                        </form>
                        @endif
                    </div>
                @endforeach
                {{-- <div class="catastrofe-item">
                    <div class="catastrofe-titulo">Cheia no Rio Taquari</div>
                    <div class="catastrofe-tipo">Tipo: ENCHENTE</div>
                    <div class="catastrofe-data">Inicio: 29/06/2024</div>
                    <div class="catastrofe-data">Termino: 30/06/2024</div>
                    <div class="catastrofe-descricao">Inundação causa alagamentos severos, afetando comunidades e infraestruturas locais.</div>
                    <form action="" class="form-catastrofes-button-icons">
                        <button type="submit" class="btn-catastrofes-icons btn-confirmar-catastrofe"><ion-icon name="checkmark-outline"></ion-icon> Confirmar</button>
                        <button type="submit" class="btn-catastrofes-icons btn-rejeitar-catastrofe"><ion-icon name="close-outline"></ion-icon> Rejeitar</button>
                    </form>
                </div>
                <div class="catastrofe-item">
                    <div class="catastrofe-titulo">Cheia no Rio Taquari</div>
                    <div class="catastrofe-tipo">Tipo: ENCHENTE</div>
                    <div class="catastrofe-data">Inicio: 29/06/2024</div>
                    <div class="catastrofe-data">Termino: 30/06/2024</div>
                    <div class="catastrofe-descricao">Inundação causa alagamentos severos, afetando comunidades e infraestruturas locais.</div>
                </div>
                <div class="catastrofe-item">
                    <div class="catastrofe-titulo">Cheia no Rio Taquari</div>
                    <div class="catastrofe-tipo">Tipo: ENCHENTE</div>
                    <div class="catastrofe-data">Inicio: 29/06/2024</div>
                    <div class="catastrofe-data button-finalizar-container">
                        Termino: -
                        <form action="">
                            <button type="submit" class="btn-finalizar"><ion-icon name="checkmark-outline"></ion-icon> Finalizar</button>
                        </form>
                    </div>
                    <div class="catastrofe-descricao">Inundação causa alagamentos severos, afetando comunidades e infraestruturas locais.</div>
                    <form action="" class="form-catastrofes-button-icons">
                        <button type="submit" class="btn-catastrofes-icons btn-confirmar-catastrofe"><ion-icon name="checkmark-outline"></ion-icon> Confirmar</button>
                        <button type="submit" class="btn-catastrofes-icons btn-rejeitar-catastrofe"><ion-icon name="close-outline"></ion-icon> Rejeitar</button>
                    </form>
                </div>
                <div class="catastrofe-item">
                    <div class="catastrofe-titulo">Cheia no Rio Taquari</div>
                    <div class="catastrofe-tipo">Tipo: ENCHENTE</div>
                    <div class="catastrofe-data">Inicio: 29/06/2024</div>
                    <div class="catastrofe-data">Termino: - </div>
                    <div class="catastrofe-descricao">Inundação causa alagamentos severos, afetando comunidades e infraestruturas locais.</div>
                </div>
                <div class="catastrofe-item">
                    <div class="catastrofe-titulo">Cheia no Rio Taquari</div>
                    <div class="catastrofe-tipo">Tipo: ENCHENTE</div>
                    <div class="catastrofe-data">Inicio: 29/06/2024</div>
                    <div class="catastrofe-data">Termino: 30/06/2024</div>
                    <div class="catastrofe-descricao">Inundação causa alagamentos severos, afetando comunidades e infraestruturas locais.</div>
                </div>
                <div class="catastrofe-item">
                    <div class="catastrofe-titulo">Cheia no Rio Taquari</div>
                    <div class="catastrofe-tipo">Tipo: ENCHENTE</div>
                    <div class="catastrofe-data">Inicio: 29/06/2024</div>
                    <div class="catastrofe-data">Termino: 30/06/2024</div>
                    <div class="catastrofe-descricao">Inundação causa alagamentos severos, afetando comunidades e infraestruturas locais.</div>
                    <form action="" class="form-catastrofes-button-icons">
                        <button type="submit" class="btn-catastrofes-icons btn-confirmar-catastrofe"><ion-icon name="checkmark-outline"></ion-icon> Confirmar</button>
                        <button type="submit" class="btn-catastrofes-icons btn-rejeitar-catastrofe"><ion-icon name="close-outline"></ion-icon> Rejeitar</button>
                    </form>
                </div> --}}
            </div>
        </div>

        <div id="side-panel-cadastro-catastrofes" class="side-panel">
            <form id="form-cadastro" action="{{route('add-calamidades')}}" method="post" class="form">
                @csrf
                <span class="title">Cadastro de Catastrofes</span>
                <input type="text" id="titulo" name="name" placeholder="Titulo" class="input-text input-cadastro" required>
                <textarea id="descricao" name="description" rows="4" cols="50" placeholder="Descrição" class="input-text input-cadastro" required></textarea>
                <input type="date" id="email" name="date_start" placeholder="Data de Início" class="input-text input-cadastro" required>
                <select id="catastrofe" name="tipo" class="input-text input-cadastro" required>
                    <option value="">Selecione uma opção</option></option>
                    <option value="ENCHENTE">ENCHENTE</option>
                    <option value="TIROTEIO">TIROTEIO</option>
                    <option value="MASSACRE">MASSACRE</option>
                    <option value="COLAPSO_INFRA">COLAPSO INFRA</option>
                    <option value="GUERRA">GUERRA</option>
                </select>
                <input type="text" id="lat" name="lat" placeholder="Latitude" class="input-text input-cadastro">
                <input type="text" id="long" name="titulo" placeholder="Longitude" class="input-text input-cadastro">
                <input type="submit" class="input-button" value="Cadastrar">
            </form>
        </div>
    </div>
@endsection
