<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="An open platform for Microduino">
    <meta name="author" content="xieqiu">
    <meta name="email" content="qiuye@163.com">

    <title>Microduino开放平台</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}" type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/creative.min.css') }}" type="text/css">

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top">

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Microduino开放平台</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">Microduino开放平台</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="#about">指南</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services">功能</a>
                    </li>
                    <!--
                    <li>
                        <a class="page-scroll" href="#portfolio">案例</a>
                    </li>
                    -->
                    <li>
                        <a class="page-scroll" href="#contact">联系</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#">登录</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1>Microduino开放平台</h1>
                <hr>
                <p>Microduino开放平台是针对开源硬件的开发者使用的开放平台，用户可以通过对自身和硬件设备注册到平台上，实现对硬件设备的远程控制,将硬件设备的功能模块注册到平台上，平台就可以实现通过网络对硬件设备的功能调用。</p>
                <a href="#about" class="btn btn-primary btn-xl page-scroll">立即使用</a>
            </div>
        </div>
    </header>

    <section class="bg-primary" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">使用指南</h2>
                    <hr class="light">
                    <p class="text-faded">安装平台socket客户端，同时将你的开源设备注册到平台上，你就能远程操控你的硬件设备</p>
                    <a href="#services" class="page-scroll btn btn-default btn-xl">注册</a>
                </div>
            </div>
        </div>
    </section>

    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">功能</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-diamond wow bounceIn text-primary"></i>
                        <h3>快速接入</h3>
                        <p class="text-muted">平台提供快速接入模块帮助Microduino设备接入</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-paper-plane wow bounceIn text-primary" data-wow-delay=".1s"></i>
                        <h3>远程操控</h3>
                        <p class="text-muted">平台可以远程控制接入平台的开源设备</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-newspaper-o wow bounceIn text-primary" data-wow-delay=".2s"></i>
                        <h3>实时状态</h3>
                        <p class="text-muted">平台可以实时更新接入设备的信息</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-heart wow bounceIn text-primary" data-wow-delay=".3s"></i>
                        <h3>网页模板</h3>
                        <p class="text-muted">Microduino的开发者不用熟悉web开发，可以直接接入</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--
    <section class="no-padding" id="portfolio">
        <div class="container-fluid">
            <div class="row no-gutter">
                <div class="col-lg-4 col-sm-6">
                    <a href="#" class="portfolio-box">
                        <img src="img/portfolio/1.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="#" class="portfolio-box">
                        <img src="img/portfolio/2.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="#" class="portfolio-box">
                        <img src="img/portfolio/3.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="#" class="portfolio-box">
                        <img src="img/portfolio/4.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="#" class="portfolio-box">
                        <img src="img/portfolio/5.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="#" class="portfolio-box">
                        <img src="img/portfolio/6.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <aside class="bg-dark">
        <div class="container text-center">
            <div class="call-to-action">
                <h2>Free Download at Start Bootstrap!</h2>
                <a href="#" class="btn btn-default btn-xl wow tada">Download Now!</a>
            </div>
        </div>
    </aside>
    -->

    <section class="bg-dark" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">联系我们</h2>
                    <hr class="primary">
                    <p>想加入我们平台帮忙改进开源平台，或者有什么功能需求，请联系我们</p>
                </div>
                <!--
                <div class="col-lg-4 col-lg-offset-2 text-center">
                    <i class="fa fa-phone fa-3x wow bounceIn"></i>
                    <p>123-456-6789</p>
                </div>
                -->
                <div class="col-lg-12 text-center">
                    <i class="fa fa-envelope-o fa-3x wow bounceIn" data-wow-delay=".1s"></i>
                    <p><a href="mailto:qiuye90@163.com">qiuye90@163.com</a></p>
                </div>
            </div>
        </div>
    </section>

    <!-- jQuery -->
    <script src="{{ asset('scripts/jquery.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('scripts/bootstrap.min.js') }}"></script>

    <!-- Plugin JavaScript -->
    <script src="{{ asset('scripts/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('scripts/jquery.fittext.js') }}"></script>
    <script src="{{ asset('scripts/wow.min.js') }}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('scripts/creative.js') }}"></script>

</body>

</html>