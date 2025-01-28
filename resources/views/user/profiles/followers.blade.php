@extends('layouts.app')

@section('title', $user->name . ' - Followers')

@section('content')
    @include('user.profiles.header')

    @if($user->followers->isNotEmpty())
        <div class="row justify-content-center">
            <div class="col-4">
                <h4 class="h5 text-center text-secondary">Followers</h4>

                @foreach($user->followers as $follower)
                    <div class="row mb-3 align-items-center">
                        <div class="col-auto">
                            {{-- icon/avatar --}}
                            <a href="{{ route('profile.show', $follower->follower->id) }}">
                                @if($follower->follower->avatar)
                                    <img src="{{ $follower->follower->avatar }}" alt="" class="rounded-circle avatar-sm">
                                @else
                                    <i class="fa-solid fa-circle-user text-secondary icon-sm"></i>
                                @endif
                            </a>
                        </div>
                        <div class="col ps-0 text-truncate">
                            {{-- name --}}
                            <a href="{{ route('profile.show', $follower->follower->id) }}" class="text-decoration-none text-dark fw-bold">
                                {{ $follower->follower->name }}
                            </a>
                        </div>
                        <div class="col-auto">
                            {{-- button --}}
                            @if($follower->follower->id != Auth::user()->id)
                                @if($follower->follower->isFollowed())
                                {{-- unfollow --}}
                                    <form action="{{ route('follow.delete', $follower->follower->id) }}" method="post">
                                        @csrf    
                                        @method('DELETE')
                                        <button type="submit" class="btn p-0 bg-transparent text-secondary">Following</button>
                                    </form>
                                @else
                                {{-- follow --}}
                                    <form action="{{ route('follow.store', $follower->follower->id) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn p-0 bg-transparent text-primary">Follow</button>
                                    </form>
                                @endif
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <h4 class="h5 text-center text-secondary">No followers yet.</h4>
    @endif

@endsection