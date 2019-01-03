@extends('layouts.app')

@section('content')
<div class="card-container">
    @foreach($posts as $post)
        @include('layouts.post', $post)
    @endforeach
</div>
@endsection
