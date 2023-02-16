<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Vincenzo Volpe">
    
    <title>SKUOLA.NET TECH TEST</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    
  </head>
  <body>
    
<main>
  <h1 class="visually-hidden">TECH TEST</h1>

  <div class="px-4 py-5 my-5">
    <img class="d-block mx-auto mb-4 img-fluid" src="skuolanet_logo.png" alt="">
    <h1 class="display-5 fw-bold text-center">TECH TEST</h1>
    <div class="col-lg-5 mx-auto">
      <p class="lead mb-4 text-center">Verificare che un anagramma di una stringa sia contenuto in un'altra stringa.</p>
      

      <form id="form_anagramma" method="post" class="form-horizontal" >
           
        <div class="form-group">
          <label class="col-lg-3 control-label mb-2">Prima Stringa</label>
          <div class="col-lg-12 mb-3">
              <input type="text" class="form-control item" name="primastringa" id="primastringa"placeholder = "Inserisci una stringa (min 2, max 1024)" minlength="2" maxlength="1024" pattern="[a-zA-Z]+" required>
          </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3 control-label mb-2">Seconda Stringa</label>
            <div class="col-lg-12 mb-3">
              <input type="text" class="form-control item" name="secondastringa" id="secondastringa" placeholder = "Inserisci una stringa (min 2, max 1024)" minlength="2" maxlength="1024" pattern="[a-zA-Z]+" required>
            </div>
        </div>
        
        <div class="form-group">
          <div class="col-lg-12 text-center mb-3">
              <button type="submit" class="btn btn-primary" id="btn_anagramma">Verifica</button>
          </div>
        </div>
        
      </form>

    </div>
  </div>
</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script src="anagramma.js"></script>
      
  </body>
</html>
