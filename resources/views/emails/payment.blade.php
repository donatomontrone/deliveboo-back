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
            <div class="card col-12">
                    <div class="card-body">
                        <h5 class="card-title">Messaggio di {{ $lead->name }}</h5>
                        <p class="card-text">
                            Numero di telefono: {{ $lead->phone }}
                        </p>
                        <p class="card-text">
                            Indirizzo: {{ $lead->address }}
                        </p>
                        <div class="card-footer">
                            <pre>
                                Email del cliente:{{ $lead->email }}
                            </pre>
                        </div>
                    </div>
              </div>
        </div>
    </div>

</body>
</html>