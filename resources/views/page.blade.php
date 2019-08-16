@extends('layouts.site')

@section('content')

<main role="main">

  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div style="background-image:url(../img/index.jpg);background-repeat: no-repeat;
  background-size: cover;
  background-position: center; height: 280px;">
    <div class="container" style="padding-top: 40px;">
      <h3 class="display-4" style="color:white; text-align: center; text-shadow: black 2px 2px 2px;"><b>{{$header}}</b></h3>
    </div>
  </div>

  <div class="container" style="margin-top: 14px;">
    <!-- Example row of columns -->
    <div class="row">
    @foreach($articles as $article)
      <div class="col-md-4" style="margin: 10px 0;">

        <h3><span style="font-size: 24px; font-weight: 700;">{{$article->country}}</span><span>, </span><span style="font-size: 21px;">{{$article->place}}</span></h3>
        <p><img src="../img/{{$article->image}}" width="100%" height="190px"></p>
        <p style="height: 4.4em; /* exactly three lines */
        overflow: hidden;
text-overflow: ellipsis;
-webkit-line-clamp: 3;
display: -webkit-box;
-webkit-box-orient: vertical;
">{{$article->desc}}</p>
        <p>Date of publication: <span style="font-weight: 600;"><?php echo date_format($article->updated_at,"d.m.Y"); ?></span></p>
        <p><a class="btn btn-secondary" href="{{route('articleShow',['id'=>$article->id])}}" role="button">Learn more &raquo;</a></p>

        <form action="{{route('articleDelete',['article'=>$article->id])}}" method="POST">
        <!-- <input type="hidden" name="_method" value="DELETE"> -->
        {{method_field('DELETE')}}

          <button type="submit" class="btn btn-danger">
            Delete
          </button>
          @csrf
        </form>
      </div>

    @endforeach
      
    </div>

    <hr>

  </div> <!-- /container -->

</main>
@endsection