@extends('layouts.app')
@section('content')
  <h3 class="text-center">{{$movie->title}}</h3>
    <p>{{$movie->director}}</p>
      <p>{{$movie->company}}</p>
        <p>{{$movie->runtime}}</p>
          <p>{{$movie->boxoffice}}</p>
            <p>{{$movie->body}}</p>

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
                                   <th>Actions</th>
                                   <th>Created by:</th>
                                 </thead>
                                <tbody>
                                  @foreach ($reviews as $review)
                                  <tr>
                                     <th>{{ $review->title}}</th>
                                       <th>{{ $review->body}}</th>
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


@endsection
