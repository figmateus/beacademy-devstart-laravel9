@extends('template.user')
@section('title', "Listagem de postagens do {{$user->name}}")
@section('body')
<h1>Postagens do {{$user->name}}</h1>
<div class="mb-3">
    <label class="form-label">Identificação N<br>{{$post->id}}</label>
        <br>
    <label class="form-label">Status<br>{{$post->active ? 'ativo' : 'Inativo'}}</label>
        <br>
    <label class="form-label">Titulo<br>{{$post->title}}</label>
        <br>
    <label class="form-label">Postagem</label>
        <br>    
    <textarea class="form-control" rows="3">{{$post->post}}</textarea>
</div>
@endsection
