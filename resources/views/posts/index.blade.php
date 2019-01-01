@extends('layouts.app')

@section('content')
<div class="card-container">
    @foreach($posts as $post)

    <div class="card has-background-dark">
        <div class="card-body is-transparent" style="padding: 0px;">
            <div class="card-image">
                <figure class="image is-square">
                    <img src="{{ asset('images/'.$post->image) }}">
                </figure>
            </div>

            <div class="card-userinfo">
                <div class="is-flex">
                    <figure class="image is-48x48">
                        <img class="is-rounded" src="{{ asset('images/'.$post->image) }}">
                    </figure>
                    <div>
                        <p class="title is-4 has-text-white">{{ $post->user->name }}</p>
                        <p class="subtitle is-6 has-text-info">{{ '@'.$post->user->name }}</p>
                    </div>
                </div>

                <a class="like"><i class="fas fa-heart"></i></a>
            </div>

            <div class="card-content">
                <p class="lead is-size-4 has-text-white">{{ $post->description }}</p>
                <div class="card-timebox"><time class="has-text-grey-light" datetime="{{ $post->created_at }}"></time></div>
            </div>
        </div>
    </div>
    @endforeach

</div>
@endsection
