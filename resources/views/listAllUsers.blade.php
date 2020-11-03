<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listagem de Usuários</title>
</head>
<body>
    <table>
        <tr>
            <td>#ID</td>
            <td>Nome:</td>
            <td>E-mail:</td>
            <td>Ações:</td>
        </tr>

        @foreach ($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    <a href="{{ route('users.list', ['user' => $user->id]) }}">Ver Usuário</a>
                    <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="user" value="">
                        <input type="submit" value="Remover">
                    </form>
                    <form action="{{route('users.formEditUser', ['user' => $user->id])}}" method="get">
                        @csrf
                        <input type="hidden" name="empresa" value="">
                        <button type="submit">Editar</button>
                    </form>
                </td>
            </tr>
        @endforeach

    </table>
</body>
</html>