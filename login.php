<?php
session_start();
require_once("koneksi.php");
if (isset($_SESSION['username']))
    if (isset($_SESSION['password'])) {
        header("location: header.php");
    }
?>
<html>

<head>
    <title>LOG IN</title>
</head>

<body>
    <center>
        <h1>Silahkan Login </h1>
        <form action="proseslogin.php" method="POST">
            <table>
                <tr>
                    <td>Username :</td>
                    <td><input type="text" name="username"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr>
                    <td>
                    <td><input type="submit" value="LOG IN" name="Login">
                        <a href="header.php">
                    </td>
                <tr>
                    <td colspan="2">
                        <center>Apakah anda seorang Siswa? login
                            <a href="login_siswa.php">Disini</a>
                        </center>
                    </td>
                </tr>
                </tr>
            </table>
        </form>
    </center>
</body>

</html>