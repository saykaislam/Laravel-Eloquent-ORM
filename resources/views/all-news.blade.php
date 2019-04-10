@extends('layouts.app')
@section('content')
<div class="container">
	<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Author</th>
      <th scope="col">Image</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($news as $row)
    <tr>
      <th scope="row">{{ $row->id }}</th>
      <td>{{ $row->title }}</td>
      <td>{{ $row->author }}</td>
      <td><img src="{{URL::to($row->image)}}" style="height: 80px; width: 80px;"></td>
      <td>
      	<a href="" class="btn btn-sm btn-info">Edit</a>
      	<a href="{{ URL::to('/delete-news/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a>
      </td>
    </tr>
   
    @endforeach
  </tbody>
</table>

</div>


@endsection