@extends('layouts.admin')

@section('title')

    AMMIGS | Dashboard

@endsection

@section('content')


    <div class="content-wrapper">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="mb-0"> {{trans('dashboard.Dashboard')}}</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                        <li class="breadcrumb-item"><a href="index.html"
                                                       class="default-color">{{trans('dashboard.Home')}}</a></li>
                        <li class="breadcrumb-item active">{{trans('dashboard.Dashboard')}}</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- widgets -->
        <div class="row">
            <div class="col-xl-4 col-lg-6 col-md-6 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                  <span class="text-success">
                    <i class="fa fa-cubes highlight-icon" aria-hidden="true"></i>
                  </span>
                            </div>
                            <div class="float-right text-right">
                                <p class="card-text text-dark">{{trans('dashboard.Products')}}</p>
                                <h4>{{\App\Models\Product::count()}}</h4>
                            </div>
                        </div>
                        <p class="text-muted pt-3 mb-0 mt-2 border-top">
                            <i class="fa fa-exclamation-circle mr-1"
                               aria-hidden="true"></i> {{trans('dashboard.CompanyProducts')}}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                  <span class="text-dark">
                    <i class="fa fa-photo highlight-icon" aria-hidden="true"></i>
                  </span>
                            </div>
                            <div class="float-right text-right">
                                <p class="card-text text-dark">{{trans('dashboard.Cover')}}</p>
                                <h4>{{\App\Models\Cover::count()}}</h4>
                            </div>
                        </div>
                        <p class="text-muted pt-3 mb-0 mt-2 border-top">
                            <i class="fa fa-bookmark-o mr-1" aria-hidden="true"></i>{{trans('dashboard.CoverPhoto')}}
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                  <span class="text-danger">
                    <i class="fa fa-bar-chart-o highlight-icon" aria-hidden="true"></i>
                  </span>
                            </div>
                            <div class="float-right text-right">
                                <p class="card-text text-dark">{{trans('dashboard.Event')}}</p>
                                <h4>{{\App\Models\Event::count()}}</h4>
                            </div>
                        </div>
                        <p class="text-muted pt-3 mb-0 mt-2 border-top">
                            <i class="fa fa-bookmark-o mr-1" aria-hidden="true"></i>{{trans('dashboard.Event')}}
                        </p>
                    </div>
                </div>
            </div>

        </div>
        <!-- Orders Status widgets-->


        <livewire:calender-component />
        <!--=================================
         wrapper -->

        <!--=================================
         footer -->

        @include('partials.backend.footer')

    </div>


@endsection
