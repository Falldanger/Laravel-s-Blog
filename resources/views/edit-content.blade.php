@extends('layouts.site')

@section('content')

<div class="jumbotron">
    <div class="container">
      <h1>A form of editing records</h1>
      <p>Try to edit this article</p>
    </div>
  </div>


<div class="container">
	<b style="color:red;"><?php if(isset($error)){echo $error;} ?></b>
</div>
  <div class="container">
  
 			<form method="post" name="upload" enctype="multipart/form-data" action="{{route('articleUpdate',['id'=>$post->id])}}">
 			<div class="row">	
  				<div class="col-md-6" >
  					<label for="country">Country</label>
  					<input type="text" class="form-control" id="country" name="country" maxlength="25" required="" value="{{$post->country}}">
  				</div>
  				<div class="col-md-6">
  					<label for="place">Place</label>
  					<input type="text" class="form-control" id="place" name="place" maxlength="30" required="" value="{{$post->place}}">
  				</div>
  				<div class="col-md-6" style="margin-top: 10px">
  					<label for="exampleInputFile">Description</label>
  					<textarea class="form-control" name="desc" maxlength="255" required="">{{$post->desc}}</textarea> 
  				</div>
  				<div class="col-md-6" style="margin-top: 10px">
  					<label for="exampleInputFile">Text</label>
  					<textarea class="form-control" name="text" required="">{{$post->text}}</textarea> 
  				</div>
  				<div class="col-md-6" style="margin-top: 10px">
  					<label for="image">Image</label>
  					<p>
  						<input type="file" name="image">
  					</p> 
  				</div>
  				<div class="col-md-6" style="margin-top: 40px;">
  					<input type="submit" name="upload" style="width: 160px; height: 40px; background: #4682B4; color: white; font-weight: 600; border-radius: 8px; border-color: 2px solid #ADD8E6; text-align: center; vertical-align: center; padding-top: 4px;" value="Submit">
  				</div>
  				@csrf
  			</div>
  			</form>
  		<hr>
  </div>
@endsection