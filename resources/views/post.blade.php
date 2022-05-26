<x-layout>
<h1>
    <?php /** @var \App\Models\Post $post */ ?>
    {!! $post->title !!}
</h1>

{!! $post->body !!}
</x-layout>
