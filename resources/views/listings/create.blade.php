@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
      <div class="panel-heading">
        Create Listing
        <a href="/dashboard" class="btn btn-default btn-xs pull-right">Go Back</a>
      </div>

      <div class="panel-body">
        {!! Form::open(['action' => 'ListingsController@store', 'method' => 'post', 'id' => 'frmListing']) !!}
          {{ Form::bsText('name', null, ['placeholder' => 'Company name']) }}
          {{ Form::bsText('website', null, ['placeholder' => 'Company website']) }}
          {{ Form::bsText('email', null, ['placeholder' => 'Contact email']) }}
          {{ Form::bsText('phone', null, ['placeholder' => 'Contact phone']) }}
          {{ Form::bsText('address', null, ['placeholder' => 'Business address']) }}
          {{ Form::bsTextarea('bio', null, ['placeholder' => 'About this business']) }}
          {{ Form::bsSubmit(null, ['class' => 'btn btn-primary']) }}
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endsection