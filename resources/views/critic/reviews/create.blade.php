@extends('layouts.app')
@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="card">
        <div class="card-header">
          {{  $movie->title  }}: Add a Review
        </div>
        <div class="card-body">
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
              @endforeach
            </ul>
        </div>
        @endif
        <form method="POST" action="{{route('critic.reviews.store', $movie->id)}}" >
        <input type="hidden" name="_token" value="{{csrf_token()}}">

          <div class="form-group">
            <label for ="title">Title </label>
            <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}"/>
          </div>

          <div class="form-group">
            <label for ="body">Body </label>
            <input type="text" class="form-control" id="body" name="body" value="{{old('body')}}"/>
          </div>

          <a href="{{route ('user.movies.show',  $movie->id)}}" class="btn btn-link">Cancel</a>
          <button type="submit" class="btn btn-primary float-right">Submit</button>


        </form>
      </div>

    </div>

  </div>

</div>
</div>

@endsection
