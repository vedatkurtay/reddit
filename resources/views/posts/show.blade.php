@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header"><h3>{{ $post->title }}</h3></div>

        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{session('success')}}
                </div>
            @endif

            @if($post->post_url != '')
                <div class="mb-2">
                    <a href="{{ $post->post_url }}" target="_blank"> {{ $post->post_url }} </a>
                </div>
            @endif
            @if ($post->post_image != '')
                <img src="{{ asset('storage/app/posts/' . $post->id . '/thumbnail_' . $post->post_image) }}"/>
                <br/><br/>
            @endif

            {{ $post->post_text }}

            @auth()
                <hr/>
                @can('edit-post', $post)
                    <a href="{{ route('communities.posts.edit', [$community,$post])}}" class="btn btn-sm btn-primary">Edit the Post</a>
                @endcan
                @can('delete-post', $post)
                    <form action="{{ route('communities.posts.destroy', [$post->community, $post]) }}"
                          method="POST"
                          style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure?')">Delete post
                        </button>
                    </form>
                @else
                    <hr/>
                    <form action="{{ route('post.report', $post->id) }}"
                          method="POST"
                          style="display: inline-block">
                        @csrf
                        <button type="submit"
                                class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure?')">Report post as inappropriate
                        </button>
                    </form>
                @endcan
            @endauth
        </div>
    </div>
    <!-- Disqus comment area -->
    <div class="card mt-3">
        <div class="card-header">
            <h5>Comments</h5>
        </div>
        <div class="card-body">
            @include('disqus-comment')
        </div>
    </div>
    <!-- End of Disqus comment area -->
@endsection
