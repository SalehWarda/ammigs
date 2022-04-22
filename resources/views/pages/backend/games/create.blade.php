@extends('layouts.admin')

@section('title')

    الألعاب
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


                <div class="row">
                    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
                        <div class="card ">

                            <div class="card-body">


                                <form method="post" action="{{route('admin.games.store')}}" autocomplete="off" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label> إسم اللعبة بالعربية :</label>

                                                <input type="text" name="name_ar" class="form-control"
                                                       value="{{old('name_ar')}}">

                                                @error('name_ar')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label> إسم اللعبة بالإنجليزية :</label>

                                                <input type="text" name="name_en" class="form-control"
                                                       value="{{old('name_en')}}">

                                                @error('name_en')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="product_category_id">القسم : </label>
                                                <br>
                                                <select class="form-control form-control-lg mb-15" name="category_id">
                                                    <option selected disabled> إختر...</option>

                                                    <option value=""> ---</option>
                                                    @forelse($categories as $category)

                                                        <option value="{{$category->id}}"{{old('category_id') == $category->id ?'selected' : null}}>{{$category->name}}</option>


                                                        @endforeach


                                                </select>
                                                @error('category_id')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>


                                    </div>

                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="description_ar"> الوصف بالعربية :</label>

                                                <textarea name="description_ar" rows="3"
                                                          class="form-control ">{{old('description_ar')}}</textarea>

                                                @error('description_ar')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="description_en"> الوصف بالإنجليزية :</label>

                                                <textarea name="description_en" rows="3"
                                                          class="form-control ">{{old('description_en')}}</textarea>

                                                @error('description_en')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">


                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label> متوفرة لأجهزة :</label>

                                                <input type="text" name="available_to" class="form-control"
                                                       value="{{old('available_to')}}">

                                                @error('available_to')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="status">الحالة :</label>
                                                <br>
                                                <select class="form-control form-control-lg mb-15" name="status">

                                                    <option selected disabled> إختر...</option>
                                                    <option value="1" {{old('status') == '1' ? 'selected' : null}}>
                                                        Active
                                                    </option>
                                                    <option value="0" {{old('status') == '0' ? 'selected' : null}}>
                                                        Inactive
                                                    </option>

                                                </select>
                                                @error('status')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>





                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">

                                            <label for="images">Images :</label>
                                            <br>
                                            <div class="file-loading">
                                                <input type="file" name="images[]" id="game_images"
                                                       class="file-input-overview" multiple="multiple">
                                                <span class="form-text text-muted">Image width should be 500px x 500px</span>


                                            </div>
                                            @error('images')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>
                                    <br>

                                    <button class="btn ripple btn-primary" type="submit">إضافة</button>

                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- row closed -->


@endsection

@section('script')

    <script>

        $(function (){

        $("#game_images").fileinput({
            theme: "fa",
            maxFileCount: 5,
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
