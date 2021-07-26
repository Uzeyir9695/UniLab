@extends('layouts.teacher')
@section('content')
    <form method="post" action="{{ Route('teacher.groups.store') }}"> 
        @csrf
        @method('POST')
        <div class="form-group row col-10 ml-2">
            <label class="col-12 mb-0">@lang('Group name')</label>
            <input type="text" 
                   class="form-control col-6"
                   id="teacherGroupName" 
                   name="name"   
                   placeholder="{{ __( 'Enter ... ' ) }}" 
                   value="{{ old('name') ? old('name') : '' }}" 
                />
            
            @error('name')
                <p class="col-12 text-danger">{{ $errors->first('name') }}</p>
            @enderror
            <div class="m-0 p-0 col-12">
                <label>@lang('Choose Subject')</label>
                <select name="subject_id" class="form-control col-6">
                    @foreach( $groups as $group)
                        <option class="col-12" value="{{ $group->subject->id }}">{{ $group->subject->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 mt-2 p-0">
                <button class="col-2 pt-2 pb-2 btn-success rounded border-0">@lang('Add Group')</button>
            </div>
        </div>
    </form>
@endsection