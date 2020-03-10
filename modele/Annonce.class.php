<?php



/**
 *
 */
class Annonce
{

  function __construct()
  {
    // code...
  }

  function dateLisible(){

    $date = date_create();
    date_timestamp_set($date, $this->dateHeure);
    $this->dateHeure = ' le '.date_format($date, 'd-m-Y').' à '.date_format($date, 'H:i');
  }
}

 ?>
