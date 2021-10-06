<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax Form Pagination</title>
    <link rel="stylesheet" href="../css/style3.css">
</head>
<body>
    <div id="main">
        <div id="header">
            <h1>PhP & Ajax Serialization Form</h1>
        </div>
    </div>

    <div id="table_data">
        <form id="submit_form">
            <table width="100%" cellpadding="10px"  cellspacing="0">
                <tr>
                    <td width="150px"> <label>Name</label> </td>
                    <td> <input type="text" name="fullname" id="fullname"> </td>
                </tr>
                <tr>
                    <td> <label>Age</label> </td>
                    <td> <input type="text" name="age" id="age"> </td>
                </tr>
                <tr>
                    <td><label>Gender</label></td>

                <td>
                    <input type="radio" name="gender" value="male"> Male
                    <input type="radio" name="gender" value="female"> Female
                </td>
                </tr>
                <tr>
                    <td><label>Country</label></td>
                    <td>
                        <select name="country">
                        <option value="ban">Bangladesh</option>
                        <option value="in">India</option>
                        <option value="pak">Pakistan</option>
                        <option value="sri">Srilanka</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td> <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit"> </td>
                </tr>
            </table>
        </form>
        <div id="response">
        </div>
    </div>

    <script src="../js/jquery.js"></script>
    <script>
        $(document).ready(function(){
            $("#submit").click(function(){
                var name = $("#fullname").val();
                var age = $("#age").val();

                if(name == "" || age =="" || !$('input:radio[name=gender]').is(':checked')){
                    $("#response").fadeIn();
                    $("#response").removeClass('success_message').addClass('error_message').html("All Fields Are Required!!!");
                    setTimeout(function(){
                        $("#response").fadeOut("slow");
                    },4000);
                }else{
                    $.ajax({
                        url:"saveForm.php",
                        type:"POST",
                        data:$("#submit_form").serialize(),
                        success:function(data){
                            $("#submit_form").trigger("reset");
                            $("#response").fadeIn(4000);
                            $("#response").addClass('success_message').removeClass('error_message').html(data);
                            setTimeout(function(){
                                $("#response").fadeOut("slow");
                            },4000);
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>