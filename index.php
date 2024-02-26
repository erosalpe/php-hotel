<?php
    $hotels = [
        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];
    $votoScelto = $_GET['voto'];
    $parkScelto = $_GET['parcheggio'];
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=S, initial-scale=1.0">
    <title>php-hotel</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css' integrity='sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==' crossorigin='anonymous'/>
</head>
<body>
    <form action="index.php">
        <label for="fname">Voto</label>
        <input type="number" id="voto" name="voto"><br><br>
        <label for="lname">Parcheggio</label>
        <input type="radio" id="parcheggio" name="parcheggio"><br><br>
        <button>Cerca!</button>
    </form>
    <div class="d-flex gap-5">
        <?php foreach($hotels as $element): ?>
            <?php
                if(isset($votoScelto) && isset($parkScelto)){
                    if(($element['parking'] == true && $parkScelto == 'on') && ($element['vote'] >= $votoScelto)){
                        $attivo = 'd-block';
                    } else {
                        $attivo = 'd-none';
                        $x++;
                    }
                } elseif (isset($votoScelto)) {
                    if($element['vote'] >= $votoScelto){
                        $attivo = 'd-block';
                    } else {
                        $attivo = 'd-none';
                        $x++;
                    }
                } elseif (isset($parkScelto)) {
                    if($element['parking'] == true && $parkScelto == 'on'){
                        $attivo = 'd-block';
                    } else {
                        $attivo = 'd-none';
                        $x++;
                    }
                }
            ?>
        <div class="card <?= $attivo; ?>" style="width: 18rem;">
            <img src="https://picsum.photos/200" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?=$element['name']?></h5>
                <h6>Descrizione:</h6>
                <p class="card-text"><?=$element['description']?></p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Parcheggio: <?php echo ($element['parking'] == true) ? 'Si' : 'No'; ?></li>
                <li class="list-group-item">Voto: <?=$element['vote']?></li>
                <li class="list-group-item"> Distanza dal centro: <?=$element['distance_to_center']?></li>
            </ul>
        </div>
        <?php endforeach; ?>
        <?php
        if($x == count($hotels)){
            echo "<h2>Non esistono risultati che soddisfano la ricerca</h2>";
        }
        ?>
    </div>
</body>
</html>