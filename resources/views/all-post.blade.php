@extends('layouts.app')
@section('content')
<div class="container">
	<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Author</th>
      <th scope="col">Tags</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($post as $row)
    <tr>
      <th scope="row">{{ $row->id }}</th>
      <td>{{ $row->title }}</td>
      <td>{{ $row->author }}</td>
      <td>{{ $row->tag }}</td>
      <td>
      	<a href="" class="btn btn-sm btn-info">Edit</a>
      	<a href="" class="btn btn-sm btn-danger">Delete</a>
      </td>
    </tr>
   
    @endforeach
  </tbody>
</table>

</div>


@endsection