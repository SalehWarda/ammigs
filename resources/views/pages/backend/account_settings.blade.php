@extends('layouts.admin')

@section('title')

    AMMIGS | Account Settings

@endsection


@section('content')

    <div class="content-wrapper">

    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{trans('dashboard.Profile')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}" class="default-color">{{trans('dashboard.Home')}}</a></li>
                    <li class="breadcrumb-item active">{{trans('dashboard.Profile')}}</li>
                </ol>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">

                <div class="card-body">


                    <form method="post" action="{{route('admin.account_settings.update')}}" autocomplete="off"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <input type="hidden" name="id" value="{{auth()->user()->id}}">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{trans('dashboard.Name')}}:</label>

                                    <input type="text" name="name" class="form-control"
                                           value="{{old('name',auth()->user()->name)}}">

                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>



                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{trans('dashboard.Email')}}:</label>

                                    <input type="text" name="email" class="form-control" value="{{old('email',auth()->user()->email)}}">

                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{trans('dashboard.Password')}}:</label>

                                    <input type="password" name="password" class="form-control" >

                                    @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>


                        </div>






                        <div class="row pt-4">

                            <div class="col-12">

                                <label for="images">{{trans('dashboard.Image')}} :</label>
                                <br>
                                <div class="file-loading">
                                    <input type="file" name="user_image" id="admin_image" class="file-input-overview"
                                           multiple="multiple">
                                    <span class="form-text text-muted">Image width should be 500px x 500px</span>


                                </div>
                                @error('user_image')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <br>
                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">Save Changes
                        </button>


                    </form>


                </div>
            </div>
        </div>
        </div>

        @endsection
        @section('script')

            <script>
                $(function () {
                    $("#admin_image").fileinput({
                        theme: "fa",
                        maxFileCount: 1,
                        allowedFileTypes: ['image'],
                        showCancel: true,
                        showRemove: false,
                        showUpload: false,
                        overwriteInitial: false,
                        initialPreview:[
                            @if(auth()->user()->user_image != '')
                                "{{asset('assets/images/users/'.auth()->user()->user_image)}}",
                            @endif
                        ],
                        initialPreviewAsData:true,
                        initialPreviewFileType: 'image',
                        initialPreviewConfig:[
                                @if(auth()->user()->user_image != '')
                            {
                                caption: "{{auth()->user()->user_image}}",
                                size:'1111',
                                width:"120px",
                                url:"{{route('admin.removeImage',['admin_id'=> auth()->user()->id, '_token'=>csrf_token()])}}",
                                key:{{auth()->user()->id}}
                            }
                            @endif
                        ]
                    })
                })
            </script>
@endsection
