<?php
$conn = mysqli_connect( "localhost", "root", "", "ajax_form" ) or die( "Connection Failed" );
$sql = "SELECT * FROM students";
// $sql = "SELECT * FROM students WHERE id={$_POST['id']}";  //Single value
$result = mysqli_query( $conn, $sql ) or die( "Can't Connect Query" );

$output = mysqli_fetch_all( $result, MYSQLI_ASSOC );

// echo "<pre>";
// print_r( $output );
// echo "</pre>";

echo json_encode( $output );