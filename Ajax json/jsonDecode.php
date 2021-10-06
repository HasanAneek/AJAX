<?php

$json_string = "json/my.json";
$jsondata = file_get_contents( $json_string );
$arr = json_decode( $jsondata, true );

echo '<table border="1" cellpadding="10" cellspacing="0" width="100%">
<tr>
   <th>Id</th>
   <th>Name</th>
   <th>Age</th>
   <th>Gender</th>
   <th>Country</th>
</tr>';
foreach ( $arr as list( "id" => $id, "name" => $name, "age" => $age, "gender" => $gender, "country" => $country ) ) {
    echo "<tr><td>{$id}</td><td>{$name}</td><td>{$age}</td><td>{$gender}</td><td>{$country}</td></tr>";
}

echo '</table>';
// echo "<pre>";
// print_r( $arr );
// echo "</pre>";