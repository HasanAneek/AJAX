<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <table id="prime">
        <tr id="header">
            <td><h1>PHP with Ajax</h1>
        <div id="search_bar">
            <label">Search</label>
            <input type="text" id="search" autocomplete="off">
        </div>
        </td>
        </tr>
        <tr>
            <td id="table-form">
                <form id="addForm">
                    First Name: <input type="text" id="fname">
                    Last Name<input type="text" id="lname">

                <input type="submit" id="save_button" value="Save">
                </form>
            </td>
        </tr>
        <tr>
            <td id="table-data"></td>
            <td id="loadData"></td>
        </tr>
        <tr>
        <td>
        
        </td>
        </tr>
    </table>
    


    <div id="error_message"></div>
    <div id="success_message"></div>

    <div id="modal">
        <div id="modal_form">
            <h2>Edit Form</h2>
            <table cellpadding="10px" width="100%">
            </table>
            <div id="close_btn">X</div>
        </div>
    </div>
    

    <script  src="js/jquery.js"></script>
    <script>
        $(document).ready(function(){
            //Load table data Record
            function loadTable(){
                $.ajax({
                url:"ajax_load.php",
                type:"POST",
                success:function(data){
                    $("#table-data").html(data);
                }
            });
            }
            loadTable();

            //Insert New Record
            $("#save_button").on("click",function(e){
                e.preventDefault();
                var fname = $("#fname").val();
                var lname = $("#lname").val();

                if(fname =="" || lname==""){
                    $("#error_message").html("All fields are required.").slideDown();
                    $("#success_message").slideUp();
                }else{
                    $.ajax({
                    url:"ajax_insert.php",
                    type:"POST",
                    data:{first_name:fname,last_name:lname},
                    success:function(data){
                        if(data ==1){
                            loadTable();
                            $("#addForm").trigger("reset");
                            $("#success_message").html("Data Inserted Successfully.").slideDown();
                            $("#error_message").slideUp();
                        }else{
                            $("#error_message").html("Cant save Record.").slideDown();
                            $("#success_message").slideUp();
                        }
                    }
                  });
                }
            });

            //Delete Data Record
        $(document).on("click",".delete_btn",function(){
            if(confirm("Do you really delete this record")){
                        var studentId = $(this).data("id");
                        var element = this;
                        $.ajax({
                            url:"ajax_delete.php",
                            type:"POST",
                            data:{id:studentId},
                            success:function(data){
                                if(data == 1){
                                    $(element).closest("tr").fadeOut();
                                }else{
                                    $("#error_message").html("Can'T Delete record.").slideDown();
                                    $("#success_message").slideUp();
                                }
                            }
                        });
                    }
                    });
                    //Show Modal Box
                    $(document).on("click",".edit_btn",function(){
                        $("#modal").show();
                        var studentId = $(this).data("eid");
                        $.ajax({
                            url:"update_form.php",
                            type:"POST",
                            data:{id:studentId},
                            success:function(data){
                                $("#modal_form table").html(data);
                            }
                        });
                    });

                    //Hide Model Box
                    $("#close_btn").on("click",function(){
                        $("#modal").hide();
                    });

                    //save Modal Update form
                    $(document).on("click","#edit_submit",function(){
                        var stuId = $("#edit_id").val();
                        var fname = $("#edit_fname").val();
                        var lname = $("#edit_lname").val();

                        $.ajax({
                            url:"ajax_updateform.php",
                            type:"POST",
                            data:{id:stuId,first_name:fname,last_name:lname},
                            success:function(data){
                                if(data == 1){
                                $("#modal").hide();
                                loadTable();
                                }
                            }
                        });
                    });
                    //Live Search
                    $("#search").on("keyup",function(){
                        var search_term = $(this).val();

                        $.ajax({
                            url:"ajax_livesearch.php",
                            type:"POST",
                            data:{search:search_term},
                            success:function(data){
                                $("#table-data").html(data);
                            }
                        });
                    });
        });
                    //pagination
                    $(document).ready(function(){
            function loadTable(page){
                $.ajax({
                    url:"ajax_page.php",
                    type:"POST",
                    data:{page_no:page},
                    success:function(data){
                        $("#table-data").html(data);
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