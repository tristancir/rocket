@props(['disabled' => false])

<div>
@php
    $a = ( ! empty (trim($slot)) ) ? "value=\"{$slot}\"" : null;
@endphp
    <input {{ $attributes }} {{ $disabled ? 'disabled' : '' }} {!! $a !!} type="submit" >
</div>