@extends('layouts.app')

@push('head-styles')
<style>
.wrapper{
  margin: 0 40px 0 40px;
}
</style>
@endpush

@section('content')



<div class="wrapper" x-data="{
        doSubmit() {
          
        },
        toggle(checkbox) {
            checkbox.checked = ! checkbox.checked;
        }
}">

    <div class="row">
        <div class="col text-center">
            <button @click="$refs.form_remove.submit()">Remove</button>
        </div>
    </div>
    <form x-ref="form_remove" id="form_remove" name="form_remove" action="/posts/remove" method="post">
    @csrf
    <input type="hidden" value="{{ $rand }}">
    <div class="row">
        <div class="col-sm-12 ">
        @php
            $even = true;
        @endphp
        @foreach($posts as $post)
            @php
                $chk = 'ref' . $post->channel_post_id;
                $meta = ! empty($post->meta) ? json_decode($post->meta) : null ;
            @endphp
            @if ( $even )
            <div class="row mt-4">
            @endif
            @php
                $m = null;
            @endphp
                <div class="col-xs-6 col-sm-6 bg-warning">
                    <div class="text-center">
                        <input type="checkbox" x-ref="{{ $chk }}" name="remove-{{ $post->channel_post_id }}"> Remove {{ $post->channel_post_id }}
                    </div>
                    <div class="text-center">
                        @php
                            if (str_ends_with($post->content, '.jpeg') || str_ends_with($post->content, '.jpg') || str_ends_with($post->content, '.png') ||
                                str_ends_with($post->content, '.gif') ||
                                (strpos($post->content, 'twimg.com') !== false && strpos($post->content, 'format=jpg') )) {
                                $isImage = true;
                            } else {
                                $isImage = false;
                            }
                        @endphp
                        @if ( $isImage )
                        <div class="text-center">Image</div>
                            
                            @if ( $post->http_status == 200 || $post->http_status === null )
                                @php
                                    if ( preg_match('/([a-z0-9]+).newtumbl.com/', $post->content ) ) {
                                        //$link = "/content/httpget/$post->channel_post_id";
                                        $link = \TristanRock\ImageProxy::link($post->channel_post_id);
                                        
                                        $m = 'proxied';
                                    } else {
                                        $link = \TristanRock\ImageProxy::link($post->channel_post_id);
                                        //$link = $post->content;
                                        $m = 'direct';
                                    }
                                @endphp
                            <div class="text-center"><img @click="toggle($refs.{{ $chk }})" height="128" src="{{ $link }}"></div>
                            <div class="">{{ $m }}</div>
                            @else
                            <div class="text-center">{{ $post->content }}></div>
                            @endif
                        {{-- <div class="text-center"><img @click="$refs.{{ $chk }}.checked = ! $refs.{{ $chk }}.checked;" height="128" src="{{ $post->content }}"></div> --}}
                        @else
                        <div class="text-center"><a href="{{ $post->content }}">Link</a></div>
                        <div class="text-center">Other {{ $post->content }}</div>
                        @endif
                        <div class="">From <?=  parse_url($post->content, PHP_URL_HOST)  ?></div>
                        <div class="">HTTP Status <?=  $post->http_status === null ? 'null' :  $post->http_status ?></div>
                        <div class="">Content type <?=  $meta->{'Content-Type'} ?? 'null' ?></div>
                        <div class="">
                            <a href="{{ \TristanRock\ImageProxy::link($post->channel_post_id) }}">Proxy image</a>
                            @if ( $m == 'proxied' )
                            | <a href="{{ $post->content }}">Direct Image link</a>
                            @endif
                        </div>
                    </div>
                </div><!-- .col -->
            @if ( ! $even )
            </div><!-- .row -->
            @endif
            @php
                $even = ! $even;
            @endphp
        @endforeach
        </div><!-- .col -->
    </div><!-- .row -->
    <div class="row">
        <div class="col text-center">
            <button @click="$refs.form_remove.submit()">Remove</button>
        </div>
    </div>
    </form>
</div>

@stop