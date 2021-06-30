@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
      <div class="panel-heading">
        Edit Listing
        <a href="/dashboard" class="btn btn-default btn-xs pull-right">Go Back</a>
      </div>

      <div class="panel-body">
        {!! Form::open(['action' => ['ListingsController@update', $listing->id], 'method' => 'post', 'id' => 'frmListing']) !!}
          {{ Form::bsText('name', $errors->has('name') ? old('name') : $listing->name, ['placeholder' => 'Company name']) }}
          {{ Form::bsText('website', $listing->website, ['placeholder' => 'Company website']) }}
          {{ Form::bsText('email', $errors->has('email') ? old('email') : $listing->email, ['placeholder' => 'Contact email']) }}
          {{ Form::bsText('phone', $listing->phone, ['placeholder' => 'Contact phone']) }}
          {{ Form::bsText('address', $listing->address, ['placeholder' => 'Business address']) }}
          {{ Form::bsTextarea('bio', $listing->bio, ['placeholder' => 'About this business']) }}
          {{ Form::hidden('_method', 'PUT')}}
          {{ Form::bsSubmit(null, ['class' => 'btn btn-primary']) }}
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endsection