<x-layout>
    <x-slot name="content">
        <article>
            <h1>
            {{$post->title}}</h1>
            </h1>
            
            <a href="/authors/{{$post->author->username}}">{{$post->author->name}}</a>
            in <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>
            <div>{!!$post->body!!}</div>
        </article>
    <a href="/">Back...</a>
    </x-slot>
</x-layout>
