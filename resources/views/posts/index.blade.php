@extends('layouts.app')

@section('content')
<div class="card-container">
    @if(count($posts) > 0)
        @foreach($posts as $post)
            @include('layouts.post', $post)
        @endforeach
    @else
        @include('posts.empty')
    @endif
</div>
@endsection
