<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logar-se</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #c0d3f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #C0D3F7;
            width: 100%;
            max-width: 600px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            border: 2px solid #ccc;
            border-radius: 10px;
        }

        header img {
            width: 150px;
            height: 50px;
        }

        header h1 {
            font-family: 'Fredoka', sans-serif;
            margin: 20px 0;
            color: white;
        }

        p {
            font-size: 16px;
            margin: 15px 0;
            color: black;
        }

        a {
            display: inline-block;
            background-color: #D67D93;
            color: white !important;
            padding: 10px 20px;
            border-radius: 20px;
            text-decoration: none;
            margin-top: 20px;
            font-weight: bold;
        }

        footer p {
            font-size: 14px;
            color: #777;
            margin: 10px 0;
        }

        .highlight {
            color: black;
            font-weight: bold;
        }

        .logo {
            height: 150px;
            width: 300px;
        }
    </style>
</head>

<body>
    <div class="container">
        <header>
            <img src="https://i.im.ge/2024/07/21/VRpmGK.logo-full.png" class="logo">
            <h1>Verificação de E-mail Cadastrado</h1>
        </header>

        <div class="content">
            <p>Olá, {{ $user->name }}</p>
            <p>Agradecemos sua entrada em nosso sistema. Por medidas de segurança, por favor verifique esse e-mail cadastrado pressionando o botão de verificação:</p>

            <a href="{{ $url }}">Verificar endereço de e-mail</a>
            <p>Prepare-se para criar uma infância mais divertida e sustentável com o TrocaTeca</p>
            <p class="highlight">Ignore este e-mail caso não tenha feito nenhum cadastro.</p>
        </div>

        <footer>
            <p>Infância com sustentabilidade e reusabilidade</p>
            <p>&copy; TrocaTeca {{ date('Y') }}</p>
        </footer>
    </div>
</body>

</html>