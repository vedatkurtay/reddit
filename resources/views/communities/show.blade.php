@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $community->name }}</div>

                <div class="card-body">
                   <a href="{{ route('communities.posts.create', $community) }}" class="btn btn-primary">Add Post</a> <br /> <br />
                    @forelse($posts as $post)
                        <div class="row">
                            <div class="col-1 text-center">
                                <div>
                                    <a href="{{ route('post.vote', [$post->id, 1]) }}"> <i class="fa fa-2x fa-sort-asc" aria-hidden="true"></i></a>
                                </div>
                                <div style="font-size: 24px; font-weight: bold">{{ $post->votes }}</div>
                                <a href="{{ route('post.vote', [$post->id, -1]) }}"> <i class="fa fa-2x fa-sort-desc" aria-hidden="true"></i></a>
                            </div>

                                <div class="col-11">
                                    <a href="{{ route('communities.posts.show', [$community,$post]) }}" >
                                        <h2>{{ $post->title }}</h2>
                                    </a>
                                    <p> {{ \Illuminate\Support\Str::words($post->post_text, 10) }}</p>
                                </div>
                        </div>
                        <hr />
                    @empty
                        NO post found.
                    @endforelse
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
