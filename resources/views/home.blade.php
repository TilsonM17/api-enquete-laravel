<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Api Enquete Docs</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
   
</head>
<body>
    <div id="app" class="container">
        <div class="px-4 pt-5 my-5 text-center border-bottom">
            <h1 class="display-4 fw-bold">Api de Enquete</h1>
            <div class="col-lg-6 mx-auto">
              <p class="lead mb-4">Esta api foi criada em Laravel. Sinta a vontade para comsumir ela.</p>
              <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
                <a  href="https://github.com/TilsonM17/api-enquete-laravel" target="_blank" class="btn btn-primary btn-lg px-4 me-sm-3">Docs</a>
                <a target="_blank" href="{{route("poll.show",['poll' => 1])}}" class="btn btn-outline-secondary btn-lg px-4">Consultar</a>
              </div>
            </div>
            <div class="overflow-hidden" style="max-height: 30vh;">
            </div>
          </div>
    </div>
    
    
</body>
</html>