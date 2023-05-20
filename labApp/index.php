<?php


$baglan = mysqli_connect("localhost","root","","lab_app");
if (!$baglan)
{
    die("connection failed:".mysqli_connect_error());
}
else
{
    echo "bağlantı başarılı";
}
?>



    <head>
        <meta charset="UTF-8">
        <title>Lab Application</title>
    </head>



    <form action="" method="post">
        <label for="fname">Full name:</label><br>
        <input type="text" id="fname" name="fname"><br>
        <label>E-mail:</label><br>
        <input type="email" id="email" name="email"><br>
        <br>
        Gender:
        <br>
        <input type="radio" id="female" name="gender" value="female">
        <label for="female">Female</label><br>
        <input type="radio" id="male" name="gender" value="male">
        <label for="male">Male</label><br>
        <br>
        <input type="submit" value="Submit" name="submit">
    </form>

<?php

if (isset($_POST["submit"]))
{
    $fname = $_POST["fname"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];

    $sql="INSERT INTO `students`( `fullname`, `email`, `gender`) VALUES ('$fname','$email','$gender')";
    $result = mysqli_query($baglan,$sql);

    if ($result)
    {
         echo "verimiz eklendi.";
    }
    else
    {
        echo '<div style="atsc-dynamic-refresh: 4" class="alert alert-danger">! UYARI !<br>Modülünüz oluşturulurken bir sorunla karşılaşıldı.Sorunlar şunlar olabilir.<br>
              -Boş alan olabilir.<br>
              -Aynı isimde mevcut bir kayıdınız olabilir.<br>
              -Sistemsel bir sorun oluşmuş olabilir.</div>';
    }
}
?>