@extends('template.user')
@section('title', 'Novo Usuário')
@section('body')
<form method="POST" action="{{route('users.store')}}">
    @csrf
    <div class="form-group">
      <label for="name" class="form-label">Nome</label>
      <input type="text" name="name" class="form-control" id="name">
    </div>
    <div class="form-group">
      <label for="email" class="form-label">email</label>
      <input type="email" class="form-control" name="email" id="email">
    </div>
    <div class="form-check">
        <label class="form-label" for="password">senha</label>
        <input type="password" name="password" class="form-control" id="password">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection