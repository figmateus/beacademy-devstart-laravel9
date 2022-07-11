@extends('template.user')
@section('title', 'Listagem de usuários')
@section('body')
<h1>Listagem de Usuarios</h1>
<a class="btn btn-success" href="{{route('users.create')}}">Novo Usuário</a>
<div class="mb-3">
  <label for="image" class="form-label">Selecione uma imagem</label>
  <input type="file" class="form-control form-control-md" id="image" name="image">
</div>
<table class="table">
    <thead>
      <tr>
        <th scope="col">Foto</th>
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
        @if ($user->image)
        <th scope="row"><img src="{{asset('storage/'.$user->image)}}" width="50px" class="rounded-circle" alt="profilePicture"></th>
        @else
        <th scope="row"><img src="{{asset('storage/avatar.jpg')}}" width="50px" class="rounded-circle" alt="avatar"></th>
        @endif
        <th scope="row">{{$user->id}}</th>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
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
