@extends('layouts.admin')

@section('title')

    الألعاب
@endsection

@section('content')





    <div class="col-xl-12">

        <div class="card mg-b-20" id="tabs-style3">
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
                                <h4 class="card-title mg-b-0">الألعاب</h4>
                                    <div class="col-sm-6 col-md-3 mg-t-10 mg-sm-t-0"><a href="{{route('admin.games.create')}}" class="btn btn-outline-primary btn-rounded btn-block"><i class="fa fa-plus"></i> إضافة لعبة  </a></div>


                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0 text-md-nowrap">
                                    <thead>
                                    <tr>

                                        <th>#</th>
                                        <th>الصورة</th>
                                        <th>إسم اللعبة</th>
                                        <th>القسم</th>
                                        <th>وصف اللعبة</th>
                                        <th>الأجهزة المتوفرة</th>
                                        <th>الحالة</th>
                                        <th>العمليات</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @forelse($games as $game)

                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                @if($game->firstMedia)
                                                    <img src="{{asset('assets/images/games/'.$game->firstMedia->file_name)}}" width="60" height="60" alt="{{$game->name}}">
                                                @else
                                                    <img src="{{asset('assets/images/games/noImage.jpg')}}" width="60" height="60" alt="{{$game->name}}">
                                                @endif

                                            </td>
                                            <td>{{$game->name}}</td>
                                            <td>{{$game->category->name}}</td>
                                            <td>{!! \Illuminate\Support\Str::limit($game->description, 50, '...') !!}</td>
                                            <td>{{$game->available_to}}</td>
                                            <td>{{$game->status()}}</td>
                                            <td>
                                                <div class="btn-icon-list">
                                                    <a class="btn btn-primary btn-icon" href="{{route('admin.games.edit',$game->id)}}" title="تعديل"><i class="fa fa-user-edit"></i></a>
                                                    <button class="btn btn-danger btn-icon"
                                                            data-toggle="modal"
                                                            data-target="#delete_game{{ $game->id }}"
                                                            title="حذف"><i class="fa fa-trash"></i></button>
                                                </div>


                                            </td>
                                        </tr>

                                        <div class="modal fade" id="delete_game{{ $game->id }}" tabindex="-1" role="dialog"
                                             aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <div class="modal-title">
                                                            <div class="mb-30">

                                                                <h6>Delete {{$game->name}}</h6>

                                                            </div>
                                                        </div>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <form class="form" action="{{ route('admin.games.delete') }}"
                                                              method="post">
                                                            @csrf
                                                            @method('DELETE')

                                                            <input type="hidden" name="delete_game_id" value="{{$game->id}}" id="id">

                                                            <h6>Are you sure about deleting: <span class="text-danger">{{$game->name}}</span></h6>


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
                                            <td colspan="8" class="text-center">No Games found</td>
                                        </tr>
                                    @endforelse


                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td colspan="8">
                                            <div class="float-right">

                                                {!! $games->appends(request()->all())->links() !!}

                                            </div>

                                        </td>
                                    </tr>

                                    </tfoot>
                                </table>
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
