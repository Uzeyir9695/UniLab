@extends('layouts.teacher')
@section('content')
<div class="container mt-4">
    <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                <h3 class="box-title">@lang('Teacher group table')</h3>
                <button class="col-2 m-0 mb-2 p-0 border-0"><a class="btn btn-block btn-success" href="{{ Route('teacher.groups.create') }}"> @lang('Add subject') </a></button>
                
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody><tr>
                    <th>@lang('group ID')</th>
                    <th>@lang('group Name')</th>
                    <th>@lang('Subject Name')</th>
                    <th>@lang('group Date')</th>
                    <th>@lang('group Date')</th>
                    <th></th>
                    <th></th>
                    </tr>
                    @foreach( $groups as $group ) 
                        <tr> 
                            <td>{{ $group->id }}</td>
                            <td>{{ $group->name }}</td>
                            <td>{{ $group->subject->name }}</td>
                            
                            <td>{{ $group->created_at }}</td>
                            <td>{{ $group->updated_at }}</td>
                            <td><button class="m-0 p-0 border-0"><a class="btn btn-block btn-info text-white" href="{{ Route('teacher.groups.show', [$group]) }}">@lang('show')</a></button></td>
                            <td><button class="m-0 p-0 border-0"><a class="btn btn-block btn-warning text-white" href="{{ Route('teacher.groups.edit', [$group]) }}">@lang('edit')</a></button></td>
                            <td><button class="m-0 p-0 border-0">
                                <form action="{{ Route('teacher.groups.destroy', [$group]) }}" method="post">
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
            {{ $groups->links() }}
</div>

@endsection

