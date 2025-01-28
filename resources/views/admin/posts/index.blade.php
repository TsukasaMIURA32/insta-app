@extends('layouts.app')

@section('title', 'Admin: Posts')

@section('content')
    
    <form action="{{ route('admin.posts')}}" method="get">
        <input type="text" name="search" value="{{ $search }}" placeholder="search posts" class="form-control form-control-sm w-auto ms-auto mb-3">
    </form>

    <table class="table border table-hover align-middle text-secondary bg-white">
        <thead class="table-primary text-uppercase small text-secondary">
            <tr>
                <th></th>
                <th></th>
                <th>Category</th>
                <th>Owner</th>
                <th>Created at</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse($all_posts as $post)    
                <tr>
                    <td clss="text-center">{{ $post->id }}</td>
                    <td>
                        <a href="{{ route('post.show', $post->image) }}"><img src="{{ $post->image }}" alt="" class="img-lg d-block mx-auto"></a>
                    </td>
                    <td>
                        @forelse($post->categoryPosts as $category_post)
                            <div class="badge bg-secondary bg-opacity-50">{{ $category_post->category->name }}</div>
                        @empty 
                            Uncategorized
                        @endforelse
                    </td>
                    <td><a href="{{ route('profile.show', $post->user->id) }}" class="text-decoration-none text-dark fw-bold">{{ $post->user->name }}</a></td>
                    <td>{{ $post->created_at}}</td>
                    <td>
                        {{-- status --}}
                        @if($post->trashed())
                        <i class="fa-solid fa-circle-minus text-secondary"></i></i> Hidden
                        @else
                            <i class="fa-solid fa-circle text-primary"></i> Visible
                        @endif
                    </td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-sm" data-bs-toggle="dropdown">
                                <i class="fa-solid fa-ellipsis"></i>
                            </button>

                            <div class="dropdown-menu">
                                @if($post->trashed())
                                    {{-- Unhide --}}
                                    <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#unhide-post{{ $post->id }}">
                                        <i class="fa-solid fa-eye-slash"></i> Unhide Post {{ $post->id }}
                                    </button>
                                @else
                                    <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#hide-post{{ $post->id }}">
                                        <i class="fa-solid fa-eye-slash"></i>Hide Post {{ $post->id }}
                                    </button>
                                @endif
                            </div>
                        @include('admin.posts.status')
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="text-center" colspan="6">No posts found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $all_posts->links() }}


@endsection