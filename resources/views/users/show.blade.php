@extends('template.user')
@section('title', 'Visualizar Usuário')
@section('body')
<h1>Usuario: {{$user->name}}</h1>
<table class="table">
  <thead class="text-center">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nome</th>
        <th scope="col">Email</th>
        <th scope="col">Data Cadastro</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>
    @foreach ($users as $user)
    <tbody class="text-center">
      <tr>
        <th scope="row">{{$user->id}}</th>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{date('d/m/Y - H:i',strtotime($user->created_at))}}</td>
        <td>
            <a class="btn btn-warning text-white" href="{{route('users.edit', $user->id)}}">Editar</a>
            <form action="{{route('users.destroy', $user->id)}}" method="POST">
              @method('DELETE')
              @csrf
              <button class="btn btn-danger text-white" type="submit">Deletar</button>
            </form>
        </td>
      </tr>
    </tbody>
    @endforeach
  </table>    
@endsection
