<?php

require("handler.php");

if(empty($_COOKIE["qurrent_lang"]) || !isset($_COOKIE["qurrent_lang"])) {
    setcookie("qurrent_lang", "de");
}

if(isset($_GET["lang"])) {
    if($_GET["lang"]=="de") {
        setcookie("qurrent_lang", "de");
    } elseif($_GET["lang"]=="en") { 
        setcookie("qurrent_lang", "en");
    }
    header("Location: quiz.php");
}

require("langs/".$_COOKIE["qurrent_lang"].".php");

?>

<html lang="de">

<head>
    <!-- this very first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- now other stuff -->
    <title>Quiz - <?= $lang["title"] ?></title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico">

    <!-- Metro_4 -->
    <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4.3.2/css/metro-all.min.css">
    <style>
        #textHeading {
            font-size: 38px;
            font-weight: bold;
            color: #ffffff;
            display: flex;
            justify-content: center;
            padding: 50px;
            background: #000080;
            position: relative;
        }

        #textHeading .char {
            font-weight: bold;
            display: inline-block;
            width: 48px;
            height: 56px;
            line-height: 56px;
            text-align: center;
            text-transform: uppercase;
            z-index: 2;
            opacity: .8;
        }

        #textHeading .char.te-odd {
            background: orangered;
            transform: skewY(-20deg);
        }

        #textHeading .char.te-even {
            background: orange;
            transform: skewY(20deg);
        }

    </style>
</head>

<body>
    <div id="textHeading" data-cls-token="char" data-role="tokenizer">
        Qurrent
    </div>
    <div class="container">
        <div class="row">
            <div class="cell-3">
                <ul class="v-menu panel">
                    <li class="menu-title">General</li>
                    <li><a href="index.php"><span class="mif-home icon"></span> <?= $lang["menu"]["home"] ?></a></li>
                    <li><a href="quiz.php"><span class="mif-question icon"></span> <?= $lang["menu"]["quiz"] ?></a></li>
                    <li class="menu-title"><?= $lang["menu"]["cred"] ?></li>
                    <li><a href="https://github.com/saintly2k/Qurrent" target="_blank"><span class="mif-github icon"></span> <?= $lang["menu"]["git"] ?></a></li>
                </ul>
            </div>
            <div class="cell-9">
                <div data-role="panel" height="100%" width="100%">
                    <?php if(!isset($_GET["typ"]) || empty($_GET["typ"])) { ?>
                    <div class="row">
                        <div class="cell-12">
                            <a href="quiz.php?typ=1">
                                <button class="image-button primary" style="width:100%">
                                    <span class="mif-chat icon"></span>
                                    <span class="caption"><?= $lang["quiz_typ"]["letter"] ?></span>
                                </button>
                            </a>
                        </div>
                        <div class="cell-12">
                            <a href="quiz.php?typ=2">
                                <button class="image-button success" style="width:100%">
                                    <span class="mif-file-text icon"></span>
                                    <span class="caption"><?= $lang["quiz_typ"]["read"] ?></span>
                                </button>
                            </a>
                        </div>
                        <div class="cell-12">
                            <a href="quiz.php?typ=3">
                                <button class="image-button secondary" style="width:100%">
                                    <span class="mif-shuffle icon"></span>
                                    <span class="caption"><?= $lang["quiz_typ"]["mix"] ?></span>
                                </button>
                            </a>
                        </div>
                    </div>
                    <?php } elseif($_GET["typ"]==1) { ?>
                    <?php if(!isset($_GET["char"])) { ?>
                    <form name="char" method="get">
                        <input type="text" hidden value="1" name="typ">
                        <?php display_char($_COOKIE["qurrent_lang"]) ?>
                    </form>
                    <?php } else { ?>
                    <?php if($_GET["user"]==$_GET["char"]) { ?>
                    <div class="row">
                        <div class="cell-2">
                            <img src="<?= $_GET["image"] ?>" width="100%" alt="<?= $lang["quiz"]["letter"] ?> <?= $_GET["char"] ?>">
                            <h3 class="text-center"><?= $_GET["char"] ?></h3>
                        </div>
                        <div class="cell-1">
                        </div>
                        <div class="cell-9">
                            <h3 class="text-center" style="color:green"><?= $lang["quiz"]["correct"] ?></h3>
                            <a autofocus href="quiz.php?typ=1"><button class="image-button success" style="width:100%"><span class="mif-chevron-right icon"></span><span class="caption"><?= $lang["quiz"]["next"] ?></span></button></a>
                        </div>
                    </div>
                    <?php } else { ?>
                    <div class="row">
                        <div class="cell-2">
                            <img src="<?= $_GET["image"] ?>" width="100%" alt="<?= $lang["quiz"]["letter"] ?> <?= $_GET["char"] ?>">
                            <h3 class="text-center"><?= $_GET["char"] ?></h3>
                        </div>
                        <div class="cell-1">
                        </div>
                        <div class="cell-9">
                            <h3 class="text-center" style="color:green"><?= $lang["quiz"]["incorrect"] ?></h3>
                            <a autofocus href="quiz.php?typ=1"><button class="image-button alert" style="width:100%"><span class="mif-chevron-right icon"></span><span class="caption"><?= $lang["quiz"]["next"] ?></span></button></a>
                        </div>
                    </div>
                    <?php } ?>
                    <?php } ?>
                    <?php } elseif($_GET["typ"]==2) { ?>
                    In Bau!
                    <?php } elseif($_GET["typ"]==3) { ?>
                    In Bau!
                    <?php } else { header("location: quiz.php"); } ?>
                </div>
            </div>
            <div class="cell-12" style="text-align:center">
                <div data-role="panel" height="100%" width="100%">
                    <p>
                        <a href="?lang=de">Deutsch</a> - <a href="?lang=en">English</a>
                    </p>
                </div>
                <p><?= $lang["menu"]["copy"] ?></p>
            </div>
        </div>
    </div>

    <!-- Javascript and other stuff here -->
    <script src="https://cdn.metroui.org.ua/v4.3.2/js/metro.min.js"></script>
</body>

</html>
