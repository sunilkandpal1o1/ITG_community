<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rss_feed";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


//$timezone=date_default_timezone_get();
//echo $_POST['comment'];
if($_POST['comment']!="")
{
    $sql = "INSERT INTO post (link,description)
    VALUES ('".date('Y-m-d H:i:s')."','".$_POST['comment']."')";

    if ($conn->query($sql) === TRUE) {
        //echo $timezone;
        header('location: home_page.php');
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
$conn->close();
}
else{
    echo '<script language="javascript">';
echo 'alert("empty post")';
echo '</script>';

}
header('location: home_page.php');
?>