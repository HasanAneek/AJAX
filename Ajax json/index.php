<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Json data </title>
</head>
<body>
    <div id="main">
        <div id="header">
            <h1>Read Json data</h1>
        </div>
        <div id="load_data"></div>
    </div>

    <script src="../js/jquery.js"></script>
    <script>
        $(document).ready(function(){
            $.ajax({
                url:"https://jsonplaceholder.typicode.com/posts",
                type:"GET",
                success:function(data){
                    // console.log(data);
                    // $("#load_data").append("Id: "+ data.id + ", <br>" +" Title: " + data.title +", <br>" + "Body: " + data.body);
                    $.each(data,function(key,value){
                        $("#load_data").append("Id:"+value.id +" Title: "+ value.title + "<br>");
                    });
                }
            });
        });
    </script>
</body>
</html>