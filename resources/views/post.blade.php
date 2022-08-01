<x-layout>
    <x-slot name="content">
        <article>
            <h1>
            {{$post->title}}</h1>
            </h1>
            <div>{!!$post->body!!}</div>
        </article>
    <a href="/">Back...</a>
    </x-slot>
</x-layout>
