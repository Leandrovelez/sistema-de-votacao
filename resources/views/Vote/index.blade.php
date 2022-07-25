<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/8d70dac4bc.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https: //fonts.googleapis.com/css2? family= Roboto:ital,wght@0,400;0,500;1,700 & display=swap" rel="stylesheet">
    <title>Votação</title>
</head>
<body>
    <div class="container">
        <header class="title">
            <h1>Votações</h1>
        </header>
        
        <button type='button' onClick="(location.href='{{route('vote.create')}}')">Criar nova votação</button>
        
        @foreach($votes as $vote)
            <card onClick="(location.href='{{route('vote.show', $vote->id)}}')">
                <header>
                    <strong>{{$vote->title}}</strong>
                </header>
                <div class="card-content">
                    <div class="date">
                        <?php
                            $startDate = new DateTime( $vote->start_date);
                            $endDate = new DateTime( $vote->end_date);
                        ?>
                        <small>De {{$startDate->format('d-m-Y')}} às {{ $vote->start_time }}</small><br>
                        <small>Até {{$endDate->format('d-m-Y')}} às {{ $vote->end_time }}</small> 
                    </div>
                    
                    <div class="icon">
                        <?php 
                            $timeZone = new DateTimeZone("America/Sao_Paulo");
                            $now = new DateTime("now", $timeZone);
                            
                            $dateNow = $now->format('Y-m-d');
                            $timeNow = $now->format('H:i');
                        ?>

                        @if($vote->start_date <= $dateNow && $vote->end_date >= $dateNow)
                            @if($vote->start_date == $dateNow || $vote->end_date == $dateNow)
                                @if($vote->start_time > $timeNow && $vote->start_date == $dateNow)
                                    <i class="fa-solid fa-clock"></i> Não iniciado
                                @elseIf($vote->end_time < $timeNow && $vote->end_date == $dateNow)
                                    <i class="fa-solid fa-calendar-xmark"></i> Encerrado
                                @else
                                    <i class="fa-solid fa-calendar-check"></i> Em andamento
                                @endif
                            @else
                                <i class="fa-solid fa-calendar-check"></i> Em andamento
                            @endif
                        @elseIf( $vote->start_date >= $dateNow)
                            <i class="fa-solid fa-clock"></i> Não iniciado
                        @else
                            <i class="fa-solid fa-calendar-xmark"></i> Encerrado
                        @endif

                        <!-- @if($vote->start_date <= $dateNow && $vote->end_date >= $dateNow)
                            @if($vote->start_date == $dateNow || $vote->end_date == $dateNow)
                                @if($vote->start_time <= $timeNow && $vote->end_time >= $timeNow)
                                    <i class="fa-solid fa-calendar-check"></i> Em andamento
                                @elseIf($vote->start_time > $timeNow)
                                    <i class="fa-solid fa-clock"></i> Não iniciado 1
                                @else
                                    <i class="fa-solid fa-calendar-xmark"></i> Encerrado
                                @endif
                            @else
                                <i class="fa-solid fa-calendar-check"></i> Em andamento
                            @endif
                        @elseIf( $vote->start_date >= $dateNow)
                            <i class="fa-solid fa-clock"></i> Não iniciado
                        @else
                            <i class="fa-solid fa-calendar-xmark"></i> Encerrado
                        @endif -->

                    </div>

                </div>
            </card>
            <br>
        @endforeach
        <div class="row justify-content-center">
            {{ $votes->links() }}
        </div>
        
    </div>
    

    <style>
        body {
            background-color: #202024;
            color: white;
        }

        body card {
            background-color: #9400D3;
            width: 50%;
            height: auto;
            min-height: 100px;
            margin-bottom: 24px;
            border-radius: 10px;
            padding: 24px;
            align-items: center;
            cursor: pointer;
            transition: filter 0.2s;
        }

        body card:hover {
            filter: brightness(0.9);
        }

        body card header {
            height: 50px;
            width: 100%;
            font-size: 18px;
        }
        
        body card .card-content{
            width: 100%;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: space-between;

        }

        .container {
            display: flex;
            align-items: center;
            flex-direction: column;
        }

        
        .container .title {
            margin-top: 16px;
            margin-bottom: 16px;
        }

        .container button {
            width: 40%;
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

        .container button:hover{
            filter: brightness(0.9);
        }

        .date {
            width: 60%;
        }

        .icon {
            width: 40%;
            padding-top: 8px;
        }

        
        .icon i{
            height: 50px;
            width: 50px;
            margin-right: 8px;
        }

    </style>
</body>
</html>