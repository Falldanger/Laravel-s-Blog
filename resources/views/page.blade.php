@extends('layouts.site')

@section('content')

<script src="https://kit.fontawesome.com/96687dbbfc.js"></script>

<main role="main">

  <!-- Header page -->
  <div style="background-image:url(../img/index.jpg);background-repeat: no-repeat;
  background-size: cover;
  background-position: center; height: 280px;">
    <div class="container" style="padding-top: 40px;">
      <h3 class="display-4" style="color:white; text-align: center; text-shadow: black 2px 2px 2px;"><b>{{$header}}</b></h3>
    </div>
  </div>

  <!-- Content -->

  <div class="container" style="margin-top: 14px;">

  <!-- Filter -->

  <div class="row">
    <div class="col-md-12">
      <form action="{{route('user.index',['filter'=>request('filter'), 'sort'=>request('sort')])}}" style="margin-left: -38px;">
        <ul class="cent" id="ul-left">
          <li class="float-left">
            <label for="id_filter" style="padding-right: 10px; font-size: 17px; font-weight: 600;">Filter by: </label><input type="radio" name="filter" value="id" id="id_filter" checked="" {{request()->filter=='id'? 'checked' : ''}}><label for="id_filter" class="cur">Id</label>
          </li>
          <li class="float-left">
            <input type="radio" name="filter" value="views" id="views_filter" {{request()->filter=='views'? 'checked' : ''}}><label for="views_filter" class="cur">Views</label>
          </li>
        </ul>
        <ul class="cent" id="ul-right">
          <li class="float-left">
            <label for="is_desc" style="padding-left: 20px;
        padding-right: 10px; font-size: 17px; font-weight: 600;">Sorting by: </label><input type="radio" name="sort" value="desc" id="is_desc" checked="" {{request()->sort=='desc'? 'checked' : ''}}><label for="is_desc" class="cur">Desc</label>
          </li>
          <li class="float-left">
            <input type="radio" name="sort" value="asc" id="is_asc" {{request()->sort=='asc'? 'checked' : ''}}><label for="is_asc" class="cur">Asc</label>
          </li>
        </ul>
        
        <button type="submit" class="btn btn-secondary" style="padding:6px 10px; margin-left: 6px;">Sort</button>
      </form>
    </div>
    
    <!-- Articles -->
    
    @foreach($articles as $article)
      <div class="col-md-4" style="margin: 10px 0;">

        <h3><span style="font-size: 24px; font-weight: 700;">{{$article->country}}</span><span>, </span><span style="font-size: 21px;">{{$article->place}}</span></h3>
        <p><img src="../img/{{$article->image}}" width="100%" height="190px"></p>
        <p style="height: 4.4em;
        overflow: hidden;
        text-overflow: ellipsis;
        -webkit-line-clamp: 3;
        display: -webkit-box;
        -webkit-box-orient: vertical;
        ">{{$article->desc}}</p>
<!-- <i class="fas fa-trash"></i><i class="far fa-calendar-check"></i><i class="fas fa-trash-alt"></i><i class="far fa-calendar-alt"></i><i class="far fa-eye"></i> -->
        <p>Date of publication: <span style="font-weight: 600;"><i class="far fa-calendar-check"> </i> <?php echo date_format (new DateTime($article->created_at), 'd-m-Y');?></span></p>
        <p>Views: <span style="font-weight: 600;"><i class="far fa-eye"> </i> <?php echo $article->views;?></span></p>
        <p><a class="btn btn-success" href="{{route('articleShow',['id'=>$article->id])}}" role="button">Learn more <i class="fas fa-book-open"></i></a></p>
        <p>

        @guest
        @if (Route::has('login'))
        @endif
        @elseif(Auth::user()->rank =='admin')

        
        <a href="{{route('articleEdit',['id'=>$article->id])}}" class="btn btn-dark" style="color:white;">
            Edit <i class="far fa-edit"></i>
        </a>
        </p>

        <form action="{{route('articleDelete',['article'=>$article->id])}}" method="POST">
        <!-- <input type="hidden" name="_method" value="DELETE"> -->
        {{method_field('DELETE')}}

          <button type="submit" class="btn btn-danger">
            Delete <i class="fas fa-trash-alt"></i>
          </button>
          @csrf
        </form>
        @endguest
      </div>

    @endforeach
      
    </div>

      <div class="col-md-12">
          {{$articles->links()}}
      </div>

    <hr>

  </div> <!-- /container -->

</main>
@endsection