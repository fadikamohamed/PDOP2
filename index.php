<?php require 'models/modelPatients.php'; ?>
<?php require 'models/model-rendezvous.php'; ?>
<html>
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="assets/frameworks/css/bootstrap.css" />
        <link rel="stylesheet" href="assets/css/style.css" />
        <title>title</title>
    </head>
    <body>
        <header>
            <h1 class="text-center"><a href="index.php">HOSPITAL E2N</a></h1>
        </header>
        <div class="row justify-content-center">
            <nav class=" navbar navbar-light">
                <div class="form-inline">
                    <a href="index.php?action=add-patient"><button class="btn btn-outline-primary text-light" type="button">Ajout patient</button></a>
                    <a href="index.php?action=list-patient"><button class="btn btn-outline-info text-light" type="button">Liste patients</button></a>
                    <a href="index.php?action=add-rendez-vous"><button class="btn btn-outline-warning text-light" type="button">Rendez-vous</button></a>
                    <a href="index.php?action=list-rendez-vous"><button class="btn btn-outline-dark text-light" type="button">Liste rendez-vous</button></a>
                </div>
            </nav>
        </div>
        <div class="container">
            <div  id="content" class="row justify-content-center text-white">
                <div class="col-md-12">
                    <?php include 'router.php'; ?>
                </div>
            </div>
        </div>
    </body>
</html>
