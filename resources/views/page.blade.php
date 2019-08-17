@extends('layouts.site')

@section('content')

<script src="https://kit.fontawesome.com/96687dbbfc.js"></script>

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
        <p style="overflow: hidden;
        text-overflow: ellipsis;
        -webkit-line-clamp: 3;
        display: -webkit-box;
        -webkit-box-orient: vertical;
        ">{{$article->desc}}</p>
<!-- <i class="fas fa-trash"></i><i class="far fa-calendar-check"></i><i class="fas fa-trash-alt"></i><i class="far fa-calendar-alt"></i><i class="far fa-eye"></i> -->
        <p>Date of publication: <span style="font-weight: 600;"><i class="far fa-calendar-check"> </i> <?php echo date_format($article->created_at,"d.m.Y");?></span></p>
        <p>Views: <span style="font-weight: 600;"><i class="far fa-eye"> </i> <?php echo $article->views;?></span></p>
        <p><a class="btn btn-secondary" href="{{route('articleShow',['id'=>$article->id])}}" role="button">Learn more <i class="fas fa-book-open"></i></a></p>

        <form action="{{route('articleDelete',['article'=>$article->id])}}" method="POST">
        <!-- <input type="hidden" name="_method" value="DELETE"> -->
        {{method_field('DELETE')}}

          <button type="submit" class="btn btn-danger">
            Delete <i class="fas fa-trash-alt"></i>
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