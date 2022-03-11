@extends('layouts.app')

@section('content')
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h1>{{ $community->name }}</h1>
                        </div>
                        <div class="col-4 text-end">
                            <a href="{{ route('communities.show', $community) }}"
                               @if(request('sort', '') == '')style="font-size: 20px;" @endif>Newest Posts</a>
                            <br />
                            <a href="{{ route('communities.show', $community) }}?sort=popular"
                               @if(request('sort', '') == 'popular')style="font-size: 20px;" @endif>Popular Posts</a>
                        </div>
                    </div>
                </div>

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
                                    <p>{{ $post->created_at->diffForHumans() }}</p>
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
@endsection
