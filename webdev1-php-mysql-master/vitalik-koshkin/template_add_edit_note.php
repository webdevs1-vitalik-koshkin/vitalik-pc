<?php
    include 'inc/connect.php';
    
    if (!isset($_GET['id']) && isset($_POST['note_title']) && isset($_POST['note_text'])) {
            $sql = "SELECT COUNT(*) FROM notes WHERE title = '{$_POST['note_title']}' and content = '{$_POST['note_text']}'";
            if ($res = $db->query($sql)) {
                if ($res->fetchColumn() == 0) {
                    $sql = "INSERT INTO notes (title, content)
                            VALUES ('{$_POST['note_title']}', '{$_POST['note_text']}')";
                    $db->exec($sql);
            }
        }
    }

    if (isset($_GET['id'])) {
        if (count($_POST)) {
            $sql = "UPDATE notes 
                    SET title='{$_POST['note_title']}', content='{$_POST['note_text']}'
                    WHERE id = {$_GET['id']}";
            $db->exec($sql);
        }
        $sql = "SELECT * FROM notes WHERE id = {$_GET['id']}";
        $note = $db->query($sql)->fetch(PDO::FETCH_ASSOC);
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

<form action="" enctype="multipart/form-data" method="post">
    <section id="note" class="about">
        <div class="container">
            <h2>Notes</h2>
            <div class="row">

                <!-- Note entry -->
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="title">Note Title</label>
                        <input type="text" name="note_title" class="form-control" id="title" placeholder="Enter title" required <?= isset($note['title'])?"value ='{$note['title']}'":''?>>
                    </div>

                    <div class="form-group">
                        <label for="content">Note text</label>
                        <textarea name="note_text" class="form-control" id="content" rows="5" placeholder="Entry content" required><?= isset($note['content'])?$note['content']:''?></textarea>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-success">Save</button>
                        <a href="/" class="btn btn-default">Cancel</a>
                    </div>
                </div>
            </div>

        </div>
    </section>
</form>


<footer id="contacts" class="contacts">
    <div class="container">
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