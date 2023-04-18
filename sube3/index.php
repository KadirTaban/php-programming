<?php
$servername = "localhost";
$username = "root";
$password = "";
$database="sube3";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

if($_REQUEST['islem']=="ekle")
    {
        $numara = $_REQUEST['numara'];
        $adsoy = $_REQUEST['adsoy'];
        $bolum = $_REQUEST['bolum'];
        $sql = "INSERT INTO ogrenci (numara,adsoy,bolum) VALUES ('$numara','$adsoy','$bolum')";
        $conn->exec($sql);
        echo "<br> Ekleme basarili";
        header("Location: ?durum=Eklendi");
    }


if($_REQUEST['islem']=="sil")
    {
        $id=$_REQUEST['id'];
        $sql="DELETE FROM ogrenci WHERE Id=$id";
        $conn->exec($sql);
        header("Location: ?durum=Silindi");
    }

if($_REQUEST['islem']=="duzenle" && $_SERVER['REQUEST_METHOD']=="POST")
{
    $id = $_REQUEST['id'];
    $numara = $_REQUEST['numara'];
    $adsoy = $_REQUEST['adsoy'];
    $bolum = $_REQUEST['bolum'];
    $sql = "UPDATE ogrenci SET numara =$numara ,adsoy='$adsoy',bolum='$bolum' WHERE Id = $id";
    $conn->exec($sql);
    echo "<br> Ekleme basarili";
    header("Location: ?durum=duzenlendi");
}


?>

<form action="?islem=ekle" method="POST">

    Adı Soyadı <input type="text" name="adsoy"> <br>
    Numarası <input type="text" name="numara"><br>
    Bölümü <select name="bolum">
        <option>Bilgisayar Muhendisliği</option>
        <option>Makine Muhendisliği</option>
        <option>Elektrik Muhendisliği</option>
        <option>Endüstri Muhendisliği</option>
    </select>
    <input type="submit" value="Kaydet">
</form>

<?php
if($_REQUEST['islem']=="duzenle"){
    $id = $_REQUEST['id'];
    $sql = "SELECT * FROM ogrenci WHERE Id=$id";
    $sonuc = $conn->prepare($sql);
    $sonuc->execute();
    $row = $sonuc->fetch(PDO::FETCH_ASSOC);
        if($sonuc->rowCount()>0){


?>
<form action="?islem=duzenle&id=<?=$row['Id'] ?>" method="POST">

    Adı Soyadı <input type="text" name="adsoy" value="<?=$row['adsoy']?>"> <br>
    Numarası <input type="text" name="numara" value="<?=$row['numara']?>"><br>
    Bölümü <select name="bolum">
        <option><?=$row['bolum']?></option>
        <option>Bilgisayar Muhendisliği</option>
        <option>Makine Muhendisliği</option>
        <option>Elektrik Muhendisliği</option>
        <option>Endüstri Muhendisliği</option>
    </select>
    <input type="submit" value="Kaydet">
</form>

<?php
        }
        else{
            echo"<br> Kayıt Bulunamadı";
        }
}
?>





<br> **** Ogrenci Listesi **** <br>
<table width="600" border="1" bgcolor="#7fffd4">
    <tr>
        <td>Id </td>
        <td>Numara </td>
        <td>Adı Soyadı </td>
        <td>Bölümü </td>
        <td> Düzenle </td>
        <td> SIL </td>

    </tr>
    <?php
    $sql = ("SELECT * FROM ogrenci");
    foreach ($conn->query($sql) as $row)
    {
    ?>
    <tr>
        <td><?=$row['Id'] ?> </td>
        <td><?=$row['numara'] ?> </td>
        <td><?=$row['adsoy'] ?> </td>
        <td><?=$row['bolum'] ?> </td>
        <td><a href="?islem=duzenle&id=<?=$row['Id']?>">Düzenle</a></td>
        <td><a href="?islem=sil&id=<?=$row['Id']?>" onclick="return confirm('Silmek istediğinizden emin misiniz ? ');"/>Sil</td>

    </tr>
    <?php
    }
    ?>


</table>
