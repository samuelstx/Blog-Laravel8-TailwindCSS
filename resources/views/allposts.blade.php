@extends('..layouts.app')

@section('content')
    <section>
        <ul class="justify-center items-center text-center underline text-teal-100">
            @foreach($posts as $post)
                <li><a href="{{ route('posts.detail', $post->slug) }}">{{$post->title}} por {{\App\Models\User::find($post->user_id)->name}} el {{$post->created_at}}</a></li>
            @endforeach
        </ul>
    </section>
@endsection
