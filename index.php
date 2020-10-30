<?php
$url = "https://www.canalti.com.br/api/pokemons.json"; 
$pokemons = json_decode(file_get_contents($url));


?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pokemóns</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="Style.css">
  </head>
  <body>
  <img src="https://logos-world.net/wp-content/uploads/2020/05/Pokemon-Symbol.jpg" alt="Pokemon_Logo" style="width:20%;margin-left:500px;margin-top:50px">
      <div class="hero-body">
        <div class="container has-text-centered">
         
      </div>
      </div>
    <section class="container">
      <?php
      if(count($pokemons->pokemon)) {
      $i = 0;
      foreach($pokemons->pokemon as $Pokemon) {
      $i++;
      ?>
      <?php if($i % 4 == 1) { ?>
      <div class="columns">
      <?php } ?>
        <div class="column is-3">
          <div class="card ">
            <div class="card-image has-text-centered">
              <figure class="image is-128x128">
                <img src="<?php echo $Pokemon->img?>" alt="<?=$Pokemon->name?>" class="" data-target="modal-image2">
              </figure>
            </div>
            <div class="card-content has-text-centered">
              <div class="content">
                <h4><?php echo $Pokemon->name?></h4>
                <p>
                  <ul>
                  <?php
               
            if(isset($Pokemon->next_evolution)){
                    echo "evoluções: ";
                    foreach($Pokemon->next_evolution as $ProximaEvolucao) {
                        echo $ProximaEvolucao->name . ", ";
                      echo substr($ProximaEvolucao->name, 0, -1);
                       
                    }
                    echo ".";
                  }
                
               
                  
                  else {
                    echo "Não evolui mais.";
                  }
                  
                ?>
                </ul>
                </p>
              </div>
            </div>
          </div>
        </div>
      <?php if($i % 4 == 0) { ?>
      </div>
      <?php } } } 
       ?>

  </body>
</html>