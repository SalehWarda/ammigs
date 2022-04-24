@extends('layouts.admin')

@section('title')

    AMMIGS | Terms of service

@endsection


@section('content')


    <div class="content-wrapper">


        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="mb-0">{{trans('dashboard.Terms_of_service')}}</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"
                                                       class="default-color">{{trans('dashboard.Home')}}</a></li>
                        <li class="breadcrumb-item active">{{trans('dashboard.Terms_of_service')}}</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- main body -->
        <div class="row">
            <div class="col-xl-12 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">


                        <div class="row">
                            <div class="col-xl-12 mb-30">
                                <div class="card card-statistics h-100">

                                    <div class="card-body">


                                        <form method="post" action="{{route('admin.services.update')}}" autocomplete="off" enctype="multipart/form-data">
                                            @csrf
                                            @method('PATCH')

                                            <input type="hidden" name="id" value="{{$service->id}}">

                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="service_ar"> {{trans('dashboard.Service_ar')}} :</label>

                                                        <textarea name="service_ar" rows="3" class="form-control summernote">{!! old('service_ar',$service->getTranslation('service','ar'))  !!}</textarea>

                                                        @error('service_ar')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="service_en"> {{trans('dashboard.Service_en')}} :</label>

                                                        <textarea name="service_en" rows="3" class="form-control summernote">{!! old('service_en',$service->getTranslation('service','en')) !!}</textarea>

                                                        @error('service_en')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>


                                            <br>
                                            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('dashboard.Save')}}</button>


                                        </form>


                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>



        </div>

        @include('partials.backend.footer')





        @endsection

        @section('script')

            <script>
                $(function (){

                    $('.summernote').summernote({
                        tabsize: 2,
                        height: 200,
                        toolbar: [
                            ['style', ['style']],
                            ['font', ['bold', 'underline', 'clear']],
                            ['color', ['color']],
                            ['para', ['ul', 'ol', 'paragraph']],
                            ['table', ['table']],
                            ['insert', ['link', 'picture', 'video']],
                            ['view', ['fullscreen', 'codeview', 'help']]
                        ]
                    });
                })


            </script>
@endsection
