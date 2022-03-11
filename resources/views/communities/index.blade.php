@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('My Communities') }}</div>

                    <div class="card-body">
                        @if(session('message'))
                            <div class="alert alert-info">{{ session('message') }}</div>
                        @endif
                        <a href="{{ route('communities.create') }}" class="btn btn-primary">New Community</a>
                        <br /> <br />

                        <table class="table">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>

                            </thead>
                            <tbody>
                            @foreach($communities as $community)
                                <tr>
                                    <td>
                                        <a href="{{ route('communities.show', $community) }}">{{ $community->name }}</a>
                                    </td>
                                    <td>
                                            <a href="{{ route('communities.edit', $community) }}" class="btn btn-sm btn-primary">Edit</a>
                                            <form action="{{ route('communities.destroy', $community) }}" style="display: inline-block" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-warning" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
