<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/8d70dac4bc.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Editar votação</title>
</head>
<body>
    <header class="title">
        <h1>
            Editar votação 
        </h1>
    </header>
    <div class="container">
        
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $error }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endforeach
        @endif
        <div class="back">
            <button class="return-button" onClick="(location.href='{{route('vote.show', $vote->id)}}')">
                <i class="fa-solid fa-arrow-left-long"></i>
                Voltar
            </button>
        </div>
        <form method="POST" action="{{route('vote.update', $vote->id)}}">
            @csrf
            <input type="text" name="id"  value="{{$vote->id}}" hidden><br>

            <label for="title">Título:</label><br>
            <input type="text" name="title" placeholder="Título" value="{{$vote->title}}"><br>

            <label for="question">Pergunta:</label><br>
            <input type="text" name="question" placeholder="Pergunta" value="{{$vote->question}}"><br>

            <div class="datetime-block">
                <div class="label">
                    <label for="start_date">Data de início:</label><br>
                    <input type="date" name="start_date" value="{{$vote->start_date}}">
                </div>
                
                <div class="label">
                    <label for="start_date">Data de término:</label>
                    <input type="date" name="end_date" value="{{$vote->end_date}}">
                </div>
                <div class="label">
                    <label for="start_date">Hora de início:</label>
                    <input type="time" name="start_time" value="{{$vote->start_time}}">
                </div>
                
                <div class="label">
                    <label for="start_date">Hora de término:</label>
                    <input type="time" name="end_time" value="{{$vote->end_time}}">
                </div>
            </div>
            
            <div class="label">
                <label class="label">Opções:</label>
            </div>
            
            <div id="options">
                @foreach($options as $option)
                    <input type="text" name="option[{{$option->id}}]" value="{{$option->content}}"><br>
                @endforeach
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
        
        .title {
            margin-top: 32px;
            margin-bottom: 24px;
            justify-content: center;
            display: flex;
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
        
        .label{
            width: 25%;
            float: left;
            color: #AAAAAA;
        }

        .label label{
            margin-left: 8px;
        }

        .container form input {
            width: 98%;
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