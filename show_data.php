<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax Document</title>
</head>
<body>
    <table>
        <tr>
            <td><h1>PHP with Ajax</h1></td>
        </tr>
        <tr>
            <td id="main">
                <button>Load Data</button>
            </td>
        </tr>
        <tr>
            <td id="menu"></td>
        </tr>
    </table>
    <script src="js/jquery.js"></script>
    <script>
        $(document).ready(function(e){
            $("#main").on("click",function(){
                $.ajax({
                url:"ajax_load.php",
                type:"POST",
                success:function(data){
                    $("#menu").html(data);
                }
            });
            });
        });
    </script>
</body>
</html>