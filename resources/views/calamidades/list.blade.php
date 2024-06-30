@extends('base');

@section('content')

<h1 class="h3 mb-2 text-gray-800">Calamidades</h1>

<div class="hstack gap-3 mb-3">
    <a href="{{route('add-calamidades')}}" class="btn btn-info btn-icon-split">
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
        <span class="text">Informar calamidade</span>
    </a>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Lista de calamidades registradas</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Data ocorrência</th>
                        <th>Data término</th>
                        <th>Tipo</th>
                        <th>Status</th>
                        @if ($user->is_admin)
                            <th>Ação</th>
                        @endif
                    </tr>
                </thead>
                {{-- <tfoot>
                    <tr>
                        <th>Título</th>
                        <th>Data ocorrência</th>
                        <th>Data término</th>
                        <th>Status</th>
                        @if ($user->is_admin)
                            <th>Ação</th>
                        @endif
                    </tr>
                </tfoot> --}}
                <tbody>
                    @foreach ($calamidades as $item)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->date_start}}</td>
                        <td>{{$item->date_end}}</td>
                        <td>{{$item->tipo}}</td>
                        <td>{{$item->status}}</td>
                        @if ($user->is_admin)
                            <th><a href="{{route('update-calamidades', ['id' => $item->id])}}" class="btn btn-info btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-info-circle"></i>
                                </span>
                                <span class="text">Editar</span>
                            </a></th>
                        @endif
                    </tr>    
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection