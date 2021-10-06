<?php
$conn = mysqli_connect( "localhost", "root", "", "ajax_form" ) or die( "Connection Failed" );
$sql = "SELECT * FROM students";
$result = mysqli_query( $conn, $sql ) or die( "Query Failed" );

$output = mysqli_fetch_all( $result, MYSQLI_ASSOC );
$json_data = json_encode( $output,JSON_PRETTY_PRINT );
$json_file = "my-" . date( "d-m-Y" ) . ".json";

if ( file_put_contents( "json/{$json_file}", $json_data ) ) {
    echo "{$json_file} Json file successfully created";
} else {
    echo "{json_file} didn't created yet";
}