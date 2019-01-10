<div class="card has-background-dark">
    <div class="card-body is-transparent" style="padding: 0px;">
        <div class="card-image">
            <figure class="image is-square">
                <img src="{{ asset('images/'.$post->image) }}">
            </figure>
        </div>

        <div class="card-content">
            <div class="card-userinfo">
                <figure class="image is-48x48">
                    <img class="is-rounded" src="{{ asset('images/'.$post->user->image) }}">
                </figure>
                <div class="user-text">
                    <p class="is-size-3 has-text-white">{{ $post->user->name }}</p>
                    <a class="is-size-6 has-text-info" href="{{  route('account.show', ['id' => $post->user->id]) }}">{{
                        '@'.$post->user->name }}</a>
                </div>
            </div>
            <p class="lead is-size-4 has-text-white">{{ $post->description }}</p>
            <div class="card-footer">
                <button data-path="{{ route('posts.like', ['id'=>$post->id]) }}" class="like {{ $post->liked ? "liked" : ""}}">
                    <i class="fas fa-heart"></i>
                </button>
                <time class="has-text-grey-light" datetime="{{ $post->created_at }}"></time></div>
        </div>
    </div>
</div>
