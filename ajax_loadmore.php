<?php
$conn = mysqli_connect( "localhost", "root", "", "student" ) or die( "Connection failed" );
$limit = 5;
if ( isset( $_POST['page_no'] ) ) {
    $page = $_POST['page_no'];
} else {
    $page = 0;
}

$sql = "SELECT * FROM intro LIMIT {$page},{$limit}";
$result = mysqli_query( $conn, $sql );

$output = "";

if ( mysqli_num_rows( $result ) > 0 ) {
    $output .= '<table width="100%" cellspacing="0" cellpading="10px" border="1">
    <tbody>
      <tr>
        <th>Id</th>
        <th>Name</th>
     </tr>
    </tbody>
    <tbody id="pagination">
        <tr>
            <td colspan="2">
                <button id="ajaxbtn" data-id="">Load More</button>
            </td>
        </tr>
    </tbody>';

}