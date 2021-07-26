@extends('layouts.teacher')
@section('content')
    <form method="post" action="{{ Route('teacher.subjects.update', [$subject]) }}"> 
        @csrf
        @method('PUT')
        <div class="form-group row col-10 ml-2">
            <label class="col-12 mb-0">@lang('Edit subject'): {{ $subject->name }}</label>
            <input type="text" class="form-control col-6" name="subject"  id="teacherSubject" placeholder="{{ __('Enter ...') }}" value="{{ old('name') ? old('name') : $subject->name }}" />
            <button class="col-2 btn-success ml-1 rounded border-0">@lang('edit')</button>
            @error('subject')
                <p class="col-12 text-danger">{{ $errors->first('subject') }}</p>
            @enderror
        </div>
    </form>
@endsection