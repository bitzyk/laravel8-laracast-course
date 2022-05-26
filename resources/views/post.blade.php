<x-layout>
    <h1>
        <?php /** @var \App\Models\Post $post */ ?>
        {!! $post->title !!}
    </h1>
    <x-category-breadcrumb :post="$post"></x-category-breadcrumb>

    {!! $post->body !!}
</x-layout>
