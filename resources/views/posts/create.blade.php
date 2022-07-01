@extends('..layouts.app')

@section('content')
    <section class="w-full py-4 flex-row justify-center text-center">
        <div class="flex justify-center">
            <div class="max-w-4xl">
                <h1 class="px-4 text-4xl text-white underline break-words">Crear un post</h1>
            </div>
        </div>
    </section>
    <article class="w-full py-8">
        <div class="flex justify-center">
            <div class="max-w-7xl text-justify">
                <form class="text-white" action="{{ route('posts.store') }}" method="post">
                    @csrf
                    Título
                    <input class="w-full border rounded bg-cool-gray-700 focus:outline-none focus:shadow-outline p-2 mb-4" type="text" name="title" value="{{ old('title') }}" placeholder="Título del Post">
                    Contenido
                    <textarea class="w-full h-72 bg-cool-gray-700 resize-none border rounded focus:outline-none focus:shadow-outline p-2 mb-4" name="body" placeholder="Contenido del Post" required>{{ old('body') }}</textarea>
                    <div class="mb-4">
                        <input type="hidden" name="is_draft" value="0">
                        <input type="checkbox" name="is_draft" value="1"> Borrador
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
