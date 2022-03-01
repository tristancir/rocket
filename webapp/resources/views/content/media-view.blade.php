@extends('layouts.app')

@section('content')
<div class="">
@foreach($content as $m)
    <div class="">
        <div class=""><img style="height:64px" src="{{ $m }}"></div>
        <div class="">{{ $m }}</div>
    </div>
@endforeach
</div>

@endsection
