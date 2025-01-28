@extends('layouts.app')

@section('title', 'Home')

@section('content')
    
    @foreach($suggested_users as $user)
        <div class="row mb-3 align-items-center justify-content-center">
                <div class="col-auto">
                    <a href="{{ route('profile.show', $user->id) }}">
                        @if($user->avatar)
                            <img src="{{ $user->avatar }}" alt="" class="rounded-circle avatar-md">
                        @else
                            <i class="fa-solid fa-circle-user text-secondary icon-md"></i>
                        @endif
                    </a>
                </div>
                <div class="col-3 ps-0 text-truncate">
                    <div class="row">
                        <a href="{{ route('profile.show', $user->id) }}" class="text-decoration-none text-dark fw-bold">{{ $user->name }}</a>
                    </div>
                    <div class="row">
                        <a href="{{ route('profile.show', $user->id) }}" class="text-decoration-none text-muted">{{ $user->email }}</a>
                    </div>
                    <div class="row text-muted">
                        @if($user->isFollowedByAuth())
                            <p class="my-0">Follows you</p>
                        @else
                            @if($user->followers->count()>0)
                            <p class="my-0">{{ $user->followers()->count()}} follower</p>
                            @else
                            <p class="my-0">No followers yet</p>
                            @endif
                        @endif
                    </div>
                </div>
                <div class="col-auto">
                    <a href="{{ route('profile.show', $user->id) }}"><button type="submit" class="btn p-0 bg-transparent text-primary">Follow</button></a>
                </div>
        </div>
    @endforeach
@endsection