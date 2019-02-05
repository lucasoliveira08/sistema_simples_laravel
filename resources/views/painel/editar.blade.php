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
            Editar Categoria
        </div>
        <div class="box-body">
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif           
        <form action="{{ route('painel.update', $cat->id) }}" method="POST">
            <div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
                {{ csrf_field() }}
                <label for="nome">Categoria</label>
            <input type="text" name="nome" value="{{$cat->nome}}" class="form-control">
            {!! $errors->first('nome', '<span class="help-block">:message</span>') !!}
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