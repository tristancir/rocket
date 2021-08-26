@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Discord</h2>
  <div class="row">
    <div class="card">
      <div class="card-header">
        Authorize
      </div>
      <div class="card-body">
        <p><a class="btn btn-primary" href="{{ $authorizeUrl }}">Authorize through Discord</a></p>
        <p><a class="btn btn-primary" href="{{ $authorizeWebhookUrl }}">Authorize Webhook through Discord</a></p>
      </div>
    </div>
  </div>
</div>
@stop