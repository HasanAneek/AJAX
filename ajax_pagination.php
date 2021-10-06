<?php
$conn = mysqli_connect( "localhost", "root", "", "student" ) or die( "Can't Connect" );

$limit_per_page = 5;
$page = "";
if ( isset( $_POST['page_no'] ) ) {
    $page = $_POST['page_no'];
} else {
    $page = 1;
}
$offset = ( $page - 1 ) * $limit_per_page;

$sql = "SELECT * FROM intro LIMIT {$offset},{$limit_per_page}";
$result = mysqli_query( $conn, $sql );

$output = "";
if ( mysqli_num_rows( $result ) > 0 ) {
    $output .= '<table border="1" width="100%" cellspacing="0" cellpadding="10px">
    <tr>
        <th width="150px">Id</th>
        <th>Name</th>
    </tr> ';

    while ( $row = mysqli_fetch_assoc( $result ) ) {
        $output .=
            "<tr>
            <td>{$row["id"]}</td><td>{$row["first_name"]} {$row["last_name"]}</td>
        </tr>";
    }
    $output .= "</table>";

    $sql_total = "SELECT * FROM intro";
    $records = mysqli_query( $conn, $sql_total );
    $total_record = mysqli_num_rows( $records );
    $total_page = ceil( $total_record/$limit_per_page );

    $output .= '<div id="pagination">';

    for ( $i = 1; $i <= $total_page; $i++ ) {
        $output .= "<a class='active' id='{$i}' href=''>{$i}</a>";
    }
    $output .= '</div>';
    echo $output;
} else {
    echo "<h2>No data Found</h2>";
}