<?php
$title = 'Deployer sur ' . $_SERVER['SERVER_NAME'] . ' depuis GitHub';
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title><?php echo $title ?></title>
    <style>
        .container {
            width: 600px;
            margin: 0 auto;
            text-align: center;
        }

        .btn-wrap, h1 {
            text-align: center;
        }

        body {
            color: #444;
            font-family: Helvetica, sans-serif;
        }

        .btn {
            font-family: Arial;
            color: #ffffff;
            font-size: 20px;
            background: #ed1111;
            padding: 10px 20px 10px 20px;
            border: solid #101214 7px;
            text-decoration: none;
        }

        .btn:hover {
            background: #0b1217;
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="container">
    <h1><?php echo $title ?></h1>
    <img src="http://media3.giphy.com/media/tXLpxypfSXvUc/giphy.gif" alt=""><br><br>
    <?php
    if (!isset($_POST['submit'])) {
        ?>

        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <label for="pwd">code de lancement</label>
            <input type="password" name="pwd"><br><br>
            <div class="btn-wrap">
                <button class="btn" type="submit" name="submit">Deployer</button>
            </div>
        </form>

        <?php
    } else {
        if (isset($_POST['pwd']) && $_POST['pwd'] == "d4g5fyuv!fdu") {
            echo '<pre class="output">OMG! Déploiement effectué.' . shell_exec('git pull') . '</pre>';
        } else {
            echo '<pre class="output">Go away fuckin hacker</pre>';
        }
    }
    ?>
</div>
</body>
</html>
