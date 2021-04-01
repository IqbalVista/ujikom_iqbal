<!DOCTYPE html>
<html>

<head>
    <title>LOG IN/title>
</head>

<body>
    <center>
        <h1>Silahkan Login</h1>
        <hr />
        <form action="proseslogin.php" method="POST">
            <table>
                <tr>
                    <td>Username :</td>
                    <td><input type="text" name="username"></td>
                </tr>
                <tr>
                    <td>Password :</td>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="LOG IN" name="LOGIN"></td>
                </tr>
            </table>
        </form>
</body>

</html>