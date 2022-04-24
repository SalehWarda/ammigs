@extends('layouts.admin')

@section('title')

    AMMIGS | Covers

@endsection


@section('content')


    <div class="content-wrapper">


        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="mb-0">{{trans('dashboard.Cover')}}</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"
                                                       class="default-color">{{trans('dashboard.Home')}}</a></li>
                        <li class="breadcrumb-item active">{{trans('dashboard.Cover')}}</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- main body -->
        <div class="row">
            <div class="col-xl-12 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">


                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>

                            </div>
                        @endif



                            <div class="row">
                                <div class="col-xl-12 mb-30">
                                    <div class="card card-statistics h-100">

                                        <div class="card-body">


                                            <form method="post" action="{{route('admin.covers.store')}}" autocomplete="off" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label> {{trans('dashboard.TitleCover_ar')}} :</label>

                                                            <input type="text" name="title_ar" class="form-control" value="{{old('title_ar')}}">

                                                            @error('title_ar')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label> {{trans('dashboard.TitleCover_en')}} :</label>

                                                            <input type="text" name="title_en" class="form-control" value="{{old('title_en')}}">

                                                            @error('title_en')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>


                                                </div>

                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="description_ar"> {{trans('dashboard.DescCover_ar')}} :</label>

                                                            <textarea name="description_ar" rows="3" class="form-control summernote">{!! old('description_ar') !!}</textarea>

                                                            @error('description_ar')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="description_en"> {{trans('dashboard.DescCover_en')}} :</label>

                                                            <textarea name="description_en" rows="3" class="form-control summernote">{!! old('description_en') !!}</textarea>

                                                            @error('description_en')
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
                                                            <input type="file"  name="image" id="cover-image" class="file-input-overview ">
                                                            <span class="form-text text-muted">Image width should be 500px x 500px</span>


                                                        </div>
                                                        @error('cover')
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
            $("#cover-image").fileinput({
                theme: "fa",
                maxFileCount: 1,
                allowedFileTypes: ['image'],
                showCancel: true,
                showRemove: false,
                showUpload: false,
                overwriteInitial: false
            })

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
