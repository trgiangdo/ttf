@extends('components.master_layout')
@section('title', 'Sửa đề thi')

@section('content')

<main>
    @if (session('status'))
        <div class="alert bg-success" role="alert">
            {{session('status')}}<a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
        </div>
    @endif

    @if (session('error'))
        <div class="alert bg-danger" role="alert">
            {{session('error')}}<a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container test">
        <form action="{{ route('exam.update', $exam->id) }}" method="POST" enctype="multipart/form-data" accept-charset="utf-8" id="edit_exam">
            @csrf
            @method('PUT')

            <edit-exam-form
                :exam="{{ json_encode($exam) }}"
                :question_type="{{ json_encode($question_type) }}"
                :listening_part1="{{ json_encode($listening_part1->load('example', 'part1')) }}"
                :listening_part2="{{ json_encode($listening_part2->load('example', 'part2')) }}"
                :listening_part3="{{ json_encode($listening_part3->load('part3')) }}"
                :listening_part4="{{ json_encode($listening_part4->load('part4'))}}"
                :readings_part5="{{ json_encode(collect($readings_part5)->map(function ($item, $key) {
                    return $item->load('part5');
                })) }}"
                :readings_part6="{{ json_encode(collect($readings_part6)->map(function ($item, $key) {
                    return $item->load('part6');
                })) }}"
                :readings_part7="{{ json_encode(collect($readings_part7)->map(function ($item, $key) {
                    return $item->load('part7');
                })) }}"
            >
            </edit-exam-form>

            <div class="row">
                <div class="col-md-8 col-lg-8 col-lg-offset-2 text-right">
                    <button class="btn btn-success" type="submit">Sửa</button>
                    <button class="btn btn-danger"><a href="/exam">Huỷ bỏ</a></button>
                </div>
            </div>

        </form>
    </div>
</main>

@endsection


@section('scripts')
    <script src="js/vue/edit_exam.js"></script>

	<script src="vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script src="vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
    <script>
        $('textarea').ckeditor();
    </script>

    <script src="js/jquery.are-you-sure.js"></script>

    <script>
        $(function() {
            $('#create_exam').areYouSure({
                message:  "It looks like you have been editing something."
            });
        });
    </script>
@endsection