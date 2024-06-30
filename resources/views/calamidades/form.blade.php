@extends('base')

@section('content')

<h1 class="h3 mb-2 text-gray-800">Calamidades / Adicionar</h1>

<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Formulário registro de calamidades</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <form action="{{route('add-calamidades')}}" method="post">
                    @csrf
                    <div class="mb-3 col-3">
                        <label for="name" class="form-label">Título:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="mb-3 col-6">
                        <label for="description">Descrição da calamidade:</label>
                        <textarea class="form-control" id="description" name="description" required></textarea>
                    </div>

                    <div class="mb-3 col-3">
                        <label for="date_start" class="form-label">Data ocorrência:</label>
                        <input type="date" class="form-control" id="start" name="date_start" required>
                    </div>
                    
                    <div class="row">
                        <div class="col-1">
                            <a href="{{route('calamidades')}}" class="btn btn-secondary btn-user btn-block">
                                <span class="icon text-white-50">
                                    <i class="fas fa-undo-alt"></i>
                                </span> voltar
                            </a>
                        </div>
                        <div class="col-2">
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                <span class="icon text-white-50">
                                    <i class="fas fa-save"></i>
                                </span>Registrar calamidade
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection