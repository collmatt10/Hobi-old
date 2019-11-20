@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          Movies
           <a href="{{  route('admin.movies.create') }}" class=" float-right btn btn-primary" >Add</a>
        </div>
       <div class="card-body">
         @if (count($movies) === 0)
         <p>There are no Movies ! </p>
         @else
          <table id="table-movies" class="table table-hover">
            <thead>
              <th>Title</th>
              <th>Director</th>
              <th>Company</th>
              <th>Boxoffice</th>
              <th>Runtime</th>
              <th>Actions</th>
            </thead>
            <tbody>
              @foreach ($movies as $movie)
              <tr data=id="{{$movie->id}}">
              <td>{{  $movie->title  }}</td>
              <td>{{  $movie->director  }}</td>
              <td>{{  $movie->company  }}</td>
              <td>{{  $movie->runtime  }}</td>
              <td>{{  $movie->boxoffice  }}</td>
              <td>
                <a href="{{route ('admin.movies.show', $movie->id) }}" class="btn btn-default">View</a>
                <a href="{{route ('admin.movies.edit', $movie->id) }}" class="btn btn-warning">Edit</a>
                <form style="display:inline-block" method="POST" action="{{ route ('admin.movies.destroy', $movie->id)   }}">
                  <input type="hidden" name="_method" value="DELETE">
                  <input type="hidden" name="_token" value="{{ csrf_token()  }}">
                  <button type="submit" class="form-control btn btn-danger">Delete</a>
                </form>
              </td>
            </tr>
              @endforeach
            </tbody>
          </table>
          @endif
       </div>
      </div>
     </div>
    </div>
   </div>
@endsection
