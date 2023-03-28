<html>
<body>

<?php

if ($_REQUEST["islem"]=="yaz" and $_SERVER["REQUEST_METHOD"] == "POST"){


$adi = $_POST["name"];
$eposta= $_POST["email"];

echo "<br> Adı:" .$adi;
echo "<br> E mail adresi: ".$eposta;
}

?>

<form action="?islem=yaz" method="post">

    Name: <input type="text" name="name"><br>
    E-mail: <input type="email" name="email"><br>
    Cinsiyet: <input type="radio" name="cins" value="Bay"> Bay <input type="radio" name="cins" value="Bayan"> Bayan

    <input type="submit">

</form>

**kaydetme formu**
<form action="?islem=kaydet" method="post">

    Name: <input type="text" name="name"><br>
    E-mail: <input type="text" name="email"><br>

    <input type="submit">

</form>

</body>
</html>
