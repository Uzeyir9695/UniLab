@extends('layouts.teacher')
@section('content')
    <form method="post" action="{{ Route('teacher.groups.update', [$group]) }}"> 
        @csrf
        @method('PUT')
        <div class="form-group row col-10 ml-2">
            <label class="col-12 mb-0">@lang('Edit group'): {{ $group->name }}</label>
            <input type="text" 
                   class="form-control col-6"
                   name="name"   
                   placeholder="{{ __('Enter ...') }}" 
                   value="{{ old('name') ? old('name') : $group->name }}" 
                />
            <button class="col-2 btn-success ml-1 rounded border-0">@lang('edit')</button>
            @error('name')
                <p class="col-12 text-danger">{{ $errors->first('name') }}</p>
            @enderror
            <div class="m-0 p-0 col-12">
                <label>@lang('Choose Subject')</label>
                <select name="subject_id" class="form-control col-6">
                    @foreach( $subjects as $subject)
                        <option class="col-12" value="{{ $subject->id }}">{{ $subject->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </form>
@endsection