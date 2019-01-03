@extends('layouts.app')

@section('content')
        <div class="user-container">
            <div class="user-start is-flex">
                <figure class="image is-96x96">
                    <img class="is-rounded" src="{{ asset('images/'.$user->image) }}">
                </figure>
                <div>
                    <h1 class="title">
                        {{ $user->display_name !== NULL ? $user->display_name : $user->name }}
                    </h1>
                    <h2 class="subtitle">
                        {{ '@'.$user->name }}
                    </h2>
                </div>
            </div>
            <div class="user-end">
                <form method="POST">
                    @csrf
                        @if($followed)
                            <input type="submit" class="button is-link is-outlined" value="Follow">
                        @else
                            <input type="submit" class="button is-danger is-outlined" value="Unfollow">
                        @endif
                </form>
            </div>
        </div>

<div class="card-container">
    @foreach($user->posts as $post)
        @include('layouts.post', $post)
    @endforeach
</div>
@endsection
