@extends('layouts.teacher')
@section('content')

<div class="container">
  <h3 class="text-center">ტესტების ლისტი</h3>
  <table class="table table-dark table-striped mt-5">
    <thead>
      <tr>
        <th>
          <h5>ჯამში: {{ $tests->count() }} ტესტია</h5>
        </th>
      </tr>
    </thead>
    <thead class="text-center">
      <tr>
        <th>ID</th>
        <th>სათაური</th>
        <th>ჯგუფი</th>
        <th>დაწყება</th>
        <th>დასრულება</th>
      </tr>
    </thead>
    <tbody class="text-center">
      @forelse($tests as $test)
        @php
        $group_names = App\Models\TestGroup::where('test_id', $test->id)->get();
        @endphp
        @foreach ($group_names as $group_name)
          <tr>
            <td>{{ $test->id }}</td>
            <td>{{ $test->title }}</td>
            <td>{{ $group_name->group->name }}</td>
            <td>{{ $test->start }}</td>
            <td>{{ $test->end }}</td>
            <td><a href="{{ URL::to('teacher/tests/'.$test->id.'/edit') }}"><i
                  style="color: rgb(37, 204, 22); cursor:pointer; font-size: 20px" class="fas fa-edit"></i></a></td>
            <td>
              <form action="{{ route('teacher.tests.destroy', $test->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn  mb-3"><i style="color: rgb(207, 71, 61); cursor:pointer; font-size: 20px"
                    class="fas fa-trash-alt"></i></button>
              </form>
            </td>
          </tr>
        @endforeach
      @empty
      <h5 class="text-center text-muted">ტესტი არ მოიძებნა!</h5>
      @endforelse
    </tbody>
  </table>

  {!! $tests->links() !!}

</div>
@endsection