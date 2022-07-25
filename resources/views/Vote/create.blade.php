<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/8d70dac4bc.js" crossorigin="anonymous"></script>
    <title>Criar votação</title>
</head>
<body>
    <header>
        <h1>
            Criar votação
        </h1>
    </header>
    <div class="container">
        <div class="back">
            <button class="return-button" onClick="(location.href='{{route('vote.index')}}')">
                <i class="fa-solid fa-arrow-left-long"></i>
                Voltar
            </button>
        </div>
        <form method="POST" action="{{route('vote.store')}}">
            @csrf

            <label for="title">Título:</label><br>
            <input type="text" name="title" placeholder="Título"><br>

            <label for="question">Pergunta:</label><br>
            <input type="text" name="question" placeholder="Pergunta"><br>

            <div class="datetime-block">
                <div class="label">
                    <label for="start_date">Data de início:</label><br>
                    <input type="date" name="start_date">
                </div>
                
                <div class="label">
                    <label for="start_date">Data de término:</label>
                    <input type="date" name="end_date">
                </div>
                <div class="label">
                    <label for="start_date">Hora de início:</label>
                    <input type="time" name="start_time">
                </div>
                
                <div class="label">
                    <label for="start_date">Hora de término:</label>
                    <input type="time" name="end_time">
                </div>
            </div>
            
            <div class="label">
                <label class="label">Opções:</label>
            </div>
            
            <div id="options">
                <input type="text" name="option[]" placeholder="Opção 1"><br>
                <input type="text" name="option[]" placeholder="Opção 2"><br>
                <input type="text" name="option[]" placeholder="Opção 3"><br>
            </div>

            <div class="add-option" onclick="addOption()">Adicionar opção</div>
            <input type="submit" value="Salvar" class="send">
        </form>
    </div>

    <style>
        body {
            background-color: #202024;
            color: white;

            font-size: 16px;
            font-family: 'Roboto', sans-serif;

            -webkit-font-smoothing: antialiased;
        }

        body header {
            justify-content: center;
            display: flex !important;
        }

        label {
            color: #AAAAAA;
        }

        .container {
            display: flex;
            align-items: center;
            flex-direction: column;
        }

        .container form {
            width: 50%;
        }

        .container form .datetime-block{
            width: 100%;
            display: flex;
            align-items: center;
            margin: 12px 0px 12px;
        }

        .container form .datetime-block input{
            width: 90%;
            color: #AAAAAA;
        }

        
        .label{
            width: 25%;
            float: left;
            color: #AAAAAA;
        }

        .label label{
            margin-left: 8px;
        }

        .container form input {
            width: 100%;
            padding: 24px 0px 24px 8px;
            background: #E6E6E6;
            border-radius: 5px;
            border: none;
            margin: 8px 0px 8px;
            font-size: 16px;
        }

        .container .send {
            width: 100%;
            padding: 24px;
            font-weight: 700;

            background: #EA4C89;
            color: #FFFFFF;

            border-radius: 5px;
            margin: 12px 0 84px;
            border: none;

            cursor: pointer;
            transition: filter 0.2s;

            font-size: 16px;
        }

        .container .send:hover{
            filter: brightness(0.9);
        }

        .container .back{
            width: 50%;
            justify-content: left;
            display: flex !important;
        }

        .container .back .return-button {
            width: 30%;
            height: 50px;
            font-weight: 700;

            background: #EA4C89;
            color: #FFFFFF;

            border-radius: 5px;
            margin: 12px 0 24px;
            border: none;

            cursor: pointer;
            transition: filter 0.2s;

            font-size: 16px;
        }

        .container .back .return-button:hover{
            filter: brightness(0.9);
        }

        .container form .add-option {
            width: 50%;
            padding: 24px;
            font-weight: 700;

            background: #EA4C89;
            color: #FFFFFF;

            border-radius: 5px;
            margin: 12px 0 84px;
            border: none;

            cursor: pointer;
            transition: filter 0.2s;

            font-size: 16px;
            justify-content: center;
            display: flex;
        }

        .container form .add-option:hover{
            filter: brightness(0.9);
        }
    </style>
    <script>
        function addOption(){
            let element = document.getElementById('options')
            const input = document.createElement("input");
            input.setAttribute('name', 'option[]')
            console.log(input)
            element.appendChild(input)
        }
    </script>
</body>
</html>