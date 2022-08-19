<x-layout>
    <article>
        <h1> {{$post->title}}</h1>
        <div>
            <p>
                By <a href="/authors/{{$post->author->unername}}">{{$post->author->name}}</a> in <a href="/categories/{{$post->category->slug}}">{{ $post->category->name }}</a>
            </p>
            {!! $post->body !!} 
        </div>
    </article>    

    <a href="/">Go back</a>
</x-layout>

