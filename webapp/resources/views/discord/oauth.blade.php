@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Discord</h2>
  <div class="row">
    <div class="card">
      <div class="card-header">
        Response
      </div>
      <div class="card-body">
        <p>{{ $response ? $response->getBody() : 'null' }}</p>
      </div>
    </div>
  </div>
</div>
@stop