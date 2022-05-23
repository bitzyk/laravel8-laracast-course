<x-layout>
<h1>
    <?php /** @var \App\Models\Post $post */ ?>
    {!! $post->getTitle() !!}
</h1>

{!! $post->getContent() !!}
</x-layout>
