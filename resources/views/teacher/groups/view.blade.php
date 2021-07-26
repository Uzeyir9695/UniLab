@extends('layouts.teacher')
@section('content')
<div class="col-xs-12 pt-2">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">@lang('Group'):</h3>
            </div>

            <div>
            <form action="{{ Route('teacher.students-groups.store', $id) }}" method="post">
              <div class="form-group col-8 row">
              @csrf
              @method('POST')
                    <label class="col-12">@lang('Add student by email')</label>
                    <input type="email" 
                           name="email"
                          class="form-control col-8"
                          placeholder="{{ __('Enter email') }}" 
                      />
                  <button class="col-1 btn btn-success">Add</button>
                </div>
            </form> 
            <form action="{{ Route('teacher.students-groups.store', $id) }}" method="post">
            @csrf
            @method('POST')
              <div class="form-group col-8 row">
                  <label class="col-12">@lang('Add student by ID')</label>
                  <input type="number" 
                         name="id"
                         class="form-control col-8"
                         placeholder="{{ __('Enter ID') }}" 
                    />
                <button class="col-1 btn btn-success">Add</button>
              </div>
            </form>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
                  <th>@lang('Student id')</th>
                  <th>@lang('Student name')</th>
                  <th>@lang('Student email')</th>
                  <th>@lang('Delete Student')</th>
                </tr>

                @foreach($group as $student)
                  <tr>
                  <td>{{$student->student->id}}</td>
                  <td>{{$student->student->name}}</td>
                  <td>{{$student->student->email}}</td>
                  <td>
                    <form action="{{ Route('teacher.students-groups.destroy', [$student]) }}" method="post">
                    @csrf
                    @method('DELETE')
                      <button class="btn-danger border-0 round btn">@lang('Delete')</button>
                    </form>
                  </td>
                </tr>
                
                @endforeach

              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

@endsection