@props(['post'])
<article
    {{ $attributes->merge(['class' => 'transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl']) }}>
    <div class="py-6 px-5">
        <div>
            <img src="/images/illustration-5.png" alt="Blog Post illustration" class="rounded-xl">
        </div>

        <div class="mt-8 flex flex-col justify-between">
            <header>
                <div class="space-x-2">
                    <x-category-breadcrumb :category="$post->category"></x-category-breadcrumb>
                </div>

                <div class="mt-4">
                    <h1 class="text-3xl">
                        <a href="/post/{{ $post->slug }}">
                            {{ $post->title }}
                        </a>
                    </h1>

                    <span class="mt-2 block text-gray-400 text-xs">Published <time>{{ $post->created_at->diffForHumans() }}</time></span>
                </div>
            </header>

            <div class="text-sm mt-4 space-y-4">
                {!! $post->excerpt !!}
            </div>

            <x-author-breadcrumb :author="$post->author"></x-author-breadcrumb>
        </div>
    </div>
</article>
