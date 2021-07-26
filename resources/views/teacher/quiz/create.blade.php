@extends('layouts.teacher')
@section('content')
<div class="container" ng-app="">
    @if(Session::has('success'))
        <div class="col-md-8 alert alert-success alert-dismissible my-3 text-center">
            <button class="close" type="button" data-dismiss="alert">&times</button>
            {{ Session::get('success') }}
        </div>
    @endif 
    <form method="POST" action="{{ route('teacher.questions.store') }}">
    @csrf
        <div class="row">
            <div class="form-group">
                <label for="question">აირჩიეთ კითხვის ტიპი:</label><br>
                <select class="form-control list" name="optionsList" id="question" ng-model="questions">
                    <option value="" disabled selected>ტიპი არაა არჩეული</option>
                    <option value="brief-text" ng-model="brief">ტექსტური პასუხის გაცემა (მოკლე პასუხი)</option>
                    <option value="long-text" ng-model="long">ტექსტური პასუხის გაცემა (გრძელი პასუხი)</option>
                    <option value="test-radiobox"  ng-model="radio">ტესტები სავარაუდო პასუხებით (სწორი პასუხი არის 1)</option>
                    <option value="test-checkbox" ng-model="checkbox">ტესტები სავარაუდო პასუხებით (სწორი პასუხი შეიძლება, იყოს რამდენიმე)</option>
                    <option value="test-true-or-false" ng-model="isTrueOrFalse">ჭეშმარიტი / მცდარი</option>
                </select>
            </div>
        </div>
        <div class="row" ng-switch="questions">
            <div ng-switch-when="brief-text" class="add">
                <div class="form-group">
                    <label for="title" class="form-control-label">კითხვის ტექსტი (სათაური)</label><br>
                    <textarea class="form-control" id="title" name="title" cols="87" rows="2" required></textarea>
                </div>
                <div class="form-group">
                    <label for="description" class="form-control-label">კითხვის აღწერა</label><br>
                    <textarea class="form-control" id="description" name="description" cols="87" rows="2" required></textarea>
                </div>
                <label for="image" class="form-control-label">კითხვის ფოტო ან ფოტოები (ფოტოს ლინკ(ებ)ის ჩასმა)</label><i class="fas fa-plus ml-2" id="addImageLink"></i><br>
                <div class="form-inline">
                    <input type="url" class="form-control" id="image" name="image[]" required>
                </div>
                <div class="beforeVideo"></div>

                <label for="video" class="form-control-label">კითხვის ვიდეო ან ვიდეოები (youtube-ის ლინკ(ებ)ის მითითება)</label><i class="fas fa-plus ml-2" id="addVideoLink"></i><br>
                <div class="form-inline">
                    <input type="url" class="form-control" id="video" name="video[]" required>
                </div>
                <div class="beforeSubmit"></div>
            </div>

            <div ng-switch-when="long-text">
                <div class="form-group">
                    <label for="title" class="form-control-label">კითხვის ტექსტი (სათაური)</label><br>
                    <textarea class="form-control" @error('title') is-invalid @enderror id="title" name="title" cols="87" rows="2" required></textarea>
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description" class="form-control-label">კითხვის აღწერა</label><br>
                    <textarea class="form-control" @error('description') is-invalid @enderror id="description" name="description" cols="87" rows="2" required></textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <label for="image" class="form-control-label">კითხვის ფოტო ან ფოტოები (ფოტოს ლინკ(ებ)ის ჩასმა)</label><i class="fas fa-plus ml-2" id="addImageLink"></i><br>
                <div class="form-inline">
                    <input type="url" class="form-control" @error('image') is-invalid @enderror id="image" name="image[]" required>
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="beforeVideo"></div>

                <label for="video" class="form-control-label">კითხვის ვიდეო ან ვიდეოები (youtube-ის ლინკ(ებ)ის მითითება)</label><i class="fas fa-plus ml-2" id="addVideoLink"></i><br>
                <div class="form-inline">
                    <input type="url" class="form-control" @error('video') is-invalid @enderror id="video" name="video[]" required>
                    @error('video')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="beforeSubmit"></div>
            </div>

            <div ng-switch-when="test-radiobox">
                <div class="row mt-5 mb-5 col offset-sm-1"><h4>სწორი პასუხია მხოლოდ ერთი</h4></div>
                <div class="form-group">
                    <label for="title" class="form-control-label">კითხვის ტექსტი (სათაური)</label><br>
                    <textarea class="form-control" @error('title') is-invalid @enderror id="title" name="title" cols="87" rows="2" required></textarea>
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description" class="form-control-label">კითხვის აღწერა</label><br>
                    <textarea class="form-control" @error('description') is-invalid @enderror id="description" name="description" cols="87" rows="2" required></textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <label for="image" class="form-control-label">კითხვის ფოტო ან ფოტოები (ფოტოს ლინკ(ებ)ის ჩასმა)</label><i class="fas fa-plus ml-2" id="addImageLink"></i><br>
                <div class="form-inline">
                    <input type="url" class="form-control" @error('image') is-invalid @enderror id="image" name="image[]" required>
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="beforeVideo"></div>

                <label for="video" class="form-control-label">კითხვის ვიდეო ან ვიდეოები (youtube-ის ლინკ(ებ)ის მითითება)</label><i class="fas fa-plus ml-2" id="addVideoLink"></i><br>
                <div class="form-inline">
                    <input type="url" class="form-control" @error('video') is-invalid @enderror id="video" name="video[]" required>
                    @error('video')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="beforeSubmit"></div>

                <h5 class="mt-4 text-center">სავარაუდო პასუხები</h5>
                <span class=" mr-5" style="font-size: 18px"> ველის დამატება: <i class="fas fa-plus" id="addOption"></i></span><br />
                <div class="form-inline">
                    <select class="form-control" name="correct_answer[]">
                        <option value="true">სწორია</option>
                        <option value="false">არასწორია</option>
                    </select>
                    <input type="text" name="option[]" id="option" class="form-control input my-2" autocomplete="off" required>
                </div>
                <div class="beforeOption"></div>
            </div>

            <div ng-switch-when="test-checkbox">
                <div class="row mt-5 mb-5 col offset-sm-1"><h4>პასუხი შეიძლება იყოს ერთი ან რამდენიმე</h4></div>
                <div class="form-group">
                    <label for="title" class="form-control-label">კითხვის ტექსტი (სათაური)</label><br>
                    <textarea class="form-control" @error('title') is-invalid @enderror id="title" name="title" cols="87" rows="2" required></textarea>
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description" class="form-control-label">კითხვის აღწერა</label><br>
                    <textarea class="form-control" @error('description') is-invalid @enderror id="description" name="description" cols="87" rows="2" required></textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <label for="image" class="form-control-label">კითხვის ფოტო ან ფოტოები (ფოტოს ლინკ(ებ)ის ჩასმა)</label><i class="fas fa-plus ml-2" id="addImageLink"></i><br>
                <div class="form-iniline">
                    <input type="url" class="form-control" @error('image') is-invalid @enderror id="image" name="image[]" required>
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="beforeVideo"></div>

                <label for="video" class="form-control-label">კითხვის ვიდეო ან ვიდეოები (youtube-ის ლინკ(ებ)ის მითითება)</label><i class="fas fa-plus ml-2" id="addVideoLink"></i><br>
                <div class="form-iniline">
                    <input type="url" class="form-control" @error('video') is-invalid @enderror id="video" name="video[]" required>
                    @error('video')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="beforeSubmit"></div>

                <h5 class="mt-4 text-center">სავარაუდო პასუხები</h5>
                <span class=" mr-5" style="font-size: 18px"> ველის დამატება: <i class="fas fa-plus" id="addOption"></i></span><br />
                <div class="form-inline">
                    <select class="form-control" name="correct_answer[]">
                        <option value="true">სწორია</option>
                        <option value="false">არასწორია</option>
                    </select>
                    <input type="text" name="option[]" id="option" class="form-control input my-2" autocomplete="off" required>
                </div>
                <div class="beforeOption"></div>
            </div>

            <div ng-switch-when="test-true-or-false">
                <div class="row mt-5 mb-5 col offset-sm-1"><h4>ჭეშმარიტია თუ მცდარი?</h4></div>
                <div class="form-group">
                    <label for="title" class="form-control-label">კითხვის ტექსტი (სათაური)</label><br>
                    <textarea class="form-control" @error('title') is-invalid @enderror id="title" name="title" cols="87" rows="2" required></textarea>
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description" class="form-control-label">კითხვის აღწერა</label><br>
                    <textarea class="form-control" @error('description') is-invalid @enderror id="description" name="description" cols="87" rows="2" required></textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <label for="image" class="form-control-label">კითხვის ფოტო ან ფოტოები (ფოტოს ლინკ(ებ)ის ჩასმა)</label><i class="fas fa-plus ml-2" id="addImageLink"></i><br>
                <div class="form-inline">
                    <input type="url" class="form-control" @error('image') is-invalid @enderror id="image" name="image[]" required>
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="beforeVideo"></div>

                <label for="video" class="form-control-label">კითხვის ვიდეო ან ვიდეოები (youtube-ის ლინკ(ებ)ის მითითება)</label><i class="fas fa-plus ml-2" id="addVideoLink"></i><br>
                <div class="form-inline">
                    <input type="url" class="form-control" @error('video') is-invalid @enderror id="video" name="video[]" required>
                    @error('video')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="beforeSubmit"></div>

                <div class="form-check">
                    <label for="true" class="form-check-label">
                        <input type="radio" name="correct_answer[]" value="true" class="form-check-input" id="true"> ჭეშმარიტია
                    </label>
                </div>
                <div class="form-check mb-3">
                    <label for="false" class="form-check-label">
                        <input type="radio" name="correct_answer[]" value="false" class="form-check-input" id="false"> მცდარია
                    </label>
                </div>
            </div>
        </div> 
        <div class="form-group mt-4 float-left hideButton">
            <button type="submit" class="btn btn-primary">დამატება</button>
        </div>
    </form>
</div>
@endsection