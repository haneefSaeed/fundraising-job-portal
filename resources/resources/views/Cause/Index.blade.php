@extends('layouts.app')
@section('header')
        <title>Causes</title>


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
                background-color: #eee;

            }

            .nounderline {
                text-decoration: none;
            }
        </style>

    <style>

        .blog-container {
            background: #fff;
            border-radius: 2px;
            box-shadow: rgba(0, 0, 0, 0.2) 0 4px 2px -2px;
            font-weight: 100;
            width: 100%;
        }

        .blog-container:hover{
            box-shadow: rgba(0, 0, 0, 0.2) 0 5px 5px 2px;
            transition: 0.3s ease-in-out;
        }
        @media screen and (min-width: 480px) {
            .blog-container {
                width: 28rem;
            }
        }
        @media screen and (min-width: 767px) {
            .blog-container {
                width: 40rem;
            }
        }
        @media screen and (min-width: 959px) {
            .blog-container {
                width: 50rem;
            }
        }

        .blog-container a {
            color: #333;
            text-decoration: none;
            transition: 0.25s ease;
        }
        .blog-container a:hover {
            border-color: #777;
            color: #777;
        }

        .blog-cover {
            border-radius: 2px 2px 0 0;
            height: 14rem;
            margin-bottom: 20px;
            box-shadow: inset rgba(0, 0, 0, 0.2) 0 64px 64px 16px;

        }


        .blog-body {
            margin: 0 auto;
            width: 92%;
        }


        .blog-title h2 a {
            color: #222;
        }

        .blog-summary p {
            color: #4d4d4d;
        }

        .blog-tags ul {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            list-style: none;
            padding-left: 0;
        }

        .blog-tags li + li {
            margin-left: 0.5rem;
        }

        .blog-tags a {
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

        <div class="row p-5 " style="background-image: url('images/bg.jpg'); color:white;">
            <div class="container">
                <div class="row">
            <div class="col-md-4">
                <h1>Causes</h1>
            </div>
            <div class="col-md-8 " style="text-align: right">
                <h5>You are here / <a href="#" class="nounderline">home </a> / <a href="#" class="nounderline">causes</a> </h5>
            </div>
                </div>
            </div>
        </div>
    </section>

        <section id="causeDetail">
                <div class="container">
                    <div class="row p-1">
                        <!-- cause items section -->

                        <style>
                            .cause-card {
                                display: inline-grid;
                                width: 45%;
                                cursor: pointer;
                            }
                            @media screen and (max-width: 1068px){
                                .cause-card {
                                    display: inline-grid;
                                    width: 100%;
                                    cursor: pointer;
                                }
                            }
                        </style>
                        <div class="col-md-9" style="display:inline-block;">

                            @foreach($causes as $cause)
                                @if($cause->cause_status == 1)
                                <div onclick="window.location.href= 'causes/{{$cause->id}}'" class="blog-container cause-card m-3 " style="">

                                    <div class="blog-header">
                                        <div class="blog-cover" style=" background: url('{{asset($cause->cause_img)}}');  background-size: cover ; ">

                                        </div>
                                    </div>

                                    <div class="blog-body">
                                        <div class="blog-title">

                                            <h4><a href="#">{{$cause->cause_title}}</a></h4>


                                        </div>
                                        <div class="blog-summary pt-3 pb-3" >
                                            <div class=" row pb-2 font-i">
                                                <div class="col-md-8 ">
                                                    <img style="background-image: url('{{asset('images/jobs/avatar.jpg')}}'); width: 45px; display: inline;" src="{{asset('images/jobs/avatar.jpg')}}">
                                                    @if($cause->fr_profile->is_company == 0)
                                                    {{$cause->fr_profile->user->name}}
                                                        @else
                                                        <a href="dp/{{$cause->fr_profile->company_profile->id}}">{{$cause->fr_profile->company_profile->name}}</a>
                                                        @endif
                                                </div>
                                                <div class="col-md-4 " style="vertical-align: center;">

                                                    <i class="fa fa-clock-o" style="margin-top:15px; font-size: 13pt;"></i> {{\Carbon\Carbon::parse($cause['cause_start_date'])->diffForHumans()}}
                                                </div>


                                            </div>
                                            <div class="row cause-donation-detail bg-light m-2 p-2">
                                                <div class="row mb-2 ">

                                                    <div class="progress-donation" style="height: 15px;">
                                                        <div class="progress-donation-bar" role="progressbar" style="width: {{100*\App\Models\donations::all()->where('cause_id', '=', $cause->id)->sum('amount')/$cause->cause_goal}}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <div class="row mb-2" style="font-size:10pt;">
                                                    <div class="col-md-4" style="text-align: left;"><i class="fa fa-arrow-up"></i> Raised: $ {{\App\Models\donations::all()->where('cause_id', '=', $cause->id)->sum('amount')}}</div>
                                                    <div class="col-md-4" style="text-align: center;"><i class="fa fa-user"></i> Donors: {{\App\Models\donations::all()->where('cause_id', '=', $cause->id)->count()}}</div>
                                                    <div class="col-md-4" style="text-align: right;"><i class="fa fa-bullseye"></i> Goal: $ {{number_format($cause->cause_goal)}}</div>
                                                </div>

                                            </div>
                                            <p>
                                                {{$cause->cause_description}}
                                            </p>
                                            <div class="input-group justify-content-end">
                                                <button class="btn btn-sm btn-success"><i class="fa fa-arrow-right"></i> Read more</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            <div class="" >
                                <!-- went to providers and used bootstrap for pagination -->
                                {!! $causes->onEachSide(5)->links() !!}
                            </div>


                        </div>


                        <!-- Side bar -->
                        <div class="col-md-3">
                            <h3>Search</h3>
                            <div class="row bg-white p-3 mx-auto" style="position: relative;max-width: 20rem;">


                                    <form >
                                        <label for="hello">
                                            Keyword
                                        </label>
                                        <input type="text" class="form-control" name="Keyword">

                                        <label for="hello">
                                            Category
                                        </label>
                                        <select id="category" name="category" class="form-control">
                                            <option value="Ref">Refugee</option>
                                            <option value="Med">Medical</option>
                                            <option value="Food">Feeding</option>
                                            <option value="Agri">Agriculture</option>
                                        </select>

                                        <label for="Author">
                                            Author
                                        </label>
                                        <input type="text" class="form-control" name="Author">

                                        <label for="location">
                                            Location
                                        </label>
                                        <input type="text" class="form-control" name="Location">
                                        <div class="input-group p-3 justify-content-center" >
                                            <button type="submit" class="btn btn-secondary"><i class="fa fa-search"></i> Search</button>
                                        </div>

                                    </form>
                            </div>
                            <h3 class="mt-3">Categories</h3>
                            <div class="row bg-white p-3 mx-auto">

<style>
ul li {
    list-style-type: disc;

}
a {
    text-decoration: none;
    color:black;
}
a:hover{
    text-decoration: underline;
    color: #555;
}
</style>

                                <ul style="list-style-type: circle">
                                    <li><a href="#"> Refugees (12)</a></li>
                                    <li><a href="#"> Poverty (40)</a></li>
                                    <li><a href="#"> Medical (3)</a></li>
                                    <li><a href="#"> Bankruptcy (34)</a></li>
                                    <li><a href="#"> Disasters (50)</a></li>
                                    <li><a href="#"> Political (5)</a></li>
                                </ul>

                            </div>

                            <h3 class="mt-3">Top Contributors</h3>
                            <div class="row bg-white p-3 text-center mx-auto" style="font-size: 12pt; font-weight: 600;">
                                <table class="table table-striped">
                                    <tr>
                                        <th>Name</th>
                                        <th>Donation</th>
                                    </tr>
                                    <tr>
                                        <td>1. Hanif</td>
                                        <td>$2000</td>
                                    </tr>
                                    <tr>
                                        <td>2. James Bond</td>
                                        <td>$1800</td>
                                    </tr>
                                    <tr>
                                        <td>3. King Bond</td>
                                        <td>$1500</td>
                                    </tr>
                                    <tr>
                                        <td>4. Juni</td>
                                        <td>$1000</td>
                                    </tr>
                                    <tr>
                                        <td>5.Fandi</td>
                                        <td>$800</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

        </section>



    @endsection

@section('footer_scripts')
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

    @endsection

