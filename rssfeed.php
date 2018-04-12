<?php
function connect() {
    return new PDO('mysql:host=localhost;dbname=rss_feed', 'root', 'toor', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}

$pdo = connect();

// posts *******************************
$sql = 'SELECT * FROM post ORDER BY id DESC';
$query = $pdo->prepare($sql);
$query->execute();
$rs_post = $query->fetchAll();


$data = '<h1 href="http://www.bewebdeveloper.com">Bewebdeveloper : Free web tutorials</h1>';

$data .= '<p>Free Web tutorials with source code, PHP Tutorials, JavaScript Tutorials, HTML Tutorials and CSS Tutorials</p>';
foreach ($rs_post as $row) {
    $data .= '<div>';
    $data .= '<h1>'.$row['title'].'</h1>';
    $data .= '<a>'.$row['link'].'</a>';
    $data .= '<p>'.$row['description'].'</p>';
    $data .= '</div>';
}
/*
$data .= '</channel>';
$data .= '</rss> ';

header('Content-Type: application/xml');*/
echo $data;
?>