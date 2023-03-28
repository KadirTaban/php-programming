<html>
<head>

    <title> Php Database İşlemleri </title>

</head>

<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=medikal", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

<form action="?islem=ekle" method="post">
    Adı : <input type="text" name="name" >
    Soyadı : <input type="text" name="surname">
    Sikayeti: <input type="text" name="trouble">

    <input type="submit" value="Kaydet">
</form>

<?php
//Create Command.
if($_REQUEST['islem']=="ekle")
{
    $name=$_REQUEST['name'];
    $surname=$_REQUEST['surname'];
    $trouble=$_REQUEST['trouble'];
    $sql="INSERT INTO hasta(name,surname,trouble) VALUES ('$name','$surname','$trouble')";
    $conn->exec($sql);
    echo "Ekleme Yapıldı";
    header("Location: ?islem=eklendi");
}

//Delete command.
if($_REQUEST['islem']=="sil")
{
    $id = $_REQUEST['id'];
    $sql="DELETE FROM hasta WHERE Id=$id";
    $conn->exec($sql);
    header("Location: ?islem=silindi");
}
?>

************* Hasta Listesi ************* <BR>
<table border="1" width="400">
    <tr>
        <td>Adi</td>
        <td>Soyadi</td>
        <td>Trouble</td>
        <td>SİLME</td>
    </tr>

<?php
$sql = "SELECT * FROM hasta";

foreach($conn->query($sql) as $veri){
?>
    <tr>
        <td> <?=$veri['name']?> </td>
        <td> <?=$veri['surname']?> </td>
        <td> <?=$veri['trouble']?> </td>
        <td> <a href="?islem=sil&id=<?=$veri['Id']?>">SİL</a> </td>
    </tr>
<?php
}
?>
</table>

</body>
</html>
