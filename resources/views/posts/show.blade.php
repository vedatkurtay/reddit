@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $post->title }}</div>

                <div class="card-body">
                    @if($post->post_url != '')
                        <div class="mb-2">
                            <a href="{{ $post->post_url }}" target="_blank"> {{ $post->post_url }} </a >
                        </div>
                    @endif
                        @if ($post->post_image != '')
                            <img src="{{ asset('storage/app/posts/' . $post->id . '/thumbnail_' . $post->post_image) }}" />
                            <br/><br/>
                        @endif

                    {{ $post->post_text }}

                    @auth()
                        @if($post->user_id == auth()->id())
                                <hr />
                                <a href="{{ route('communities.posts.edit', [$community,$post])}}" class="btn btn-sm btn-primary">Edit the Post</a>
                                <form action="{{ route('communities.posts.destroy', [$community, $post]) }}" style="display: inline-block" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger" type="submit" onclick="return confirm('Are you sure?')">Delete Post</button>
                                </form>
                            @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
