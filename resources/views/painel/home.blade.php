@extends('adminlte::page')

@section('title', 'Index')

@section('content_header')
    <h1>Bem-vindo, {{ Auth::user()->name }}!</h1>
@stop

@section('content')
<div class="col-md-6">
<div class="box">
    <div class="box-header">
        <h3>Listando Categorias</h3>
    </div>
        <div class="box-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                        @forelse ($cats as $cat)
                        <tr>
                            <td>{{ $cat->id }}</td>
                            <td>{{ $cat->nome }}</td>
                        <th><a href="{{route('painel.edit', $cat->id)}}" class="btn btn-warning btn-sd">EDITAR</a><a style="margin-left:10px;" href="{{route('painel.delete', $cat->id)}}" class="btn btn-danger btn-sd">EXCLUIR</a></th>
                        </tr>
                        @empty
                            <td colspan="3" class="alert alert-danger">Nenhuma categoria registrada!</td>
                        @endforelse
                    
                </tbody>
            </table>
            {!! $cats->links() !!}
        </div>
</div>
</div>

<div class="col-md-6">
    <div class="box">
        <div class="box-header">
            Adicionar Categoria
        </div>
        <div class="box-body">
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif           
        <form action="{{ route('painel') }}" method="POST">
            <div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
                {{ csrf_field() }}
                <label for="nome">Categoria</label>
                <input type="text" name="nome" placeholder="Nome da Categoria" class="form-control">
                {!! $errors->first('nome', '<span class="help-block">:message</span>') !!}
            </div>
            <div class="form-group">
                <center><input type="submit" name="button" class="btn btn-success btn-sd" value="Registrar"></center>
            </div>
        </form>
        </div>
    </div>
</div>
@stop

@section('adminlte_js')
    <script>
        $.ajaxSetup({
    headers: {
        'X-CSRF-Token': $('meta[name="_token"]').attr('content')
    }
});
    </script>
@endsection