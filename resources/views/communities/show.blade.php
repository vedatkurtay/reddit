@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $community->name }}</div>

                <div class="card-body">
                   <a href="{{ route('communities.posts.create', $community) }}">Add Post</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
