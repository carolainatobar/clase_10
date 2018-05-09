<?php include('header.php');?>

<?php
$csv = array_map('str_getcsv', file('https://raw.githubusercontent.com/carolainatobar/clase_10/master/pelis.csv'));
      array_walk($csv, function(&$a) use ($csv) {
      $a = array_combine($csv[0], $a);
      });
      array_shift($csv);
?>

<main role="main" class="container">
<h1 class="mb-4">Algunas pelis que me gustan</h1>
<div class="row">

<?php for($t = 0; $t < count($csv); $t++){?> 
    <div class="col-sm-4 col-md-3 py-3">
    <?php  print '<h3><a href="'.($csv[$t]['url']).'">'.($csv[$t]['peli']).'</a></h3>';?>
    <h5>Año: <?php print($csv[$t]['year'])?></h5>
    

    
    <figure style="height:150px; overflow:hidden;">
    
    <img src="
    <?php if ($csv[$t]['imagen'] == NULL){
        print ("img/gris.png");
    } else {
        print ($csv[$t]['imagen']);
    };?>" 

    class="img-fluid">
    </figure>


    </div>
<?php };?>
</div>

</main>
<?php include('footer.php');?>