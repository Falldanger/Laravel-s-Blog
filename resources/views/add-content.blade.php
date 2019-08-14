@extends('layouts.site')

@section('content')

<div class="jumbotron">
    <div class="container">
      <h1>{{$header}}</h1>
      <p>{{$message}}</p>
      <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
    </div>
  </div>

  <div class="container">
  	<div class="row">
  		<div class="form">
 			<form method="POST" action="{{route('articleStore')}}">
  				<div class="form-group">
  					<label for="title">Title</label>
  					<input type="text" class="form-control" id="title" name="title">
  				</div>
  				<div class="form-group">
  					<label for="alias">Alias</label>
  					<input type="text" class="form-control" id="alias" name="alias">
  				</div>
  				<div class="form-group">
  					<label for="exampleInputFile">Description</label>
  					<textarea class="form-control" name="desc"></textarea> 
  				</div>
  				<div class="form-group">
  					<label for="exampleInputFile">Whole text</label>
  					<textarea class="form-control" name="text"></textarea> 
  				</div>
  				<button type="submit">Submit</button>
  				@csrf
  			</form>
  		</div>
  	</div>
  </div>

@endsection