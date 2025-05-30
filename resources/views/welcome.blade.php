@extends('layouts.main')

@section('title', 'HDC Events')

@section('content')
<!-- Comentário do HTML -->
{{-- Comentário do Blade --}}

@foreach ($events as $event)
    <p>{{ $event->title }} -- {{ $event->description }}</p>
@endforeach

@endsection