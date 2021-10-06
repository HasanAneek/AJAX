<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax Pagination</title>
    <link rel="stylesheet" href="css/style2.css">
</head>
<body>
    <div id="main">
        <div id="header">
            <h1>AJax Pagination</h1>
        </div>

        <div id="table_data"></div>

    </div>

    <script src="js/jquery.js"></script>
    <script>
        $(document).ready(function(){
            function loadTable(page){
                $.ajax({
                    url:"ajax_pagination.php",
                    type:"POST",
                    data:{page_no:page},
                    success:function(data){
                        $("#table_data").html(data);
                    }
                });
            }
            loadTable();
            //Pagination Part
            $(document).on("click","#pagination a",function(e){
                e.preventDefault();
                var page_id = $(this).attr("id");

                loadTable(page_id);
            });
        });
    </script>

</body>
</html>