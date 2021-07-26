@extends('layouts.teacher')
@section('content')
<div class="container mt-4">
    <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                <h3 class="box-title">@lang('Teacher Subject table')</h3>
                <button class="col-2 m-0 mb-2 p-0 border-0"><a class="btn btn-block btn-success" href="{{ Route('teacher.subjects.create') }}"> @lang('Add subject') </a></button>
                
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody><tr>
                    <th>@lang('Subject ID')</th>
                    <th>@lang('Subject Name')</th>
                    <th>@lang('Created Date')</th>
                    <th>@lang('Updated Date')</th>
                    <th></th>
                    <th></th>
                    </tr>
                    @foreach( $subjects as $subject ) 
                        <tr> 
                            <td>{{ $subject->id }}</td>
                            <td>{{ $subject->name }}</td>
                            <td>{{ $subject->created_at }}</td>
                            <td>{{ $subject->updated_at }}</td>
                            <td><button class="m-0 p-0 border-0"><a class="btn btn-block btn-warning text-white" href="{{ Route('teacher.subjects.edit', [$subject]) }}">@lang('edit')</a></button></td>
                            <td><button class="m-0 p-0 border-0">
                                <form action="{{ Route('teacher.subjects.destroy', [$subject]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                    <button class="m-0 border-0 btn btn-danger">@lang('delete')</button>
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
            {{ $subjects->links() }}
</div>

@endsection

