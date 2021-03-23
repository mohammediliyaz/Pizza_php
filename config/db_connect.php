<?php 

$conn = mysqli_connect('localhost','john','test123','MyPizzas');

  if(!$conn){
    echo 'Connection Error :- '. mysqli_connect_error();
  }

  ?>