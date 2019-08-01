<?php
    include 'inc/connect.php';

    $note = $db->query("SELECT * FROM notes WHERE id = {$_GET['id']}" )->fetch(PDO::FETCH_ASSOC);

    if (isset($_GET['action']) && $_GET['action']='delete') {
        unlink($note['content']);
        $db->exec("DELETE FROM notes WHERE id = {$_GET['id']}");
        header( 'Location: /');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Denis Abdullin</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">

    <!-- jQuery -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/test.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Nunito:600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<header class="header">
    <div class="container">

        <nav class="navbar navbar-default">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-menu" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="main-menu">
                <ul class="nav navbar-nav ">
                    <li><a href="/#images">Images</a></li>
                    <li><a href="/#note">Notes</a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/template_add_edit_image.php">Add image</a></li>
                    <li><a href="/template_add_edit_note.php">Add note</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
            <!-- /.container-fluid -->
        </nav>


        <div id="top-logo">
            <a href="/" class="header-logo">
                <img src="img/Avatar.png" alt="Denis Abdullin">
            </a>
        </div>
    </div>
</header>

<section id="head" class="hero text-center">
    <div class="container">
        <h1>Motivation Is The First<br>Step To <span>Success</span></h1>
        <ul class="social-list">
            <li><a data-checknum="15" href="https://www.facebook.com/readmirecom/"><img src="img/twitter.png" alt="twitter"></a></li>
            <li><a data-checknum="0" href="https://readmire.com/"><img src="img/behance.png" alt="behance"></a></li>
            <li><a data-checknum="42" href="https://www.instagram.com/readmirecom/"><img src="img/instagram.png" alt="instagram"></a></li>
        </ul>
    </div>
</section>


<section id="note" class="about">
    <div class="container">
        <h2>Notes</h2>
        <div class="row">

            <!-- Note entry -->
            <div class="col-xs-12">
                <div class="about-item">
                    <h4><?=wordwrap(htmlentities($note['title']), 110, "<br>", 1)?></h4>
                    <p><?=wordwrap(htmlentities($note['content']), 110, "<br>", 1)?></p>
                </div>

                <div>
                    <a class="btn btn-info" href="/template_add_edit_note.php?id=<?=$note['id']?>">Edit note</a>
                    <a class="btn btn-danger" id="del" href="/template_view_note.php?id=<?=$note['id']?>&action=delete">Delete note</a>
                </div>
            </div>
        </div>

    </div>
</section>


<footer id="contacts" class="contacts">
    <div class="container">
        <div class="contacts-top">
            <div class="row">
                <div class="col-xs-12">
                    <h4>Contacts</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <p>Positive pleasure-oriented goals are much more powerful motivators than negative fear-based ones.</p>
                    <ul class="social-list">
                        <li><a href="#nolink"><img src="img/twitter.png" alt="twitter"></a></li>
                        <li><a href="#nolink"><img src="img/behance.png" alt="behance"></a></li>
                        <li><a href="#nolink"><img src="img/instagram.png" alt="instagram"></a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-9">
                    <form class="contacts-form" method="post">
                        <div class="row">
                            <div class="col-xs-12 col-sm-10">
                                <label>
                                    <span>Name</span>
                                    <input type="text" name="name" placeholder="Incognito" required>
                                </label>
                                <label>
                                    <span>E-Mail</span>
                                    <input type="email" name="email" placeholder="incognito@gmail.com" required>
                                </label>
                                <label>
                                    <span>Message</span>
                                    <textarea name="text" placeholder="Your question or suggestion"></textarea>
                                </label>
                            </div>
                            <div class="col-xs-12 col-sm-2 text-right">
                                <button type="submit">
                                    <img src="img/Button.png" alt="submit">
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="contacts-bottom">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <p>Copyright &copy; 2018 Denis Abdullin – deab.ru</p>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="contacts-link">
                        <p><a href="#nolink">Invoicing</a></p>
                        <p><a href="#nolink">Documents</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

</body>
</html>