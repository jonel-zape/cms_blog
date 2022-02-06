<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>CMS Blog</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width">
        <link rel="icon" href="/images/logo.png">
        <link rel="stylesheet" href="/css/templatemo_main.css<?php noCache(); ?>">
        <link rel="stylesheet" href="/js/lib/tabulator/css/tabulator.css<?php noCache(); ?>">
        <link rel="stylesheet" href="/js/lib/autocomplete/styles.css<?php noCache(); ?>">
        <link rel="stylesheet" href="/js/lib/datepicker/datepicker.css<?php noCache(); ?>">
        <link rel="stylesheet" href="/css/custom.css<?php noCache(); ?>">
    </head>
    <body>

    <script src="/js/lib/jquery-3.4.1.min.js<?php noCache(); ?>"></script>
    <script src="/js/lib/autocomplete/jquery.autocomplete.min.js<?php noCache(); ?>"></script>
    <script src="/js/lib/tabulator/js/tabulator.js<?php noCache(); ?>"></script>
    <script src="/js/template/bootstrap.min.js<?php noCache(); ?>"></script>
    <script src="/js/template/Chart.min.js<?php noCache(); ?>"></script>
    <script src="/js/template/templatemo_script.js<?php noCache(); ?>"></script>
    <script src="/js/lib/datepicker/datepicker.js<?php noCache(); ?>"></script>
    <script src="/js/core.js<?php noCache(); ?>"></script>
    <script src="/js/http.js<?php noCache(); ?>"></script>
    <script src="/js/el.js<?php noCache(); ?>"></script>
    <script src="/js/modules/enums.js<?php noCache(); ?>"></script>

    <?php component('loading.php'); ?>
    <?php component('modalConfirm.php'); ?>

    <?php if (isAuthenticated()) { ?>
        <script>
            window.token = "<?php echo $_SESSION['token']; ?>";
        </script>

        <div class="navbar navbar-inverse" role="navigation">
          <div class="navbar-header">
            <div class="logo">
                <h4>
                    &nbsp;
                    <img src="/images/logo.png" />
                    &nbsp;
                    CMS Blog
                </h4>
            </div>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
        </div>

        <?php
            $parentModule = getSegment(1);
            $controlClass = [
                'dashboard'=> '',
                'settings' => '',
                'authors' => '',
                'posts'  => ''
            ];

            if (isset($controlClass[$parentModule])) {
                $controlClass[$parentModule] = 'active';
            }
        ?>

        <div class="template-page-wrapper">
            <div class="navbar-collapse collapse templatemo-sidebar">
                <ul class="templatemo-sidebar-menu">
                    <li class="<?php echo $controlClass['dashboard'] ?>">
                        <a href="/dashboard">
                            <i class="fa fa-home nav-icon-custom"></i>
                            Dashboard
                        </a>
                    </li>

                    <li class="<?php echo $controlClass['authors'] ?>">
                        <a href="/authors">
                            <i class="fa fa-user nav-icon-custom"></i>
                            Authors
                        </a>
                    </li>

                    <li class="<?php echo $controlClass['posts'] ?>">
                        <a href="/posts">
                            <i class="fa fa-bars nav-icon-custom"></i>
                            Posts
                        </a>
                    </li>

                    <li class="<?php echo $controlClass['settings'] ?>">
                        <a href="/settings">
                            <i class="fa fa-gear nav-icon-custom"></i>
                            Settings
                        </a>
                    </li>
                    <li style="cursor: pointer;">
                        <a onclick="core.logout();"><i class="fa fa-sign-out nav-icon-custom"></i>Sign Out</a>
                    </li>
                </ul>
            </div>
        </div>

    <?php } ?>
