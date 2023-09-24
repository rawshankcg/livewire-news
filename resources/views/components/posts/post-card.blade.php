@props(['post'])
<div>
    <a wire:navigate href="{{route('posts.show', $post->slug)}}">
        <div>
            <img class="w-full rounded-xl" src="{{asset('storage/'.$post->image)}}">
        </div>
    </a>
    <div class="mt-3">
        <div class="flex items-center mb-2">
            @foreach($post->categories as $category)
            <a href="http://127.0.0.1:8000/categories/laravel" class="bg-red-600 
                text-white 
                rounded-xl px-3 py-1 text-sm mr-3">
                {{$category->title}}
            </a>
            @endforeach
            <p class="text-gray-500 text-sm">{{$post->publish_at}}</p>
        </div>
        <a class="text-xl font-bold text-gray-900">{{$post->title}}</a>
    </div>
</div>