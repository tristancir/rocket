@extends('layouts.app')

@section('content')
<form method="post">
    @csrf
    <div class="p-4 ">
        <div class="">
            <div><label>URL</label></div>
            <x-input size="150" name="url"></x-input>
        </div>
        <div class="mt-4">
            <div><label>Comments</label></div>
            <x-input size="150" name="comments"></x-input>
        </div>
        <div class="mt-4"><x-submit>Submit</x-submit></div>
    </div>
</form>

@endsection
