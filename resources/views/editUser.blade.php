<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Criar Usuário</title>
</head>
<body>
    <div class="container text-center">
        <form action="{{ route('users.edit', ['user' => $user->id]) }}" method="post">
            @csrf <!-- Vai gerar um token no servidor e enviar junto no formulário, assim quando o cliente for fazer o submit vai ser verificado ser tem um token válido, garantindo que um atacante não use por exemplo o comando curls para ficar enviando requisiçĩoes diretas para a aplicação -->
            @method('PUT') <!-- Vai alterar o método da requisição para não ocorrer erro -->
            <label for="">Nome do usuário</label>
            <input type="text" name="name" value="{{$user->name}}">
    
            <label for="">E-mail do usuário:</label>
            <input type="text" name="email" value="{{$user->email}}">
            
            <label for="">Senha do usuário:</label>
            <input type="password" name="password">
    
            <input type="submit" value="Salvar usuário">
        </form>
    </div>
    
</body>
</html>