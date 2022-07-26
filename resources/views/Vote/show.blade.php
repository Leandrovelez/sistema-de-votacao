<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/8d70dac4bc.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>{{$vote->title}}</title>
</head>
<body>
    <header class="title">
        <h1>{{$vote->title}}</h1>
        <h2>{{$vote->question}}</h2>
        <?php
            $startDate = new DateTime( $vote->start_date);
            $endDate = new DateTime( $vote->end_date);
        ?>
        <small>De {{$startDate->format('d-m-Y')}} às {{ $vote->start_time }}</small>
        <small>Até {{$endDate->format('d-m-Y')}} às {{ $vote->end_time }}</small> 
    </header>
    <div class="container">
        <div class="back">
            <button class="return-button" onClick="(location.href='{{route('vote.index')}}')">
                <i class="fa-solid fa-arrow-left-long"></i>
                Voltar
            </button>
        </div>
        @foreach($options as $option)
            <div class="content">
                <card class="card-option">
                    <label>{{$option->content}}</label>
                    <small id="votesCount">{{ isset($answers[$option->id]) ? $answers[$option->id] : 0 }} votos</small>
                </card>
            </div>
        @endforeach
        
        <div class="content">
            <div class="row">
                <div class="col-sm-12 col-md-4 col-xl-4">
                    <?php 
                        $timeZone = new DateTimeZone("America/Sao_Paulo");
                        $now = new DateTime("now", $timeZone);
                        
                        $dateNow = $now->format('Y-m-d');
                        $timeNow = $now->format('H:i');
                    ?>

                    @if($vote->start_date <= $dateNow && $vote->end_date >= $dateNow)
                        @if($vote->start_date == $dateNow || $vote->end_date == $dateNow)
                            @if($vote->start_time > $timeNow && $vote->start_date == $dateNow)
                                <button type="button" class="send-disabled" disabled>
                                    <i class="fas fa-clipboard-list"></i>
                                    Votar
                                </button>
                            @elseIf($vote->end_time < $timeNow && $vote->end_date == $dateNow)
                                <button type="button" class="send-disabled" disabled>
                                    <i class="fas fa-clipboard-list"></i>
                                    Votar
                                </button>
                            @else
                                <button type="button" class="send" onclick="location.href='{{route('vote.voting', $vote->id)}}'">
                                    <i class="fas fa-clipboard-list"></i>
                                    Votar
                                </button>
                            @endif
                        @else
                            <button type="button" class="send" onclick="location.href='{{route('vote.voting', $vote->id)}}'">
                                <i class="fas fa-clipboard-list"></i>
                                Votar
                            </button>
                        @endif
                    @elseIf( $vote->start_date >= $dateNow)
                        <button type="button" class="send-disabled" disabled>
                            <i class="fas fa-clipboard-list"></i>
                            Votar
                        </button>
                    @else
                        <button type="button" class="send-disabled" disabled>
                            <i class="fas fa-clipboard-list"></i>
                            Votar
                        </button>
                    @endif
                    
                </div>
                <div class="col-sm-12 col-md-4 col-xl-4">
                    <button type="button" class="send" onclick="location.href='{{route('vote.edit', $vote->id)}}'">
                        <i class="fas fa-edit"></i>
                        Editar
                    </button>
                </div>
                <div class="col-sm-12 col-md-4 col-xl-4">
                    <button type="button" class="send"  data-toggle="modal" data-target="#deleteModal">
                        <i class="fas fa-trash"></i>
                        Deletar
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Confirm delete modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Excluir votação</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="modal-close" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Tem certeza que deseja excluir a votação <strong>{{$vote->title}}</strong>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <form method="POST" action="{{route('vote.delete', $vote->id)}}">
                    @csrf
                        <input type="submit" class="btn btn-primary" value="Confirmar" />
                    </form>
                </div>
            </div>
        </div>
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

        .container {
            display: flex;
            align-items: center;
            flex-direction: column;
            width: 100%;
        }
        
        .container .content {
            width: 50%;
            align-items: center;
            justify-content: center;
            display: flex !important;
            justify-content: space-between;
        }

        .container .content .card-option {
            background-color: #9400D3;
            min-width: 100px;
            width: 95%;
            height: auto;
            min-height: 50px;
            margin: 0px 12px 24px 0px;
            border-radius: 10px;
            padding: 24px;
            align-items: center;
            display: flex;
            justify-content: space-between;
        }
        
        .container .send {
            width: 100%;
            padding: 24px;
            font-weight: 700;

            background: #EA4C89;
            color: #FFFFFF;

            border-radius: 5px;
            margin: 12px 0 12px;
            border: none;

            cursor: pointer;
            transition: filter 0.2s;

            font-size: 16px;
        }

        .container .send:hover {
            filter: brightness(0.9);
        }

        .container .send-disabled {
            width: 100%;
            padding: 24px;
            font-weight: 700;

            background: #6b757f;
            color: #FFFFFF;

            border-radius: 5px;
            margin: 12px 0 12px;
            border: none;

            font-size: 16px;
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

        .modal-content{
            background-color: #191a1c;
        }

        .modal-header, .modal-footer{
            border: none;
        }
 
        .modal-close {
            color: white;
        }

        .row{
            width: 100%;
        }

    </style>
    <script>
        $('#deleteModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        })

    </script>
</body>
</html>