<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment email</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <div class="row p-5">
            <div class="card">
                <img src="http://www.riccardonestola.com/wp-content/uploads/2023/04/logo_deliveboo.svg" class="img-fluid card-img-top" alt="">
                <div class="card-body">
                    <span>Ciao {{$lead->name}} ti confermiano che il tuo ordine è stato accettato con la registrazione con l'email "{{$lead->email}}"</span>
                </div>
              </div>
        </div>
    </div>

</body>
</html>