@extends('welcome')
@section('content')

  <div class="post-preview">
          <a href="#">
            <h2 class="post-title">{{$singlepost->title}}</h2>
            <img src="{{URL::to($singlepost->image)}}" style="width: 183px; height: 275px;">
            <h6>{{ $singlepost->details }}</h6>
          </a>
          <p class="post-meta">Posted by
            <a href="#">{{$singlepost->author}}</a>
            on September 24, 2019</p>
  </div>

@endsection