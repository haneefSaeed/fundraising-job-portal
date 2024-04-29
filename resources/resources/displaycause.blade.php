<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Laravel Project starting</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


        <!-- Styles -->
        <style>
            body {
                font-family: "Barlow", "Barlow Black", "Barlow Light", "Barlow ExtraLight", "Barlow Medium", "Barlow SemiBold",
                "Barlow B", sans-serif;
            }

            .font-s{
                font-size: 10pt;
            }
            .font-i {
                font-size:13pt;
            }
            .text-justify {
                text-align: justify;
            }
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>
        <!-- Bootstap Dependancy -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="js/jquery-3.6.0.min.js"></script>


        <!--Flipbox Css Dependancy -->
        <link rel="stylesheet" type="text/css" href="css/flipbox.css">


        <!-- Owl Carousel -->
        <script src="js/owl.carousel.min.js"></script>
        <link rel="stylesheet" href="css/owl.carousel.min.css">


        <!-- Menu Bar Dependancies -->
        <link rel="stylesheet" type="text/css" href="css/reset.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.min.css">
        <link rel="stylesheet" type="text/css" href="css/ionicon.min.css">
        <script defer src="js/script.js"></script>


        <style>
            body {
                background-color: #ccc;

            }

            .nounderline {
                text-decoration: none;
            }
        </style>


    </head>


    <body>
    <header class="header ">
        <div class="container">
            <section class="wrapper">
                <div class="header-item-left">
                    <a href="#" class="brand nounderline"><span style="color: black;">Charity</span></a>
                </div>
                <!-- Navbar Section -->
                <div class="header-item-center">
                    <div class="overlay"></div>
                    <nav class="menu" id="menu">

                        <div class="menu-mobile-header">
                            <button type="button" class="menu-mobile-arrow"><i class="ion ion-ios-arrow-back"></i></button>
                            <div class="menu-mobile-title"></div>
                            <button type="button" class="menu-mobile-close"><i class="ion ion-ios-close"></i></button>
                        </div>

                        <ul class="menu-section pt-3">
                            <li class="menu-item" ><a href="#" class="nounderline">Home</a></li>
                            <li class="menu-item-has-children">
                                <a href="#" class="nounderline">Causes <i class="ion ion-ios-arrow-down"></i></a>
                                <div class="menu-subs menu-column-1">
                                    <ul>
                                        <li><a href="#" class="nounderline">Register</a></li>
                                        <li><a href="#" class="nounderline">Questions</a></li>
                                        <li><a href="#" class="nounderline">Privacy Policy</a></li>
                                        <li><a href="#" class="nounderline">Term of Cookies</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="menu-item"><a href="#" class="nounderline">Blog</a></li>
                            <li class="menu-item"><a href="#" class="nounderline">Jobs</a></li>
                            <li class="menu-item"><a href="#" class="nounderline">About</a></li>
                        </ul>
                    </nav>
                </div>

                <div class="header-item-right">
                    <a href="#" class="menu-icon nounderline" style="font-size: 16px; "><i class="ion ion-md-log-in p-1"></i>Login</a>
                    <a href="#" class="menu-icon"><i class="ion ion-md-cart"></i></a>
                    <button type="button" class="menu-mobile-toggle">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </section>
        </div>
    </header>

    <section id="breadcrumbs">
        <div class="row bg-white p-5 " style="margin-top:100px;" >
        <div class="container">
                    <h4>You are here / <a href="#" class="nounderline">home </a> / <a href="#" class="nounderline">causes</a> </h4>
            </div>
        </div>
    </section>

        <section id="causeDetail">

<style>
    .cause-card-lg-col {
        width: 100%;
    }
    .cause-card-img-top {
        margin-top:10px;
    }

    .cause-relcause
    {
        margin-left:15px;width:25%;
    }
@media only screen and (max-width: 560px){
    .cause-card-lg-col {
        width: 100%;
    }
    .relcause{
        margin-left:0px;
        margin-top:30px;
        width:100%;
    }



}

</style>

                <div class="container">
                    <div class="row mt-4 p-3">
                        <!-- cause items section -->
                        <div class="col-md-9">



                            <div class="row">
                                <div class="container mt-5">
                                    <div class="row">
                                        <div class="col-12">
                                            <article class="blog-card">
                                                <div class="blog-card__background">
                                                    <div class="card__background--wrapper">
                                                        <div class="card__background--main" style="background-image: url('http://demo.yolotheme.com/html/motor/images/demo/demo_131.jpg');">
                                                            <div class="card__background--layer"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="blog-card__head">
          <span class="date__box">
            <span class="date__day">11</span>
            <span class="date__month">JAN</span>
          </span>
                                                </div>
                                                <div class="blog-card__info">
                                                    <h5>HARVICK GETS WHAT HE NEEDS, JOHNSON AMONG THOSE</h5>
                                                    <p>
                                                        <a href="#" class="icon-link mr-3"><i class="fa fa-pencil-square-o"></i> Tony Jahson</a>
                                                        <a href="#" class="icon-link"><i class="fa fa-comments-o"></i> 150</a>
                                                    </p>
                                                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloremque vero libero voluptatibus earum? Alias dignissimos quo cum, nulla esse facere atque, blanditiis doloribus at sunt quas, repellendus vel? Et, hic!</p>
                                                    <a href="#" class="btn btn--with-icon"><i class="btn-icon fa fa-long-arrow-right"></i>READ MORE</a>
                                                </div>
                                            </article>
                                        </div>
                                    </div>
                                </div>

                                <section class="detail-page">
                                    <div class="container mt-5">

                                    </div>
                                </section>




                        </div>
                        </div>

                        <!-- related posts -->
                        <div class="col-md-3">
                            <h3>Related Causes</h3>
                            <div class="eventcard mt-4 w-100" style=" max-width: 28rem;">
                                <img src="images/cause_02.jpg" class="card-img-top" alt="...">
                                <div class="card-body bg-white">
                                    <div class="row pb-3" style="font-size: 10pt;">
                                        <div class="col-4"><i class="ion ion-ios-person"></i> James</div>
                                        <div class="col-4"><i class="ion ion-ios-calendar"></i> 11/2/2022</div>
                                        <div class="col-4"><i class="ion ion-ios-eye"></i> 750</div>
                                    </div>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div>
                            <div class="eventcard mt-4 w-100" style=" max-width: 28rem;">
                                <img src="images/cause_02.jpg" class="card-img-top" alt="...">
                                <div class="card-body bg-white">
                                    <div class="row pb-3" style="font-size: 10pt;">
                                        <div class="col-4"><i class="ion ion-ios-person"></i> James</div>
                                        <div class="col-4"><i class="ion ion-ios-calendar"></i> 11/2/2022</div>
                                        <div class="col-4"><i class="ion ion-ios-eye"></i> 750</div>
                                    </div>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div>
                            <div class="eventcard mt-4 w-100" style=" max-width: 28rem;">
                                <img src="images/cause_02.jpg" class="card-img-top" alt="...">
                                <div class="card-body bg-white">
                                    <div class="row pb-3" style="font-size: 10pt;">
                                        <div class="col-4"><i class="ion ion-ios-person"></i> James</div>
                                        <div class="col-4"><i class="ion ion-ios-calendar"></i> 11/2/2022</div>
                                        <div class="col-4"><i class="ion ion-ios-eye"></i> 750</div>
                                    </div>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

        </section>


  <!--  <section id="services">
        <div class="row p-5" style="background-color: #eee">

            <div class="col-lg-12">
                <h1 class="text-center">Services</h1>
            </div>

        <div class="row justify-center pt-5">
                <div class="ea-flip-card-item">
                    <div class="ea-flip-card-inner">
                        <div class="front">
                            <div class="ua-flip-card-content text-center position-absolute d-flex align-items-center justify-content-center flex-wrap flex-column">
                                <h3>
                                    I am from Front
                                </h3>
                                <p>
                                    add description here
                                </p>
                            </div>
                        </div>

                        <div class="back">
                            <div class="ua-flip-card-content text-center position-absolute d-flex align-items-center justify-content-center flex-wrap flex-column">
                                <h1>
                                    I am from Back</h1>
                                <p>Cool</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ea-flip-card-item">
            <div class="ea-flip-card-inner">
                <div class="front">
                    <div class="ua-flip-card-content text-center position-absolute d-flex align-items-center justify-content-center flex-wrap flex-column">
                        <h3>
                            I am from Front
                        </h3>
                        <p>
                            add description here
                        </p>
                    </div>
                </div>

                <div class="back">
                    <div class="ua-flip-card-content text-center position-absolute d-flex align-items-center justify-content-center flex-wrap flex-column">
                        <h1>
                            I am from Back</h1>
                        <p>Cool</p>
                    </div>
                </div>
            </div>
        </div>

                <div class="ea-flip-card-item">
                <div class="ea-flip-card-inner">
                    <div class="front">
                        <div class="ua-flip-card-content text-center position-absolute d-flex align-items-center justify-content-center flex-wrap flex-column">
                            <h3>
                                I am from Front
                            </h3>
                            <p>
                                add description here
                            </p>
                        </div>
                    </div>

                    <div class="back">
                        <div class="ua-flip-card-content text-center position-absolute d-flex align-items-center justify-content-center flex-wrap flex-column">
                            <h1>
                                I am from Back</h1>
                            <p>Cool</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ea-flip-card-item">
                <div class="ea-flip-card-inner">
                    <div class="front">
                        <div class="ua-flip-card-content text-center position-absolute d-flex align-items-center justify-content-center flex-wrap flex-column">
                            <h3>
                                I am from Front
                            </h3>
                            <p>
                                add description here
                            </p>
                        </div>
                    </div>

                    <div class="back">
                        <div class="ua-flip-card-content text-center position-absolute d-flex align-items-center justify-content-center flex-wrap flex-column">
                            <h1>
                                I am from Back</h1>
                            <p>Cool</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
            </div>
    </section>

    <section id="Causes">

        <div class="row p-5" style="background-color: hsla(0,0%,0%,0.8)" >

            <div class="col-lg-12 pb-4">
                <h1 class="text-center dark:text-white">Causes</h1>
            </div>

            <div class="row p-6 mx-auto " style="max-width: 85rem;">
                <div class="wrapper">
                    <div class="ocarousel owl-carousel" style="max-width: 90rem">
                        <div class="cause w-100" style="max-width: 25rem;">
                            <img src="images/cause_01.jpg"   class="card-img-top" alt="..." >
                            <div class="card-body bg-white">
                                <h5 class="card-title">Card title</h5>
                                <div class="row p-3">

                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated " role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                                    </div>
                                    <div class="col-4">
                                        Collected x
                                    </div>
                                    <div class="col-4">
                                        donations y
                                    </div>
                                    <div class="col-4">
                                        goal z
                                    </div>
                                </div>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <div class="row justify-center ps-lg-5 pe-lg-5">
                                    <a href="#" class="btn btn-dark justify-center ">Donate</a>
                                </div>

                            </div>
                        </div>
                        <div class="cause w-100" style="max-width: 25rem;">
                            <img src="images/cause_02.jpg"   class="card-img-top" alt="..." >
                            <div class="card-body bg-white">
                                <h5 class="card-title">Card title</h5>
                                <div class="row p-3">

                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                                    </div>
                                    <div class="col-4">
                                        Collected x
                                    </div>
                                    <div class="col-4">
                                        donations y
                                    </div>
                                    <div class="col-4">
                                        goal z
                                    </div>
                                </div>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <div class="row justify-center ps-lg-5 pe-lg-5">
                                    <a href="#" class="btn btn-dark justify-center ">Donate</a>
                                </div>

                            </div>
                        </div>
                        <div class="cause w-100" style="max-width: 25rem;">
                            <img src="images/cause_03.jpg"   class="card-img-top" alt="..." >
                            <div class="card-body bg-white">
                                <h5 class="card-title">Card title</h5>
                                <div class="row p-3">

                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                                    </div>
                                    <div class="col-4">
                                        Collected x
                                    </div>
                                    <div class="col-4">
                                        donations y
                                    </div>
                                    <div class="col-4">
                                        goal z
                                    </div>
                                </div>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <div class="row justify-center ps-lg-5 pe-lg-5">
                                    <a href="#" class="btn btn-dark justify-center ">Donate</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section id="jobcats">
        <div class="row p-5 justify-center" style="background-color: #eee">

            <div class="col-lg-12">
                <h1 class="text-center">Job Categories</h1>
            </div>
            <div class="row pt-4 justify-center">
                <div class="fpjobcat m-2 p-1" style="max-width: 285px;">
                    <div class="row g-0">
                        <div class="col-md-4 p-4">
                            <i class="ion ion-ios-construct" style="color: #aaa;font-size: 45pt;"></i>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Engineering</h5>
                                <p class="card-text">475 Job</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="fpjobcat m-2 p-1" style="max-width: 285px;">
                    <div class="row g-0">
                        <div class="col-md-4 p-4">
                            <i class="ion ion-ios-color-palette" style="color: #aaaaaa;font-size: 45pt;"></i>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Graphic and Arts</h5>
                                <p class="card-text">15 Job</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="fpjobcat m-2 p-1" style="max-width: 285px;">
                    <div class="row g-0">
                        <div class="col-md-4 p-4">
                            <i class="ion ion-ios-compass" style="color: #aaa;font-size: 45pt;"></i>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Transportation</h5>
                                <p class="card-text">475 Job</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="fpjobcat m-2 p-1" style="max-width: 285px;">
                    <div class="row g-0">
                        <div class="col-md-4 p-4">
                            <i class="ion ion-ios-tennisball" style="color: #aaa;font-size: 45pt;"></i>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Sports</h5>
                                <p class="card-text">47 Job</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row  justify-center">
                <div class="fpjobcat m-2 p-1" style="max-width: 285px;">
                    <div class="row g-0">
                        <div class="col-md-4 p-4">
                            <i class="ion ion-ios-construct" style="color: #0a53be;font-size: 45pt;"></i>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Engineering</h5>
                                <p class="card-text">475 Job</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="fpjobcat m-2 p-1" style="max-width: 285px;">
                    <div class="row g-0">
                        <div class="col-md-4 p-4">
                            <i class="ion ion-ios-construct" style="color: #0a53be;font-size: 45pt;"></i>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Engineering</h5>
                                <p class="card-text">475 Job</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="fpjobcat m-2 p-1" style="max-width: 285px;">
                    <div class="row g-0">
                        <div class="col-md-4 p-4">
                            <i class="ion ion-ios-construct" style="color: #0a53be;font-size: 45pt;"></i>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Engineering</h5>
                                <p class="card-text">475 Job</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="fpjobcat m-2 p-1" style="max-width: 285px;">
                    <div class="row g-0">
                        <div class="col-md-4 p-4">
                            <i class="ion ion-ios-construct" style="color: #0a53be;font-size: 45pt;"></i>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Engineering</h5>
                                <p class="card-text">475 Job</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>

    </section>

    <section id="subscribe">
        <div class="row p-3" style="background-color:hsla(0, 0%, 0%, 0.8)">
            <div class="col-lg-12 p-5">
                <h1 class="text-center dark:text-white font-semibold">Join us now</h1>
                <h3 class="text-center dark:text-white "> to find more about everything you wish to know</h3>
            </div>
        </div>
    </section>

    <section id="blogposts">

        <div class="row p-5" style="background-color: #eee">
                <h1 class="text-center font-semibold">Latest Blog Posts</h1>
        <div class="row mx-auto p-6" style="max-width: 80rem">
            <div class="wrapper ">
                <div class="ocarousel owl-carousel">
                    <div class="eventcard card-1 w-100" style="max-width: 28rem;">
                        <img src="images/cause_02.jpg" class="card-img-top" alt="...">
                        <div class="card-body bg-white">
                            <div class="row pb-3" style="font-size: 10pt;">
                                <div class="col-4"><i class="ion ion-ios-person"></i> James</div>
                                <div class="col-4"><i class="ion ion-ios-calendar"></i> 11/2/2022</div>
                                <div class="col-4"><i class="ion ion-ios-eye"></i> 750</div>
                            </div>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                    <div class="eventcard card-2 w-100" style="max-width: 28rem;">
                        <img src="images/cause_01.jpg" class="card-img-top" alt="...">
                        <div class="card-body bg-white">
                            <div class="row pb-3" style="font-size: 10pt;">
                                <div class="col-4"><i class="ion ion-ios-person"></i> James</div>
                                <div class="col-4"><i class="ion ion-ios-calendar"></i> 11/2/2022</div>
                                <div class="col-4"><i class="ion ion-ios-eye"></i> 750</div>
                            </div>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                    <div class="eventcard card-3 w-100" style="max-width: 28rem;">
                        <img src="images/cause_03.jpg" class="card-img-top" alt="...">
                        <div class="card-body bg-white">
                            <div class="row pb-3" style="font-size: 10pt;">
                                <div class="col-4"><i class="ion ion-ios-person"></i> James</div>
                                <div class="col-4"><i class="ion ion-ios-calendar"></i> 11/2/2022</div>
                                <div class="col-4"><i class="ion ion-ios-eye"></i> 750</div>
                            </div>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        </div>

    </section>

    <section id="sponsers">
        <div class="row justify-center p-5" style="background-color: hsla(202,64%,13%,0.9)">
            <h1 class="text-center pb-3 font-semibold" style="color: white;">Sponsers</h1>

            <div class="sponserItem" >
                <div class="card-body">
                    <img src="images/sponser_01.png" alt="" >
                </div>
            </div>

            <div class="sponserItem" >
                <div class="card-body">
                    <img src="images/sponser_02.png" alt="" >
                </div>
            </div>

            <div class="sponserItem" >
                <div class="card-body">
                    <img src="images/sponser_03.png" alt="" >
                </div>
            </div>

            <div class="sponserItem" >
                <div class="card-body">
                    <img src="images/sponser_04.png" alt="" >
                </div>
            </div>


        </div>



    </section>
-->


    <section id="Footer">
        <div class="row justify-center p-5" style="background-color: #222222; color: white;">
            <div class="row w-75" style="max-width: 80rem; ">
                <div class="col-lg-4">
                    <p class="brand nounderline " style="color:white; margin: 5px;">Chartiy</p>
                    <p style="font-size: 10pt;">Our organization is to spread the love, kindess and humanity amongs people.</p>
                    <div class="row">
                        <div class="col-2"><i class="fa fa-location-arrow" style="color:darkorange;font-size: 18pt;"></i></div>
                        <div class="col-10"><h5 class="font-semibold">Address</h5><p style="font-size: 10pt; color: #aaa">Kabul, Afghanistan</p></div>
                    </div>
                    <div class="row">
                        <div class="col-2 p-3"><i class="fa fa-mobile" style="color:darkorange;font-size: 22pt;"></i></div>
                        <div class="col-10"><h5 class="font-semibold">Contact</h5><p style="font-size: 10pt; color: #aaa">+93790073000</p></div>
                    </div>
                    <div class="row">
                        <div class="col-2 p-3"><i class="fa fa-envelope" style="color:darkorange;font-size: 16pt;"></i></div>
                        <div class="col-10"><h5 class="font-semibold">E-Mail</h5><p style="font-size: 10pt; color: #aaa">admin@admin.com</p></div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <h4 class="font-semibold pb-3">Quick Links</h4>
                    <p style="font-size: 10pt; color: #aaa">Causes</p>
                    <p style="font-size: 10pt; color: #aaa">Blogs</p>
                    <p style="font-size: 10pt; color: #aaa">Contact</p>
                    <p style="font-size: 10pt; color: #aaa">Post a Job</p>
                    <p style="font-size: 10pt; color: #aaa">Vacancies</p>
                    <p style="font-size: 10pt; color: #aaa">Events</p>
                    <p style="font-size: 10pt; color: #aaa">Workshops</p>

                </div>
                <div class="col-lg-3">Hello</div>
                <div class="col-lg-3">Hello</div>
            </div>


        </div>
    </section>
    </div>

    <section id="modelsdefbm">
        <div class="modal-donation fade" id="DonationModel" tabindex="-1" aria-labelledby="DonateModel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="DonateModel">Contribute Now</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h5>Help Afghan Refugees</h5>
                        <p class="font-s text-justify">
                            Suspendisse potenti. Ut non tempus justo. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                        </p>
                        <h5>Please select an Amount you wish to donate:</h5>

                        <form class="row g-3 justify-center mb-2">
                            <div class="col-auto">
                                <button class="btn btn-warning" style="font-weight: 600;">$ 1</button>
                                <button class="btn btn-warning" style="font-weight: 600;">$ 5</button>
                                <button class="btn btn-warning" style="font-weight: 600;">$ 10</button>
                                <button class="btn btn-warning" style="font-weight: 600;">$ 20</button>
                            </div>
                            <div class="col-auto">
                                <input type="text" class="form-control" style="width: 80px; " placeholder="other..">
                            </div>
                        </form>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success">Proceed</button>
                    </div>
                </div>
            </div>
        </div>


    </section>
    </body>

    <script>
        $(".ocarousel").owlCarousel({
            margin: 15,
            loop: true,
            autoplay: false,
            autoplayTimeout: 2000,
            autoplayHoverPause: true,
            responsive: {
                0:{
                    items:1,
                    nav: false
                },
                600:{
                    items:2,
                    nav: false
                },
                1000:{
                    items:3,
                    nav: false
                },
            }
        });
    </script>
</html>
