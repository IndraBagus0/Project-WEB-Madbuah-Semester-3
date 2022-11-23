<!DOCTYPE html>
<html>

<head>
    <title>Login Multi User Level Dengan PHP </title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <h1>Membuat Login Multi User Level Dengan PHP</h1>
    <?php
    if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == "gagal") {
            echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
        }
    }
    ?>
    <div class="kotak_login">
        <p class="tulisan_login">Silahkan login</p>

        <form action="cek_login.php" method="post">
            <label>Username</label>
            <input type="text" name="username" class="form_login" placeholder="Username .." required="required">

            <label>Password</label>
            <input type="password" name="password" class="form_login" placeholder="Password .." required="required">

            <input type="submit" class="tombol_login" value="LOGIN">
        </form>
    </div>
</body>

</html>