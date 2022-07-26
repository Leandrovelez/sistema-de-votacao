<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/8d70dac4bc.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    
    <title>{{$vote->title}}</title>
</head>
<body>
    <header class="title">
        <h1>{{$vote->title}}</h1>
        <h2>{{$vote->question}}</h2>
    </header>
    <div class="container">
        <div class="div-button">
            <button class="button" onClick="(location.href='{{route('vote.show', $vote->id)}}')">
                <i class="fa-solid fa-arrow-left-long"></i>
                Voltar
            </button>
        </div>
        <form method="POST" action="{{route('answer.store')}}">
        @csrf
            <input type="text" name="voteId" value="{{$vote->id}}" hidden>
            @foreach($options as $option)
                <div class="content">
                    <div class="div-option" >
                        <label for="option{{$option->id}}" class="option" id="divOption{{$option->id}}">
                            {{$option->content}}
                            <input type="radio" id="option{{$option->id}}" name="optionId" value="{{$option->id}}">
                        </label>
                    </div>
                </div>
            @endforeach
            
            <div class="div-button-send">
                <input class="button-vote" type="submit" value="Votar">
            </div>
        </form>
    </div>

    <style>
        body {
            background-color: #202024;
            color: white;
        }

        body header {
            justify-content: center;
            margin-bottom: 50px;
        }

        body header h1, h2, small{
            justify-content: center;
            display: flex;
        }
        
        .title {
            margin-top: 32px;
            margin-bottom: 24px;
            justify-content: center;
            display: flex;
            flex-direction: column;
        }

        .container form .div-option{
            width: 100%;
            justify-content: left;
            display: flex !important;
        }

        .container form .option {
            width: 100%;
            height: 50px;
            font-weight: 700;

            background: #9400d4;
            color: #FFFFFF;

            border-radius: 5px;
            margin: 12px 0 24px;

            cursor: pointer;
            transition: filter 0.2s;

            font-size: 16px;
            align-items: center;
            justify-content: center;
            display: flex;
        }

        .container .div-option .option:hover{
            filter: brightness(0.9);
        }

        .container .div-option .option:focus-within{
            border: solid 2px #1fd655;
        }

        body card:hover {
            filter: brightness(0.9);
        }

        .div-option input{
            opacity: 0;
        }

        .container {
            display: flex;
            align-items: center;
            flex-direction: column;
            width: 100%;
        }

        .container form{
            width: 50%;
            margin-top: 16px;
        }

        .container .content {
            width: 100%;
            align-items: center;
        }

        .container .div-button{
            width: 50%;
            justify-content: left;
            display: flex !important;
        }

        .container .div-button .button {
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
        
        .container .div-button .button:hover{
            filter: brightness(0.9);
        }

        .container .div-button-send{
            width: 100%;
            justify-content: left;
            display: flex !important;
        }

        .container .div-button-send .button-vote {
            width: 100%;
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


    </style>
</body>
</html>