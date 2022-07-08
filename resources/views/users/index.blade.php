@extends('template.user')
@section('title', 'Listagem de usuários')
@section('body')
<h1>Listagem de Usuarios</h1>
<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nome</th>
        <th scope="col">Email</th>
        <th scope="col">Data Cadastro</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>
    @foreach ($users as $user)
    <tbody>
      <tr>
        <th scope="row">{{$user->id}}</th>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{date('d/m/Y - H:i',strtotime($user->created_at))}}</td>
        <td><a class="btn btn-info text-white" href="{{route('users.show', $user->id)}}">Visualizar</a></td>
      </tr>
    </tbody>
    @endforeach
  </table>
@endsection
