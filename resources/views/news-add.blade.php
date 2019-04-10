@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row justify-content-center">
	  <div class="col-md-10">
	  	@if($errors->any())
	  	<div class="alert alert-danger">
         <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
         </ul>
        </div>
      @endif
	  </div>
	</div>
	<a href="{{route('all.news')}}" class="btn btn-success">All News</a>

<form action="{{ url('insert-news') }}" method="post" enctype="multipart/form-data">
        @csrf
      <div class="modal-body">
  <div class="form-group">
    <label for="exampleFormControlInput1">Title</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Title" name="title">
  </div>
   <div class="form-group">
    <label for="exampleFormControlInput1">Author</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Author Name"  name="author">
  </div>
   <div class="form-group">
    <label for="exampleFormControlInput1">Image</label>
    <input type="file" name="image">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Example textarea</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="details"></textarea>
  </div>

        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
</div>
@endsection