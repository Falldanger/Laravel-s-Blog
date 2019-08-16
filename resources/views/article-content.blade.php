@extends('layouts.site')

@section('content')
<main role="main">
  <div class="container">
    <!-- Example row of columns -->
    <div class="row">

    @if($article)
    
      <div style="margin-top:10px;">
        <h2>{{$article->country}}, {{$article->place}}</h2>
        <p><img src="../img/{{$article->image}}" width="700px" height="380px"></p>
        <p style="font-size: 18px;">{!!$article->text!!}</p>
      </div>

      @endif

  
    </div>

    <hr>

  </div> <!-- /container -->

</main>
@endsection