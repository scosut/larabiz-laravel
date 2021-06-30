@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
      <div class="panel-heading">
        {{$listing->name}}
        <a href="/listings" class="pull-right btn btn-default btn-xs">Go Back</a>
      </div>

      <div class="panel-body">
        <ul class="list-group">
          <li class="list-group-item">
            <strong>Address:</strong> {{$listing->address}}
          </li>
          <li class="list-group-item">
            <strong>Website:</strong> <a href="{{$listing->website}}" target="_blank">{{$listing->website}}</a>
          </li>
          <li class="list-group-item">
            <strong>Email:</strong> {{$listing->email}}
          </li>
          <li class="list-group-item">
            <strong>Phone:</strong> {{$listing->phone}}
          </li>          
        </ul>
        <hr />
        <div class="well">
          {{$listing->bio}}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection