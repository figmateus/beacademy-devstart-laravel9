@extends('template.user')
@section('title', 'Listagem de usuários')
@section('body')
<h1>Listagem de Usuarios</h1>
<div class="container">
  <div class="row">
    <div class="col-sm mt-2 mb-5">
      <a class="btn btn-success" href="{{route('users.create')}}">Novo Usuário</a>
    </div>
    <div class="col-sm mt-2 mb-5">
      <form action="{{route('users.index')}}" method="GET">
        @csrf
        <div class="input-group">
          <input type="search" class="form-control rounded" name="search">
          <button class="btn btn-outline-primary" type="submit">Pesquisar</button>
        </div>
      </form>
    </div>

  </div>
</div>
<table class="table">
    <thead>
      <tr>
        <th scope="col">Foto</th>
        <th scope="col">ID</th>
        <th scope="col">Nome</th>
        <th scope="col">Email</th>
        <th scope="col">Postagens</th>
        <th scope="col">Data Cadastro</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>
    @foreach ($users as $user)
    <tbody>
      <tr>
        @if ($user->image)
        <th scope="row"><img src="{{asset('storage/'.$user->image)}}" width="50px" class="rounded-circle" alt="profilePicture"></th>
        @else
        <th scope="row"><img src="{{asset('storage/avatar.jpg')}}" width="50px" class="rounded-circle" alt="avatar"></th>
        @endif
        <th scope="row">{{$user->id}}</th>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>
          <a class="btn btn-outline-dark" href="{{route('posts.show', $user->id)}}">Postagens - {{$user->posts->count()}}</a>
        </td>
        <td>{{date('d/m/Y - H:i',strtotime($user->created_at))}}</td>
        <td><a class="btn btn-info text-white" href="{{route('users.show', $user->id)}}">Visualizar</a></td>
      </tr>
    </tbody>
    @endforeach
  </table>
  <div class="justify-content-center pagination">
    {{ $users->links('pagination::bootstrap-4') }}
  </div>
@endsection
