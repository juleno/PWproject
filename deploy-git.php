<?php
$title = 'Deploy ' . $_SERVER['SERVER_NAME'] . ' from GitHub';
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
        }

        .btn-wrap, h1 {
            text-align: center;
        }

        body {
            color: #444;
            font-family: Helvetica, sans-serif;
        }

        .btn {
            display: inline-block;
            padding: 0.375rem 0.8125rem;
            margin-bottom: 0;
            font-size: 1em;
            text-align: center;
            vertical-align: middle;
            cursor: pointer;
            border: 1px solid #ccc;
            border-radius: 0.3125rem;
            -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.25);
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.25);
            color: #ffffff;
            text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
            background-color: #51a351;
            background-image: -moz-linear-gradient(top, #62c462, #51a351);
            background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#62c462), to(#51a351));
            background-image: -webkit-linear-gradient(top, #62c462, #51a351);
            background-image: -o-linear-gradient(top, #62c462, #51a351);
            background-image: linear-gradient(to bottom, #62c462, #51a351);
            background-repeat: repeat-x;
            border-color: #448944;
        }

        .btn:focus {
            outline: thin dotted #333;
            outline: 5px auto -webkit-focus-ring-color;
            outline-offset: -2px;
        }

        .btn:hover {
            text-decoration: none;
        }

        .btn:active {
            outline: 0;
            background-image: none;
            -webkit-box-shadow: inset 0 3px 5px rgba(0, 0, 0, .125), 0 1px 0 rgba(255, 255, 255, .1);
            box-shadow: inset 0 3px 5px rgba(0, 0, 0, .125), 0 1px 0 rgba(255, 255, 255, .1);
        }
    </style>
</head>
<body>
<div class="container">
    <h1><?php echo $title ?></h1>

    <?php
    if (!isset($_POST['submit'])) {
        ?>

        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="btn-wrap">
                <button class="btn" type="submit" name="submit">Deploy</button>
            </div>
        </form>

        <?php
    } else {
        echo '<pre class="output">' . shell_exec('git pull') . '</pre>';
    }
    ?>
</div>
</body>
</html>
