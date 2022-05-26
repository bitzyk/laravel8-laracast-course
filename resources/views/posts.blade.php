<x-layout>
    @foreach($posts as $post)
        <article class="{{ $loop->even ? 'even' : '' }}">
            <h1>
                <a href="/post/{{ $post->slug }}">
                    {{ $post->title }}
                </a>
            </h1>
            <p>{{ $post->excerpt }}</p>
            <div>
                <a href="/post-by-id/{{ $post->id }}">post route by id</a>
            </div>
            <x-category-breadcrumb :category="$post->category"></x-category-breadcrumb>
            <x-user-breadcrumb :user="$post->user"></x-user-breadcrumb>
        </article>
    @endforeach
</x-layout>
