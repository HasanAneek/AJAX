<?php
if ( $_POST['fullname'] != "" && $_POST['age'] != "" && $_POST['city'] != "" ) {
    if ( file_exists( "json/student.json" ) ) {
        $current_data = file_get_contents( "json/student.json" );
        $array_data = json_decode( $current_data, true );
        $new_data = array(
            'name' => $_POST['fullname'],
            'age'  => $_POST['age'],
            'city' => $_POST['city'],
        );
        $array_data[] = $new_data;
        $json_data = json_encode( $array_data, JSON_PRETTY_PRINT );
        if ( file_put_contents( "json/student.json", $json_data ) ) {
            echo "Json Successfull";
        } else {
            echo "Json Unsuccessful JSON";
        }

    } else {
        echo "Json file doesn't exist";
    }
} else {
    echo "<h3>Please Fillup all the form.</h3>";
}