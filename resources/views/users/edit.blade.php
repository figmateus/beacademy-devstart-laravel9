@extends('template.user')
@section('title', "Usuário {{$user->name}}")
@section('body')
<h1>Usuario {{$$user->name}}</h1>
@if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $erro)
            <li>{{$erro}}</li>
        @endforeach
      </ul>
    </div>
@endif
<form method="post" action="{{route('users.update', $user->id)}}">
    @method('PUT')
    @csrf
    <div class="form-group">
      <label for="name" class="form-label">Nome</label>
      <input type="text" name="name" class="form-control" value="{{$user->name}}" id="name">
    </div>
    <div class="form-group">
      <label for="email" class="form-label">email</label>
      <input type="email" class="form-control" name="email" value="{{$user->email}}" id="email">
    </div>
    <div class="form-check">
        <label class="form-label" for="password">senha</label>
        <input type="password" name="password" class="form-control" id="password">
    </div>
    <button type="submit" class="btn btn-primary">Atualizar</button>
  </form>
@endsection