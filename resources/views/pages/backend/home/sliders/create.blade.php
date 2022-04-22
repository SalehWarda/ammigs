@extends('layouts.admin')

@section('title')

سلايدر
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


            {{--                @if ($errors->any())--}}
            {{--                    <div class="alert alert-danger">--}}
            {{--                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
            {{--                            <span aria-hidden="true">&times;</span>--}}
            {{--                        </button>--}}
            {{--                        <ul>--}}
            {{--                            @foreach ($errors->all() as $error)--}}
            {{--                                <li>{{ $error }}</li>--}}
            {{--                            @endforeach--}}
            {{--                        </ul>--}}

            {{--                    </div>--}}
            {{--                @endif--}}

            <!-- row -->
                <div class="row">
                    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
                        <!--div-->
                        <div class="card">
                            <div class="card-body">
                                @include('partials.flash')

                                <form method="post" action="{{route('admin.slider.store')}}" autocomplete="off" enctype="multipart/form-data">

                                    @csrf
                                    <div class="row row-sm">

                                        <div class="col-lg">
                                            <label for="name_ar">إسم اللعبة بالعربية :</label>
                                            <input class="form-control" name="name_ar"  type="text">
                                            @error('name_ar')<span class="text-danger">{{$message}}</span>@enderror

                                        </div>

                                        <div class="col-lg">
                                            <label for="name_en">إسم اللعبة بالإنجليزية :</label>

                                            <input class="form-control" name="name_en"  type="text">
                                            @error('name_en')<span class="text-danger">{{$message}}</span>@enderror

                                        </div>

                                    </div>
                                    <div class="row row-sm mg-t-20">
                                        <div class="col-lg">
                                            <label for="description_ar">وصف اللعبة بالعربية :</label>

                                            <textarea class="form-control" name="description_ar"  rows="3"></textarea>

                                        </div>
                                        @error('description_ar')<span class="text-danger">{{$message}}</span>@enderror


                                        <div class="col-lg">
                                            <label for="description_en">وصف اللعبة بالإنجليزية :</label>

                                            <textarea class="form-control" name="description_en"  rows="3"></textarea>

                                        </div>

                                    </div>
                                    <br>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="image">صورة اللعبة :</label>
                                            <br>
                                            <div class="file-loading">
                                                <input type="file" name="image" id="game-image" class="file-input-overview">
                                                @error('image')<span class="text-danger">{{$message}}</span>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <button class="btn ripple btn-primary" type="submit">إضافة</button>
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

                        $(function () {
                            $("#game-image").fileinput({
                                theme: "fa",
                                maxFileCount: 1,
                                allowedFileTypes: ['image'],
                                showCancel: true,
                                showRemove: false,
                                showUpload: false,
                                overwriteInitial: false,
                            })
                        });
                    </script>

@endsection
