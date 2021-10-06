<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id="main">
        <div id="header">
            <h1>Save From data in JSON File</h1>
        </div>
        <div id="table_data">
            <form id="submit_form" method="post" action="save_form.php">
                <tr>
                    <td width="150px">Name</td>
                    <td> <input type="text" name="fullname" autocomplete="off"> </td>
                </tr>
                <br><br>
                <tr>
                    <td> <label>Age</label> </td>
                    <td> <input type="text" name="age" autocomplete="off"> </td>
                </tr>
                <br><br>
                <tr>
                    <td>City</td>
                    <td> <input type="text" name="city" autocomplete="off"> </td>
                </tr>
                <br><br>
                <tr>
                    <td> <input type="submit" value="Submit" id="submit"> </td>
                </tr>
            </form>
        </div>
    </div>
</body>
</html>