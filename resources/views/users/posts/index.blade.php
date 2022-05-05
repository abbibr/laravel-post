@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12">
            <div class="p-6">
                <h1 class="text-2xl font-medium mb-1">
                    {{ $user->name }}
                </h1>
                <p>
                    Posted {{ $posts->count() }} 
                    {{ Str::plural('post', $posts->count()) }}
                    and received {{ $user->recievedLikes->count() }} likes
                </p>
            </div>
            
            <div class="bg-white p-6 rounded-lg">
                @forelse($posts as $post)
                    <x-post :post="$post" />
                @empty
                    {{ $user->name }} does not have any posts
                @endforelse

                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection