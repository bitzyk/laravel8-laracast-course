<x-layout>
    @foreach($posts as $post)
        <article class="{{ $loop->even ? 'even' : '' }}">
            <h1>
                <a href="/post/{{ $post->getSlug() }}">
                    {{ $post->getTitle() }}
                </a>
            </h1>
            <p>{{ $post->getExcerpt() }}</p>
        </article>
    @endforeach
</x-layout>
