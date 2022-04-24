@extends('layouts.admin')

@section('title')

    AMMIGS | About

@endsection


@section('content')


    <div class="content-wrapper">


        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="mb-0">{{trans('dashboard.AboutUs')}}</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"
                                                       class="default-color">{{trans('dashboard.Home')}}</a></li>
                        <li class="breadcrumb-item active">{{trans('dashboard.AboutUs')}}</li>
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


                                        <form method="post" action="{{route('admin.about.update')}}" autocomplete="off" enctype="multipart/form-data">
                                            @csrf
                                            @method('PATCH')

                                            <input type="hidden" name="id" value="{{$about->id}}">

                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="about_ar"> {{trans('dashboard.AboutUs_ar')}} :</label>

                                                        <textarea name="about_ar" rows="3" class="form-control summernote">{!! old('about_ar',$about->getTranslation('about','ar'))  !!}</textarea>

                                                        @error('about_ar')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="about_en"> {{trans('dashboard.AboutUs_en')}} :</label>

                                                        <textarea name="about_en" rows="3" class="form-control summernote">{!! old('about_en',$about->getTranslation('about','en')) !!}</textarea>

                                                        @error('about_en')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row pt-4">

                                                <div class="col-12">

                                                    <label for="image">{{trans('dashboard.Image')}} :</label>
                                                    <br>
                                                    <div class="file-loading">
                                                        <input type="file"  name="image" id="about-image" class="file-input-overview ">
                                                        <span class="form-text text-muted">Image width should be 500px x 500px</span>


                                                    </div>
                                                    @error('image')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
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
                    $("#about-image").fileinput({
                        theme: "fa",
                        maxFileCount: 1,
                        allowedFileTypes: ['image'],
                        showCancel: true,
                        showRemove: false,
                        showUpload: false,
                        overwriteInitial: false,
                        initialPreview:[
                            "{{asset('assets/images/about/'.$about->image)}}",
                        ],
                        initialPreviewAsData:true,
                        initialPreviewFileType: 'image',
                        initialPreviewConfig:[
                            {
                                caption: "{{$about->image}}",
                                size:'1111',
                                width:"120px",
                                url:"{{route('admin.about.removeImage',['about_id'=>$about->id, '_token'=>csrf_token()])}}",
                                key:{{$about->id}}
                            }
                        ]
                    });

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
