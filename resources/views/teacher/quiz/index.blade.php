@extends('layouts.teacher')
@section('content')
<a href="{{ route('teacher.questions.create') }}" class="btn btn-success float-right mr-5 mt-1">კითხვების დამატება</a>
<div class="container">
    <h3 class="text-center">კითხვების ლისტი</h3>           
    <table class="table table-dark table-striped mt-5">
      <thead>
        <tr>
          <th><h5>ჯამში: {{ $questions->count() }} კითხვაა</h5></th> 
        </tr>
      </thead>
      <thead class="text-center">
        <tr>
          <th>ID</th>
          <th>მასწავლებელი</th>
          <th>სათაური</th>
          <th>დაემატა</th>
          <th>ჩასწორება</th>
          <th>წაშლა</th>
        </tr>
      </thead>
      <tbody class="text-center">
          @forelse($questions as $question)
            <tr>
                <td>{{ $question->id }}</td>
                <td>{{ Auth::user()->name }}</td>
                <td>{{ $question->title }}</td>
                <td>{{ date('F d, Y - g:i a', strtotime($question->created_at)) }}</td>
                <td><a href="{{ URL::to('teacher/questions/'.$question->id.'/edit') }}"><i style="color: rgb(37, 204, 22); cursor:pointer; font-size: 20px" class="fas fa-edit"></i></a></td>
                <td>
                    <form action="{{ route('teacher.questions.destroy', $question->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn "><i style="color: rgb(207, 71, 61); cursor:pointer; font-size: 20px" class="fas fa-trash-alt"></i></button>         
                    </form>
                </td>
            </tr>
          @empty
             <h5 class="text-center text-muted">კითხვა არ მოიძებნა!</h5> 
          @endforelse
      </tbody>
    </table>

    {!! $questions->links() !!}

  </div>
  @endsection