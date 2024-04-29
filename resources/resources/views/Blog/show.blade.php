@extends('layouts.app')
@section('header')
        <title>Blog</title>


        <!-- Styles -->
        <style>
            .font-s{
                font-size: 10pt;
            }
            .font-i {
                font-size:10pt;
                color: #444444;
            }
            .text-justify {
                text-align: justify;
            }

            body {
                background-color: #efefef;

            }

            .nounderline {
                text-decoration: none;
            }
        </style>

    <style>

        .cause-container {
            background: #fff;
            border-radius: 2px;
            box-shadow: rgba(0, 0, 0, 0.2) 0 4px 2px -2px;
            font-weight: 100;
            width: 100%;
        }
        @media screen and (min-width: 480px) {
            .cause-container {
                width: 28rem;
            }
        }
        @media screen and (min-width: 767px) {
            .cause-container {
                width: 40rem;
            }
        }
        @media screen and (min-width: 959px) {
            .cause-container {
                width: 50rem;
            }
        }

        .cause-container a {
            color: #333;
            text-decoration: none;
            transition: 0.25s ease;
        }
        .cause-container a:hover {
            border-color: #777;
            color: #777;
        }

        .cause-cover {
            border-radius: 2px 2px 0 0;
            height: 28rem;
            margin-bottom: 20px;
            box-shadow: inset rgba(0, 0, 0, 0.2) 0 64px 64px 16px;

        }


        .cause-body {
            margin: 0 auto;
            width: 92%;
        }


        .cause-title h2 a {
            color: #222;
        }

        .cause-summary p {
            color: #4d4d4d;
        }

        .cause-tags ul {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            list-style: none;
            padding-left: 0;
        }

        .cause-tags li + li {
            margin-left: 0.5rem;
        }

        .cause-tags a {
            border: 1px solid #999999;
            border-radius: 3px;
            color: #999999;
            height: 1.5rem;
            line-height: 1.5rem;
            letter-spacing: 1px;
            padding: 0 0.5rem;
            text-align: center;
            text-transform: uppercase;
            white-space: nowrap;
            width: 5rem;
        }


    </style>

@endsection


@section('content')
    <section id="breadcrumbs">

        <div class="row p-5 " style="background-image: url('{{asset('images/bg.jpg')}}'); color:white;">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2>{{$blog->title}}</h2>
                    </div>
                    <div class="col-md-6 " style="text-align: right">
                        <h5>You are here / <a href="#" class="nounderline">home </a> / <a href="#" class="nounderline">causes</a> </h5>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="causeDetail">
        <div class="container">
            <div class="row p-3">
                        <!-- cause items section -->
                        <div class="col-md-9">

                            <div class="cause-container w-100 mb-3">

                                <div class="cause-header">
                                    <div class="cause-cover" style=" background: url('{{asset($blog->img)}}'); background-size: cover ;">

                                    </div>
                                </div>

                                <div class="cause-body">
                                    <div class="cause-title">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h3>{{$blog->title}}</h3>
                                            </div>
                                            <div class="col-md-4 text-align-right">
                                                <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#DonorsModel"><i class="fa fa-list " style="margin-right: 5px;"></i> Donor's List</button>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="cause-summary pt-3 pb-3" >
                                        <div class=" row pb-2 font-i w-100" style="width: 70%">
                                            <div class="col-md-3 ">
                                                <i class="fa fa-calendar "></i> {{ \Carbon\Carbon::parse($blog['publish_date'])->diffForHumans() }}
                                            </div>
                                            <div class="col-md-3 ">
                                                <i class="fa fa-user "></i> {{$blog->user->name}}
                                            </div>
                                             <div class="col-md-3">
                                                <i class="fa fa-folder "></i> {{$blog->cat->cat_name}}
                                            </div>
                                            <div class="col-md-3 ">
                                                <i class="fa fa-location-arrow "></i>
                                            </div>

                                        </div>
                                        <div class="cause-description row text-justify">

                                            <p>
                                                {{$blog->content}}
                                            </p>

                                        </div>
                                    </div>

                                </div>



                            </div>




<style>

    .flu-card .flu-card_img img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .flu-card .flu-card_content {
        padding: 15px;
    }

    @media (min-width: 992px) {
        .flu-card--vertical {
            display: flex;
            position: relative;
        }
        .flu-card--vertical .flu-card_img img {
            width: 320px;
            min-width: 300px;
            height: 100%;
            object-fit: cover;
        }
    }

</style>


                        <!-- comment section -->

                        </div>
<style>
    .relcause-card:hover {
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    }
    .relcause-card .relcause-card_img img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }
    .relcause-card .relcause-card_img i {
        position: absolute;
        top: 20px;
        right: 30px;
        color: #fff;
        font-size: 25px;
        transition: all 0.1s;
    }
    .relcause-card .relcause-card_img i:hover {
        top: 18px;
        right: 28px;
        font-size: 29px;
    }
    .relcause-card .relcause-card_content {
        padding: 15px;
    }
    .relcause-card .relcause-card_content .relcause-card_title-section {
       margin-bottom: 10px;
    }
    .relcause-card .relcause-card_content .relcause-card_title-section .relcause-card_title {
        margin-bottom: 8px;
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .relcause-card_title a {
        text-decoration: none;
    }
    .relcause-card .relcause-card_content .relcause-card_title-section .relcause-card-category {
        font-size: 10pt;
        display: block;
        text-decoration: none;
        color:#777;
        margin:0;
    }


    }

</style>

                        <!-- related posts -->
                        <div class="col-md-3">
                            <h3>Related Causes</h3>


                        </div>
                    </div>

                </div>

        </section>

    @endsection

@section('footer_scripts')
    <section id="modelsdefbm">
        <div class="modal fade" id="DonationModel" tabindex="-1" aria-labelledby="DonateModel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="DonateModel">Contribute Now</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h5>{{$blog->title}}</h5>
                        <p class="font-s text-justify">
                            {{$blog->content}}
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

    <section id="modeldonlst">
        <div class="modal fade" id="DonorsModel" tabindex="-1" aria-labelledby="DonorListModel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="DonorListModel">List of Donors</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                                                <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    @endsection

