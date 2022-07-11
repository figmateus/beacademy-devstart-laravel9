@extends('template.user')
@section('title', 'Novo Usuário')
@section('body')
<h1>Novo Usuario</h1>
@if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $erro)
            <li>{{$erro}}</li>
        @endforeach
      </ul>
    </div>
@endif
<form method="POST" action="{{route('users.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Nome</label>
      <input type="text" name="name" class="form-control" id="name">
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">email</label>
      <input type="email" class="form-control" name="email" id="email">
    </div>
    <div class="mb-3">
        <label class="form-label" for="password">senha</label>
        <input type="password" name="password" class="form-control" id="password">
    </div>
    <div class="mb-3">
      <label for="image" class="form-label">Selecione uma imagem</label>
      <input type="file" class="form-control form-control-md" id="image" name="image">
    </div>
    <button type="submit" class="btn btn-primary">Cadastrar</button>
  </form>
@endsection