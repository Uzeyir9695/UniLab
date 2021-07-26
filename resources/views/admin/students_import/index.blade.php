@extends('layouts.admin')


@section('content')

<div class="form-group">
    <form action="{{ Route('admin.students_import.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <label for="file">Add students to the database</label></br/>
    <input type="file" name="excel" >
    <br />
    <button class="m-2 btn btn-info">@lang('Upload')</button>
    

   @if(isset($errors) && $errors->any())
        @foreach( $errors->all() as $err)
        <p class="help-block danger">{{$err}}</p>
        @endforeach
    @endif
    </form>
</div>

@endsection
