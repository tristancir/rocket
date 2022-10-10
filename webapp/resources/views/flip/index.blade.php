@extends('layouts.app')
@section('content')
<div class="">
    <div class="">
    </div>
    <div class="grid grid-cols-2">
        @foreach ( $flips as $item )
            <div class="text-center">
                <div class="">
                    <img class="inline-block h-64" src="{{ \TristanRock\ImageProxy::src($item->content) }}">
                </div>
                <div class="mb-4">
                    {{ $item->flip_item_id }} <input value="{{ $item->content }}" disabled>
                </div>
            </div>
        @endforeach
    </div>
</div>
@stop
