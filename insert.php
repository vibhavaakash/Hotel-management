<?php
$pd=new PDO('mysql:host=localhost;dbname=hotel','root','');
for($i=1;$i<22;$i++)
{
$p=$pd->prepare('update rooms set names="-",phno="-",address="-",checkin="-",child=0');
$p->execute();
}
?>