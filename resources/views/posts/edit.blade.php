@extends('..layouts.app')

@section('content')
    <section class="w-full py-4 flex-row justify-center text-center">
        <div class="flex justify-center">
            <div class="max-w-4xl">
                <h1 class="px-4 text-white underline text-4xl break-words">Editar post</h1>
            </div>
        </div>
    </section>
    <article class="w-full py-8">
        <div class="flex justify-center">
            <div class="max-w-7xl text-justify">
                <form class="text-white" action="{{ route('posts.update', $post) }}" method="post">
                    @csrf
                    @method('PUT')
                    Título
                    <input class="w-full border rounded focus:outline-none bg-cool-gray-700 focus:shadow-outline p-2 mb-4" type="text" name="title" value="{{ $post->title }}" placeholder="Write the title of the post">
                    Contenido
                    <textarea class="w-full h-72 resize-none border rounded focus:outline-none bg-cool-gray-700 focus:shadow-outline p-2 mb-4" name="body" placeholder="Write your post here" required>{{ $post->body }}</textarea>
                    <div class="mb-4 text-white">
                        <input type="hidden" name="is_draft" value="0">
                        @if (!$post->is_draft)
                            <input type="checkbox" name="is_draft" value="1">
                        @else
                            <input type="checkbox" name="is_draft" value="1" checked>
                        @endif
                        Borrador
                    </div>
                    <input type="submit" value="ENVIAR" class="px-4 py-2 bg-teal-500 cursor-pointer hover:bg-teal-700 font-bold w-full border rounded border-teal-500 hover:border-teal-700 text-white">
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
            </div>
        </div>
    </article>
@endsection
