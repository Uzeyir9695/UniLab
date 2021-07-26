@extends('layouts.teacher')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
        @if(Session::has('success'))
            <div class=" alert alert-success alert-dismissible my-3 text-center">
                <button class="close" type="button" data-dismiss="alert">&times</button>
                {{ Session::get('success') }}
            </div>
        @endif
        <form action="{{ route('teacher.questions.update', $questions->id) }}" method="POST">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="title" class="form-control-label">კითხვის ტექსტი (სათაური)</label><br>
                <textarea class="form-control" id="title" name="title" cols="87" rows="2" required>{{$questions->title}}</textarea>
            </div>
            <div class="form-group">
                <label for="description" class="form-control-label">კითხვის აღწერა</label><br>
                <textarea class="form-control" id="description" name="description" cols="87" rows="2" required>{{$questions->description}}</textarea>
            </div>
            <label for="image" class="form-control-label">კითხვის ფოტო ან ფოტოები (ფოტოს ლინკ(ებ)ის ჩასმა)</label><i class="fas fa-plus ml-2" id="addImageLink"></i><br>
            @foreach($questions->image as $image)
            <div class="form-inline">
                <input type="url" class="form-control" value="{{ $image }}" id="image" name="image[]" required><i style="font-size: 20px" class="fas fa-trash-alt ml-2 removeOption"></i>
            </div>
            @endforeach
            <div class="beforeVideo"></div>
            <label for="video" class="form-control-label video mt-4">კითხვის ვიდეო ან ვიდეოები (youtube-ის ლინკ(ებ)ის მითითება)</label><i class="fas fa-plus ml-2" id="addVideoLink"></i><br>
            
            @foreach($questions->video as $video)
                <div class="form-inline">
                    <input type="url" class="form-control" value="{{ $video }}" id="video" name="video[]" required><i style="font-size: 20px" class="fas fa-trash-alt ml-2 removeOption"></i>
                </div>
            @endforeach
            <div class="beforeSubmit"></div>

            @if( $isOptionNull != null )
                <h5 class="mt-4 text-center before">სავარაუდო პასუხები</h5>
                <span class=" mr-5" style="font-size: 18px"> ველის დამატება: <i class="fas fa-plus" id="addOption"></i></span><br />
                @foreach ($questions->options as $option)
                @foreach ($option->options as $key=>$value)
                <div class="form-inline after">
                    <select class="form-control" name="correct_answer[]">
                        <option value="true" {{ $option->correct_answer[$key] == 'true'? 'selected' : ''  }}>სწორია</option>
                        <option value="false" {{ $option->correct_answer[$key] == 'false'? 'selected' : ''  }}>არასწორია</option>
                    </select>
                    <input type="text" name="option[]" id="option" value="{{ $value }}" class="form-control input my-2" autocomplete="off" required><i style="font-size: 20px" class="fas fa-trash-alt ml-2 removeOption"></i>
                </div>
                @endforeach
                @endforeach
                <div class="beforeOption"></div>
                    
            @elseif($isTrueOrFalse != null)
                <h5 class="mt-4 text-center before">სავარაუდო პასუხები</h5>
                <div class="form-check before">
                    <label for="true" class="form-check-label">
                        <input type="radio" name="correct_answer[]" value="true" {{ $isTrueOrFalse[0] == 'true'? 'checked' : ''  }}  class="form-check-input" id="true"> სწორია
                    </label>
                </div>
                <div class="form-check mb-3">
                    <label for="false" class="form-check-label">
                        <input type="radio" name="correct_answer[]" value="false" {{ $isTrueOrFalse[0] == 'false'? 'checked' : ''  }} class="form-check-input" id="false"> არასწორია
                    </label>
                </div>
            @endif
                
            <div class="form-group mt-4 mr-5 float-left">
                <button type="submit" class="btn btn-primary">განახლება</button>
            </div>
        </form>
        <a href="{{ URL::to('teacher/questions') }}" class="btn btn-warning mt-4">უკან დაბრუნება</a>
        </div>
    </div>
</div>
@endsection