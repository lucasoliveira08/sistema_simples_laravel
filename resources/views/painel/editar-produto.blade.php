@extends('adminlte::page')

@section('title', 'Index')

@section('content_header')
    <h1>Bem-vindo, {{ Auth::user()->name }}!</h1>
@stop

@section('content')

<div class="col-md-2"></div>
<div class="col-md-8">
    <div class="box">
        <div class="box-header">
            Editar Produto
        </div>
        <div class="box-body">
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif           
        <form action="{{ route('produto.update', $produtos->id) }}" method="POST">
            <div class="form-group">
                {{ csrf_field() }}
                <label for="nome">Categoria</label>
                    <select name="categoria_id" class="form-control">
                        @foreach ($categorias as $cat)
                        <option value="{{$cat->id}}" {{ $produtos->categoria_id === $cat->id ? 'selected' : '' }}>{{$cat->nome}}</option>   
                        @endforeach
                    </select>
            </div>

            <div class="form-group {{ $errors->has('desc') ? 'has-error' : '' }}">
                    {{ csrf_field() }}
                    <label for="desc">Descrição</label>
                    <input type="text" name="desc" value="{{ $produtos->desc}}" class="form-control"> 
                    {!! $errors->first('desc', '<span class="help-block">:message</span>') !!}
                </div>

            <div class="form-group">
                <center><input type="submit" name="button" class="btn btn-success btn-sd" value="SALVAR"></center>
            </div>
        </form>
        </div>
    </div>
</div>
<div class="col-md-2"></div>
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

