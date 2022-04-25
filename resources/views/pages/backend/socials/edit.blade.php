@extends('layouts.admin')
@section('content')



    <div class="content-wrapper">

    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{trans('dashboard.EditUsers')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"
                                                   class="default-color">{{trans('dashboard.Home')}}</a></li>
                    <li class="breadcrumb-item active">{{trans('dashboard.EditUsers')}}</li>
                </ol>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">

                <div class="card-body">


                    <form method="post" action="{{route('admin.users.update')}}" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$users->id}}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('dashboard.Name')}} :</label>

                                    <input type="text" name="name" class="form-control" value="{{old('name',$users->name)}}">

                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>




                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> {{trans('dashboard.Mobile')}} :</label>

                                    <input type="text" name="mobile" class="form-control" value="{{old('mobile',$users->mobile)}}">

                                    @error('mobile')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> {{trans('dashboard.Email')}} :</label>

                                    <input type="text" name="email" class="form-control" value="{{old('email',$users->email)}}">

                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> {{trans('dashboard.Password')}} :</label>

                                    <input type="password" name="password" class="form-control" value="{{old('password')}}">

                                    @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>






                        </div>




                        <br>
                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('dashboard.EditUsers')}}
                        </button>


                    </form>


                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
@section('script')

@endsection
