<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JSON Formating PHP file </title>
</head>
<body>
    <div id="main">
        <div id="header">
            <h1>PHP with Ajax & JSON</h1>
        </div>
        <div id="load_data">
            <table id="table_data" border="1" cellpadding="10px" cellspacing="0" width="100%">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Sex</th>
                    <th>Country</th>
                </tr>
            </table>
        </div>
    </div>
    <script src="../js/jquery.js"></script>
    <script>
        $.ajax({
            url:"fetchJson.php",
            type:"POST",
            // data:{id:2},
            dataType:"JSON",
            success:function(data){
                $.each(data,function(key,value){
                $("#table_data").append("<tr><td>"+value.id + "</td><td> "+value.name + "</td><td> "+value.age+"</td><td> "+value.gender+"</td><td> "+value.country + "</td></tr>" );
            })
        }
        });

        // $.getJSON(
        //     "fetchJson.php",
        //     function(data){
        //         // console.log(data);
        //         $.each(data,function(key,value){
        //             $("#load_data").append(value.id + " "+value.name + " "+value.age+" "+value.gender+" "+value.country +"<br>");
        //         });
        //     }
        // );
    </script>
</body>
</html>