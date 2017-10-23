<?php
function upload() {
  $_FILES["afbeelding"] = $_SESSION["afbeelding"];
  $target_dir = "../uploads/";
  $target_file = $target_dir . basename($_FILES["afbeelding"]["name"]);
  $uploadOk = 1;

  $check = getimagesize($_FILES["afbeelding"]['tmp_name']);
  if ( $check !== FALSE ) {
    echo "Bestand is een foto - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "Bestand is geen foto";
    $uploadOk = 0;
  }

  if ( $uploadOk == 0 ) {
    echo "Oeps hij is helaas niet geupload";
  } else {
    if ( move_uploaded_file($_FILES["afbeelding"]["tmp_name"], $target_file) ) {

    } else {
      echo "Oeps er ging iets fout";
    }
  }

}
