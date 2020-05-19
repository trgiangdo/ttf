@extends('components.master_layout')
@section('title', 'Tạo đề thi mới')

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
        <form action="{{ route('exam.store') }}" method="POST" enctype="multipart/form-data" accept-charset="utf-8" id="create_exam">
            @csrf

            <create-exam-form :question_type="{{ json_encode($question_type) }}">
            </create-exam-form>

            <div class="row">
                <div class="col-md-8 col-lg-8 col-lg-offset-2 text-right">
                    <button class="btn btn-success" type="submit">Tạo đề thi mới</button>
                    {{-- <button class="btn btn-danger" type="reset">Huỷ bỏ</button> --}}
                </div>
            </div>

        </form>
    </div>
</main>

@endsection


@section('scripts')
    <script src="https://unpkg.com/ml5@0.4.3/dist/ml5.min.js"></script>
    <script>
        // Create a ObjectDetector method
        // Initialize the Image Classifier method with MobileNet
        const classifier = ml5.imageClassifier('MobileNet', modelLoaded);

        // When the model is loaded
        function modelLoaded() {
            console.log('Model Loaded!');
        }

        // Make a prediction with a selected image
        classifier.classify(document.getElementById('example_image'), (err, results) => {
            console.log(results);
        });
    </script>

    <script src="js/vue/create_exam.js"></script>

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