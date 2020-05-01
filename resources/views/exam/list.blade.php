@extends('components.master_layout')
@section('title', 'Danh sách đề thi chuẩn')

@section('content')

<main>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách đề thi</h1>
        </div>
        <div class="col-lg-12">
            <p>Chú ý: Những bài thi ở phần này là các bài thi chuẩn lấy từ những kì thi trước. Kết quả thi của bạn sẽ được tính vào điểm kĩ năng cao hơn so với bài thi ở phần Luyện tập</p>
        </div>
    </div>

    @if(session('status'))
        <div class="alert bg-success" role="alert">
            {{session('status')}}<a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
        </div>
    @endif

    @if(session('error'))
        <div class="alert bg-danger" role="alert">
            {{session('error')}}<a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
        </div>
    @endif

    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-body">
                    <div class="bootstrap-table">
                        <div class="table-responsive">

                            @can('create', \App\Exam::class)
                                <a href="{{route('exam.create')}}" class="btn btn-primary">Thêm đề thi mới</a>
                            @endcan

                            <table class="table" style="margin-top:20px;">
                                <tbody>
                                    @foreach($exams as $exam)
                                    <tr>
                                        <td><h4>{{$exam->name}}</h4></td>
                                        <td>
                                            <a href="{{route('exam.show', $exam->id)}}" class="btn btn-primary"><i class="fa fa-book" aria-hidden="true"></i> Bắt đầu thi</a>
                                        </td>

                                        @canany(['update', 'delete'], $exam)
                                        <td>
                                            <a href="{{route('exam.edit', $exam->id)}}" class="btn btn-warning"><i class="fa fa-pencil-ruler" aria-hidden="true"></i> Sửa</a>
                                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal_{{$exam->id}}"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
                                            <div class="modal fade" id="exampleModal_{{$exam->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel_{{$exam->id}}" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel_{{$exam->id}}">Xóa thành viên</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{route('exam.destroy', ['exam' => $exam->id])}}" method="POST" accept-charset="utf-8">
                                                            @csrf
                                                            @method('delete')
                                                            <div class="modal-body">
                                                                <h4>Bạn có chắc chắn muốn xóa đề thi này!!!</h4>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Quay lại</button>
                                                                <button type="submit" class="btn btn-danger">Xóa</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        @endcanany

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div align='right'>
                                <ul class="pagination">
                                    {{$exams->links()}}
                                </ul>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
