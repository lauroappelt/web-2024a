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
                    <div class="icon-style" data-toggle="open-cadastro-catastrofes">
                        <span class="icon icons-size" data-bs-placement="right" data-toggle="tooltip" title="Cadastro de Desastres"><ion-icon name="flash-outline"></ion-icon></ion-icon></span>
                    </div>
                </div>
                <div class="icons-container">
                    <div class="icon-style" data-toggle="open">
                        <span class="icon icons-size" data-bs-placement="right" data-toggle="tooltip" title="Logout"><ion-icon name="log-out-outline"></ion-icon></span>
                    </div>
                </div>
            </div>
        </div>
        {{-- Side Panel for menu --}}
        <div id="side-panel-login" class="side-panel">
            <h2>
                Login
            </h2>
        </div>
        <div id="side-panel-lista-catastrofes" class="side-panel">
            <h2>
                Lista de Catastrofes
            </h2>
        </div>
        <div id="side-panel-cadastro-catastrofes" class="side-panel">
            <h2>
                Cadastro de Catastrofes
            </h2>
        </div>
    </div>
@endsection
