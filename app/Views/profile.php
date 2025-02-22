<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="shortcut icon" type="image/png" href="<?=base_url('favicon.ico');?>">
        <title>
            <?php echo esc($title); ?>
        </title>
        <link rel="stylesheet" type="text/css" href="https://unpkg.com/@fortawesome/fontawesome-free@5.10.2/css/all.min.css" />
        <link rel="stylesheet" href="https://unpkg.com/bootstrap@4.6.1/dist/css/bootstrap.min.css" />
        <link rel="stylesheet" href="/simplesidebar.css" />
        <link rel="stylesheet" href="/style.css" />
    </head>

    <body>
        <div class="d-flex" id="wrapper">
            <div class="bg-light border-right" id="sidebar-wrapper">
                <div class="sidebar-heading">
                    <i class="fas fa-palette"></i> <strong>Assignment</strong>
                </div>
                <div class="list-group rounded-0">
                    <a href="/" class="list-group-item list-group-item-action">
                        Produk
                    </a>
                    <a href="profile" class="list-group-item list-group-item-action active font-weight-bold">
                        Profil
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        Logout
                    </a>
                </div>
            </div>
            <div id="page-content-wrapper">
                <nav class="navbar navbar-expand-sm navbar-light bg-light border-bottom shadow-sm">
                    <button class="btn" id="menu-toggle"><i class="fas fa-bars"></i></button>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    email
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <!-- <a class="dropdown-item" href="#">Settings</a> -->
                                    <!-- <div class="dropdown-divider"></div> -->
                                    <a class="dropdown-item" href="<?=base_url('auth/logout');?>">Logout</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid pt-4">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">
                            <?=esc($title)?>
                        </h1>
                    </div>
                    
                </div>
            </div>
        </div>
    </body>

</html>