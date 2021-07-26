@extends('layouts.teacher')
@section('content')
<div class="container">
    <div class="row">
        @if(Session::has('success'))
        <div class="col-md-8 alert offset-md-2 alert-success alert-dismissible my-3 text-center">
            <button class="close" type="button" data-dismiss="alert">&times</button>
            {{ Session::get('success') }}
        </div>
        @endif
        <div class="col-md-8 offset-md-2">
            <form action="{{ route('teacher.tests.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">სათაური</label>
                    <input type="text" name="title" id="title" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="start_test">ტესტის დაწყება</label>
                    <input type="datetime-local" name="start_test" id="start_test" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="end_test">ტესტის დასრულება</label>
                    <input type="datetime-local" name="end_test" id="end_test" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="question">აირჩიე შეკითხვები:</label>
                    <select name="question[]" class="form-control" id="question" multiple size="3" required>
                        @foreach ($questions as $question)
                        <option>{{ $question->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="group">აირჩიე ჯგუფი:</label>
                    <select name="group[]" class="form-control" id="group" multiple size="3" required>
                        @foreach ($groups as $group)
                        <option>{{ $group->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success">შექმნა</button>
            </form>
        </div>
    </div>
</div>
@endsection