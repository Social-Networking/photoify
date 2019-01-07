@extends('layouts.app')

@section('content')
<div class="user-container">
    <div class="user-start">
        <div class="is-flex is-v-center">
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
        <div class="is-flex">
            @if($user->id !== Auth::id())
            <form method="POST" action="{{ route('account.follow', ['id'=>$user->id]) }}" class="w100">
                @csrf
                @if(!$followed)
                <input type="submit" class="button is-link is-outlined is-fullwidth" value="{{ __('Follow') }}">
                @else
                <input type="submit" class="button is-danger is-outlined is-fullwidth" value="{{ __('Unfollow') }}">
                @endif
            </form>
            @else
            <a href="{{ route('account') }}" class="button is-dark is-outlined is-fullwidth"><i class="fas fa-cog"></i>{{
                __('Settings') }}</a>
            @endif
        </div>
    </div>
    <div class="user-end">
        <p class="user-biography">Biography temp</p>
    </div>
</div>

<div class="card-container">
    @foreach($user->posts as $post)
    @include('layouts.post', $post)
    @endforeach
</div>
@endsection
