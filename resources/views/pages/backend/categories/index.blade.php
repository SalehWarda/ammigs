@extends('layouts.admin')

@section('title')

    الأقسام
@endsection

@section('content')





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

                <div class="breadcrumb-header justify-content-between">
                    <div class="my-auto">
                        <div class="d-flex">
                            <h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Empty</span>
                        </div>
                    </div>

                </div>


                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title mg-b-0">الأقسام</h4>
                                    <div class="col-sm-6 col-md-3 mg-t-10 mg-sm-t-0"><button data-toggle="modal"
                                    data-target="#add_category" class="btn btn-outline-primary btn-rounded btn-block"><i class="fa fa-plus"></i> إضافة قسم جديد  </button></div>


                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0 text-md-nowrap">
                                    <thead>
                                    <tr>

                                        <th>#</th>
                                        <th>إسم القسم</th>
                                        <th>العمليات</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @forelse($categories as $category)

                                        <tr>
                                            <td>{{ $loop->iteration }}</td>

                                            <td>{{$category->name}}</td>
                                            <td>
                                                <div class="btn-icon-list">
                                                    <button class="btn btn-primary btn-icon"
                                                            data-toggle="modal"
                                                            data-target="#edit_category{{ $category->id }}"
                                                            title="تعديل"><i class="fa fa-user-edit"></i></button>

                                                    <button class="btn btn-danger btn-icon"
                                                            data-toggle="modal"
                                                            data-target="#delete_category{{ $category->id }}"
                                                            title="حذف"><i class="fa fa-trash"></i></button>
                                                </div>


                                            </td>
                                        </tr>
                                        {{--edit Modal slider --}}
                                        <div class="modal fade" id="edit_category{{ $category->id }}" tabindex="-1" role="dialog"
                                             aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <div class="modal-title">
                                                            <div class="mb-30">

                                                                <h6>تعديل قسم</h6>

                                                            </div>
                                                        </div>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <form class="form" action="{{ route('admin.categories.update') }}"
                                                              method="post">
                                                            @csrf
                                                            @method('PATCH')

                                                            <input type="hidden" name="id" value="{{$category->id}}">
                                                            <div class="row row-sm">

                                                                <div class="col-lg">
                                                                    <label for="name_ar">إسم القسم بالعربية :</label>
                                                                    <input class="form-control" value="{{$category->getTranslation('name','ar')}}" name="name_ar"  type="text">
                                                                    @error('name_ar')<span class="text-danger">{{$message}}</span>@enderror

                                                                </div>

                                                                <div class="col-lg">
                                                                    <label for="name_en">إسم القسم بالإنجليزية :</label>

                                                                    <input class="form-control" value="{{$category->getTranslation('name','en')}}" name="name_en"  type="text">
                                                                    @error('name_en')<span class="text-danger">{{$message}}</span>@enderror

                                                                </div>

                                                            </div>


                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger"
                                                                        data-dismiss="modal">Close
                                                                </button>
                                                                <button type="submit"
                                                                        class="btn btn-secondary">حفظ</button>

                                                            </div>
                                                        </form>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>


                                        {{--delete Modal slider --}}
                                        <div class="modal fade" id="delete_category{{ $category->id }}" tabindex="-1" role="dialog"
                                             aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <div class="modal-title">
                                                            <div class="mb-30">

                                                                <h6>Delete {{$category->name}}</h6>

                                                            </div>
                                                        </div>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <form class="form" action="{{ route('admin.categories.delete') }}"
                                                              method="post">
                                                            @csrf
                                                            @method('DELETE')

                                                            <input type="hidden" name="delete_category_id" value="{{$category->id}}" id="id">

                                                            <h6>Are you sure about deleting: <span class="text-danger">{{$category->name}}</span></h6>


                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close
                                                                </button>
                                                                <button type="submit"
                                                                        class="btn btn-danger">Delete</button>

                                                            </div>
                                                        </form>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    @empty

                                        <tr>
                                            <td colspan="3" class="text-center">No categories found</td>
                                        </tr>
                                    @endforelse


                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td colspan="3">
                                            <div class="float-right">

                                                {!! $categories->appends(request()->all())->links() !!}

                                            </div>

                                        </td>
                                    </tr>

                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                {{--add Modal slider --}}
                <div class="modal fade" id="add_category" tabindex="-1" role="dialog"
                     aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="modal-title">
                                    <div class="mb-30">

                                        <h6>إضافة قسم</h6>

                                    </div>
                                </div>
                                <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <form class="form" action="{{ route('admin.categories.store') }}"
                                      method="post">
                                    @csrf

                                    <div class="row row-sm">

                                        <div class="col-lg">
                                            <label for="name_ar">إسم القسم بالعربية :</label>
                                            <input class="form-control" name="name_ar"  type="text">
                                            @error('name_ar')<span class="text-danger">{{$message}}</span>@enderror

                                        </div>

                                        <div class="col-lg">
                                            <label for="name_en">إسم القسم بالإنجليزية :</label>

                                            <input class="form-control" name="name_en"  type="text">
                                            @error('name_en')<span class="text-danger">{{$message}}</span>@enderror

                                        </div>

                                    </div>


                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">Close
                                        </button>
                                        <button type="submit"
                                                class="btn btn-secondary">حفظ</button>

                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>

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
