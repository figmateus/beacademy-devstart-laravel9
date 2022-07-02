<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Usuario: {{$user->name}}</title>
</head>
<body>
    <div>
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
                    <a class="btn btn-warning text-white" href="">Editar</a>
                    <a class="btn btn-danger text-white" href="">Deletar</a>
                </td>
              </tr>
            </tbody>
            @endforeach
          </table>
    </div>
</body>
</html>