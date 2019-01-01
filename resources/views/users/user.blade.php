@extends('layouts.app')

@section('content')
        <div class="user-container">
            <div class="user-start is-flex">
                <figure class="image is-96x96">
                    <img class="is-rounded" src="{{ asset('images/'.$user->image) }}">
                </figure>
                <div>
                    <h1 class="title">
                        {{ $user->name }}
                    </h1>
                    <h2 class="subtitle">
                        {{ '@'.$user->name }}
                    </h2>
                </div>
            </div>
            <div class="user-end">
                <a class="button is-link is-outlined">Follow</a>
            </div>
        </div>

<div class="card-container">
    @foreach($user->posts as $post)

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
