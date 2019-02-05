@extends('adminlte::page')

@section('title', 'Produtos')

@section('content_header')
    
@stop

@section('content')
<div class="col-md-6">
<div class="box">
    <div class="box-header">
        <h3>Listando Produtos</h3>
    </div>
        <div class="box-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Categoria</th>
                        <th>Descrição</th>
                    </tr>
                </thead>
                <tbody>
                        @forelse ($produtos as $produto)
                        <tr>
                            <td>{{ $produto->id }}</td>
                            <td>{{ $produto->categoria->nome }}</td>
                            <td>{{ $produto->desc }}</td>
                        <th><a href="{{route('produto.editar', $produto->id)}}" class="btn btn-warning btn-sd">EDITAR</a><a style="margin-left:10px;" href="{{route('produto.deletar', $produto->id)}}" class="btn btn-danger btn-sd">EXCLUIR</a></th>
                        </tr>
                        @empty
                            <td colspan="3" class="alert alert-danger">Nenhum produto registrado!</td>
                        @endforelse
                    
                </tbody>
            </table>
            {!! $produtos->links() !!}
        </div>
</div>
</div>

<div class="col-md-6">
    <div class="box">
        <div class="box-header">
            Adicionar Produto
        </div>
        <div class="box-body">
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif           
        <form action="{{ route('produtos') }}" method="POST">
            <div class="form-group">
                {{ csrf_field() }}
                <label for="nome">Categoria</label>
                <select name="categoria_id" class="form-control">
                    @forelse ($categorias as $cat)
                     <option value="{{$cat->id}}">{{$cat->nome}}</option>
                    @empty
                        <option value="">Nenhuma categoria registrada...</option>
                    @endforelse
                </select>
            </div>
            <div class="form-group {{ $errors->has('desc') ? 'has-error' : '' }}">
                <label for="desc">Descrição</label>
                <input type="text" name="desc" class="form-control">
                {!! $errors->first('desc', '<span class="help-block">:message</span>') !!}
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