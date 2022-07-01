@extends('..layouts.app')

@section('content')
    <section class="w-full text-white py-4 flex-row justify-center text-center">
        <div class="flex justify-center">
            <div class="max-w-4xl">
                <h1 class="px-4 text-6xl break-words">{{$posts->title}}</h1>
            </div>
        </div>
    </section>
    <article class="w-full py-8">
        <div class="flex justify-center">
            <div class="max-w-4xl text-justify text-white">
                {{$posts->body}}
            </div>
        </div>
    </article>
    <section class="w-full py-8">
        <div class="bg-cool-gray-700 p-4 text-white max-w-4xl flex-row justify-start p-3 text-left ml-auto mr-auto border rounded shadow-sm bg-gray-50">
            <h3 class="text-2xl">Comentarios</h3>
            @guest
                <p>Debes de estar registrado para publicar comentarios en este post</p>
            @else
                <form class="space-y-3" action="{{ route('comments.store') }}" method="post">
                    @csrf
                    <textarea class="w-full bg-cool-gray-600 h-28 resize-none border rounded focus:outline-none focus:shadow-outline p-2" name="comment" placeholder="Escribe tu comentario aquí..." required>{{ old('comment') }}</textarea>
                    <input type="hidden" name="post_id" value="{{$posts->id}}">
                    <input type="submit" value="COMENTAR" class="px-4 py-2 bg-teal-600 cursor-pointer hover:bg-teal-900 font-bold w-full border rounded border-teal-300 hover:border-teal-500 text-white">
                    @if (session('status'))
                        <div class="w-full bg-green-500 p-2 text-center my-2 text-white">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if($errors->any())
                        <div class="w-full bg-red-500 p-2 text-center my-2 text-white">
                            {{$errors->first()}}
                        </div>
                    @endif
                </form>
            @endguest
            <div>
                @foreach($posts->comments as $comment)
                    <div class="mt-5 w-full bg-cool-gray-600 p-2 my-2 border">
                        <div class="header flex justify-between mb-4 text-sm text-gray-200">
                            <div>
                                Por {{$comment->user->name}}
                            </div>
                            <div>
                                {{$comment->created_at->format('j F, Y')}}
                            </div>
                        </div>
                        <div class="text-lg">{{$comment->comment}}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
