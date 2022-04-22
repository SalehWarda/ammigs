@extends('layouts.admin')

@section('title')

نبذة عنا
@endsection

@section('content')




    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">لوحة التحكم</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ سلايدرز</span>
            </div>
        </div>

    </div>

    <div class="col-xl-12">

        <div class="card mg-b-20" id="tabs-style3">
            <div class="card-body">


            <!-- row -->
                <div class="row">
                    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
                        <!--div-->
                        <div class="card">
                            <div class="card-body">
                                @include('partials.flash')

                                <form method="post" action="{{route('admin.about.update')}}" autocomplete="off" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')


                                    <input type="hidden" name="id" value="{{$about->id}}">

                                    <div class="row row-sm mg-t-20">
                                        <div class="col-lg">
                                            <label for="about_ar">النبذة بالعربية :</label>

                                            <textarea class="form-control" name="about_ar"  rows="3">{{ $about->getTranslation('about','ar') }}</textarea>

                                        </div>
                                        @error('about_ar')<span class="text-danger">{{$message}}</span>@enderror


                                        <div class="col-lg">
                                            <label for="about_en">النبذة بالإنجليزية :</label>

                                            <textarea class="form-control" name="about_en"  rows="3">{{ $about->getTranslation('about','en') }}</textarea>

                                        </div>
                                        @error('about_en')<span class="text-danger">{{$message}}</span>@enderror


                                    </div>
                                    <br>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="image">صورة الشركة :</label>
                                            <br>
                                            <div class="file-loading">
                                                <input type="file" name="image" id="about-image" class="file-input-overview">
                                                @error('image')<span class="text-danger">{{$message}}</span>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <button class="btn ripple btn-primary" type="submit">حفظ التعديلات</button>
                                </form>



                            </div>
                        </div>
                    </div>
                </div>
                <!--/div-->


                <!-- row closed -->


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
                        });
                    </script>
@endsection
