<?php
$conn = mysqli_connect( "localhost", "root", "", "student" ) or die( "Connection Unsuccessful" );

$page = "";
if ( isset( $_POST['page_no'] ) ) {
    $page = $_POST['page_no'];
} else {
    $page = 1;
}
$page_per_page = 4;
$offset = ( $page - 1 ) * $page_per_page;

$sql = "SELECT * FROM intro LIMIT {$offset},{$page_per_page}";
$result = mysqli_query( $conn, $sql ) or ( "Sql Uncessful" );

$output = "";
if ( mysqli_num_rows( $result ) > 0 ) {
    $output .= '<table border="1" cellspacing="0" cellpadding="10px" width="100%">
    <tr>
     <td width="100px">Id</td>
    <td>Name</td>
    </tr>';
    while ( $row = mysqli_fetch_assoc( $result ) ) {
        $output .= "<tr>
            <td>{$row['id']}</td><td>{$row['first_name']} {$row['last_name']}</td>
        </tr>";
    }
    $output .= "</table>";

    $sql_total = "SELECT * FROM intro";
    $record = mysqli_query( $conn, $sql_total );
    $total_record = mysqli_num_rows( $record );
    $total_page = ceil( $total_record / $page_per_page );

    $output .= "<div id='pagination'>";
    for ( $i = 1; $i <= $total_page; $i++ ) {
        $output .= "<a class='active' id='{$i}' href=''>{$i}</a>";
    }
    $output .= '</div>';
    echo $output;
} else {
    echo " <h2>No data Found</h2> ";
}