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
  <div class="offset-sm-2 col-sm-8">
  @foreach($feeds as $feed)
    <a class="btn-sm btn-primary" href="{{ url('/feed/filter/'.$feed->filter.'/offset/0' ) }}">{{ $feed->name }}</a>
  @endforeach
  </div>
</div>

<div class="row">
  <div class="offset-sm-3 col-sm-6">
  @if ( ! empty($filter) )
  <a href="/feed/filter/{{$filter}}/offset/{{$offset}}" class="btn btn-success">Next</a>
  @else
  <a href="/feed/offset/{{$offset}}" class="btn btn-success">Next</a>
  @endif
  Filter "{{ $filter }}"
  </div>
</div>

<div class="row">
  <div class="col-sm-12">
  @foreach($posts as $post)
    @php
      $blog = preg_replace('/https?:\/\/([^\.]+).*/', '$1', $post->guid);
      switch($blog){
        case 'circnation': $css = 'label-purple';break;
        case 'smashbeauty': $css = 'label-pink';break;
        case 'twinkbook': $css = 'label-aqua';break;
        case 'shemaleview': $css = 'label-lightpink';break;
        case 'uncutguyscock': $css = 'label-lightseagreen';break;

        default: $css = 'label-blue';break;
      }
    @endphp
    <div class="row">
      <div class="col-sm-8">
        <div class="box">
          <div class="box-body">
            {!! $post->description !!}
          </div>
        </div> <!-- .box -->
      </div><!-- .col -->
      <div class="col-sm-4">
        <div class="box">
          <div class="box-head">
            <h1><span class="{{$css}}">{{ $blog }}</span></h1>
            <p>{{ $post->title }}</p>
            <p>Feed {{ $post->feed_id }}
            <p>GUID {{ $post->guid }}</p>
          </div>        
        </div> <!-- .box -->
      </div><!-- .col -->

    </div><!-- .row -->
  @endforeach
  </div><!-- .col -->
</div><!-- .row -->
<div class="row">
  <div class="offset-sm-3 col-sm-6">
  @if ( ! empty($filter) )
  <a href="/feed/filter/{{$filter}}/offset/{{$offset}}" class="btn btn-success">Next</a>
  @else
  <a href="/feed/offset/{{$offset}}" class="btn btn-success">Next</a>
  @endif
  </div>
</div>
</div>

@stop