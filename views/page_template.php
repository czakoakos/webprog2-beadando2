<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>MVC - PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_ROOT ?>css/style.css">
    <?php if ($viewData['style']) echo '<link rel="stylesheet" type="text/css" href="' . $viewData['style'] . '">'; ?>
</head>
<body>
<div class="container-fluid">
    <div class="row main-row">

        <!-- ----- ----- ----- ----- HEADER AND MENU ----- ----- ----- ----- -->
        <div class="col-12">
            <div class="container px-0">
                <div class="row mx-0">
                    <div class="col-12">
                        <nav class="navbar navbar-expand-md">
                            <div class="logged-in-user">
                                <span class="title">WebProg 2</span>
                                <span class="username">
                                    <?php if (isset($_SESSION['userlastname']) && !empty($_SESSION['userlastname'])) {
                                        echo $_SESSION['userlastname'] . " " . $_SESSION['userfirstname'];
                                    } else {
                                        echo 'Vendég';
                                    }
                                    ?>
                                </span>
                            </div>
                            <button class="navbar-toggler" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                                    aria-controls="navbarSupportedContent" aria-expanded="false"
                                    aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse w-100" id="navbarSupportedContent">
                                <div class="row w-100">
                                    <div class="col-12">
                                        <?php echo Menu::getMenu($viewData['selectedItems']); ?>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- ----- ----- ----- ----- PAGE CONTENT ----- ----- ----- ----- -->
        <div class="col-12">
            <?php if ($viewData['render']) include($viewData['render']); ?>
        </div>

        <!-- ----- ----- ----- ----- FOOTER ----- ----- ----- ----- -->
        <div class="col-12 align-self-end text-center py-4">
            <p class="blue-text">&copy; Webprogramozás beadandó - Czakó Ákos, Kávai Konrád <?php echo date("Y"); ?>.</p>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
</html>
