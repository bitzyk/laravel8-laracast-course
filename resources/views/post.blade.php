<x-layout>
    <h1>
        <?php /** @var \App\Models\Post $post */ ?>
        {!! $post->title !!}
    </h1>
    <x-category-breadcrumb :category="$post->category"></x-category-breadcrumb>
    <x-user-breadcrumb :user="$post->user"></x-user-breadcrumb>

    {!! $post->body !!}
</x-layout>
