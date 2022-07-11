@extends('template.user')
@section('title', 'Listagem de postagens')
@section('body')
<h1>Listagem de Postagens</h1>
{{-- <a class="btn btn-success" href="{{route('users.create')}}">Novo Usuário</a> --}}
<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Usuário</th>
        <th scope="col">Titulo</th>
        <th scope="col">Postagem</th>
        <th scope="col">Data Cadastro</th>
        {{-- <th scope="col">Ações</th> --}}
      </tr>
    </thead>
    @foreach ($posts as $post)
    <tbody>
      <tr>
        <th scope="row">{{$post->id}}</th>
        <th scope="row">{{$post->user->name}}</th>
        <td>{{$post->title}}</td>
        <td>{{$post->post}}</td>
        <td>{{date('d/m/Y - H:i',strtotime($post->created_at))}}</td>
        {{-- <td><a class="btn btn-info text-white" href="{{route('users.show', $user->id)}}">Visualizar</a></td> --}}
      </tr>
    </tbody>
    @endforeach
  </table>
  <div class="justify-content-center pagination">
    {{-- {{ $posts->links('pagination::bootstrap-4') }} --}}
  </div>
@endsection
