@extends('layouts.app')

@push('head-styles')
<style>
.wrapper{
  margin: 0 40px 0 40px;
}
</style>
@endpush

@section('content')
<div class="wrapper">
<div class="row">
  <div class="col-sm-2">
    <img src="{{asset('/img/judge02.png')}}" /><span style="font-size:2em" class="badge badge-success">55</span>
  </div>
  <div class="col-sm-2">
    <img src="{{asset('/img/judge03.png')}}" /><span style="font-size:2em" class="badge badge-success">55</span>
  </div>
  <div class="col-sm-2">
    <img src="{{asset('/img/judge04.png')}}" /><span style="font-size:2em" class="badge badge-success">55</span>
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
    <img src="{{asset('/img/judge05.png')}}" /><span style="font-size:2em" class="badge badge-success">55</span>
  </div>
  <div class="col-sm-2">
    <img src="{{asset('/img/judge13.png')}}" /><span style="font-size:2em" class="badge badge-success">55</span>
  </div>
  <div class="col-sm-2">
    <img src="{{asset('/img/judge07.png')}}" /><span style="font-size:2em" class="badge badge-success">55</span>
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
    <img src="{{asset('/img/judge12.png')}}" /><span style="font-size:2em" class="badge badge-success">55</span>
  </div>
  <div class="col-sm-2">
    <img src="{{asset('/img/judge11.png')}}" /><span style="font-size:2em" class="badge badge-success">55</span>
  </div>
  <div class="col-sm-2">
    <img src="{{asset('/img/judge10.png')}}" /><span style="font-size:2em" class="badge badge-success">55</span>
  </div>
</div>
</div>
@stop