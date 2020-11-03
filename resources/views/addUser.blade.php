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
        <form action="{{ route('users.store') }}" method="post">
            @csrf <!-- Vai gerar um token no servidor e enviar junto no formulário, assim quando o cliente for fazer o submit vai ser verificado ser tem um token válido, garantindo que um atacante não use por exemplo o comando curls para ficar enviando requisiçĩoes diretas para a aplicação -->
            <label for="">Nome do usuário</label>
            <input type="text" name="name">
    
            <label for="">E-mail do usuário:</label>
            <input type="text" name="email">
            
            <label for="">Senha do usuário:</label>
            <input type="password" name="password">
    
            <input type="submit" value="Cadastrar usuário">
        </form>
    </div>
    
</body>
</html>