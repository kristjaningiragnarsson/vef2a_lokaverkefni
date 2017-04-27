
<?php
   require 'conn.php';
    if(empty($_SESSION['name']))//hérna nær hann i name fra login siðunni
        header('Location: login.php');
if (isset($_POST['upload'])) {


$uploaddir = "/var/www/html/verkefni/myndir/".basename($_FILES['image']['name']);
$db = mysqli_connect("127.0.0.1","root","XX.visor.XX23","vef2a_lokaverkefni");
$image = $_FILES['image']['name'];
$text = $_POST['name'];
$sql = "INSERT INTO images (image, text) VALUES ('$image', '$text')";
mysqli_query($db, $sql);
echo '<pre>';
if (move_uploaded_file($_FILES['name']['tmp_name'], $uploaddir)) {
    echo "myndinn er uploaduð";
} 
else {
    echo "myndinn þáði ekki að uploada";
}

echo 'Here is some more debugging info:';
print_r($_FILES);

print "</pre>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>PHP Solution 6-1</title>
</head>

<body>

    <form action="upload.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="size" value="1000000">
        <div>
            <label for="image">Upload image:</label>
            <input type="file" name="image">
        </div>
          <div>
              <textarea name="text" cols="40" rows="4" placeholder="segðu einhvað um þessa mynd"></textarea>
          </div>
        <div>
            <input type="submit" name="upload" value="Upload">
        </div>
    </form>
</body>
</html>
