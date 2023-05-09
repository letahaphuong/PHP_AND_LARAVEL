<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="/asset/css/bootstrap.min.css"/>


    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="/asset/css/slick.css"/>
    <link type="text/css" rel="stylesheet" href="/asset/css/slick-theme.css"/>

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="/asset/css/nouislider.min.css"/>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="/asset/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">


    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="/asset/css/style.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
            crossorigin="anonymous"></script>
    <title><?= $pageTitle ?></title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= DOC_URL . "controller=home" ?>">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page"
                       href="<?php echo DOC_URL ?> controller=product&&action=showByCategory&&id=2">Mobile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page"
                       href="<?php echo DOC_URL ?> controller=product&&action=showByCategory&&id=3">Apple</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page"
                       href="<?php echo DOC_URL ?> controller=product&&action=showByCategory&&id=4">Laptop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page"
                       href="<?php echo DOC_URL ?> controller=product&&action=showByCategory&&id=5">Desktop</a>
                </li>

            </ul>

            <div class="widget-header">
                <a  href="<?= DOC_URL ?>controller=cart" class="icon icon-sm rounded-circle border"><i
                        class="fa fa-shopping-cart"></i></a>
                <span class="cart" style="color: red; sup"><?php echo (!empty($_SESSION['carts'])) ? count($_SESSION['carts']) : '0';  ?></span>
            </div>
        </div>
    </div>
</nav>
<style>
    .cart {
        position: absolute;
        top: 0px;
        right: 0px;

    }
</style>