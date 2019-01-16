 <!DOCTYPE html>
<html>
<body>

<?php

$contact = 'contact.txt';
$data = file_get_contents($contact); //Included contact.php in index.php and echoed $data

/*
$myfile = fopen("contact.txt", "r");
echo fread($myfile,filesize("contact.txt"));
fclose($myfile);
*/

?>

</body>
</html> 