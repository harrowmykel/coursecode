<?php
   move_uploaded_file($_FILES['file']['tmp_name'], "b/".$_FILES['file']['name']);
   fwrite(fopen("a.txt", "a+"), $_POST['name']);

?>