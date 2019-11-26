

@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="card">
        <div class="card-header">
          Movie: {{ $movie->title   }}
        </div>
       <div class="card-body">
          <table class="table table-hover">
            <tbody>
              <tr>
                <td>Title</td>
                  <td>{{ $movie->title }}</td>
              </tr>
              <tr>
                <td>Director</td>
                  <td>{{ $movie->director }}</td>
              </tr>
              <tr>
                <td>Company</td>
                  <td>{{ $movie->company}}</td>
              </tr>
              <tr>
                <td>Boxoffice</td>
                  <td>{{ $movie->boxoffice }}</td>
              </tr>
              <tr>
                <td>Runtime</td>
                  <td>{{$movie->runtime }}</td>
              </tr>
              <tr>
                <td>Body</td>
                  <td>{{ $movie->body }}</td>
              </tr>
            </tbody>

          </table>

          <a href="{{route ('admin.movies.index') }}" class="btn btn-default">Back</a>
          <a href="{{route ('admin.movies.edit', $movie->id) }}" class="btn btn-warning">Edit</a>
          <form style="display:inline-block" method="POST" action="{{ route ('admin.movies.destroy', $movie->id)   }}">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token()  }}">
            <button type="submit" class="form-control btn btn-danger">Delete</a>
          </form>

                  </div>
                </div>

                <div class="card">
                  <div class="card-header">
                    Reviews
                  </div>
                   <div class="card-body">


                               <h2>
                                 Reviews
                                   </h2>
                                 @if (count($reviews) == 0 )
                                   <p>there are no reviews for this movie</p>
                                   @else
                                   <table class="table">
                                     <thead>
                                       <th>Title</th>
                                       <th>Body</th>
                                      {{--  <th>Created By:</th>--}}
                                        <th>Actions</th>
                                     </thead>
                                    <tbody>
                                      @foreach ($reviews as $review)
                                      <tr>
                                         <th>{{ $review->title}}</th>
                                           <th>{{ $review->body}}</th>
                                          {{-- <th>{{ $review->user->name}}</th>--}}
                                           <th>
                                               <form style= "display:inline-block" method="POST" action="{{ route('admin.reviews.destroy', [ 'id' => $movie->id, 'rid' => $review->id ])   }}">
                                                 <input type="hidden" name="_method" value="DELETE">
                                                 <input type="hidden" name="_token" value="{{ csrf_token()}}">
                                                 <button type="submit" class="form-control btn btn-danger">Delete</a>
                                                 </form>
                                               </th>
                                             </tr>
                                             @endforeach
                                           </tbody>
                                         </table>
                                         @endif
                  </div>

              </div>
            </div>
          </div>
@endsection
