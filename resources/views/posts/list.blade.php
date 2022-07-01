@extends('..layouts.app')

@section('content')
    <section class="w-full py-4 flex-row justify-center text-center">
        <div class="flex justify-center">
            <div class="max-w-4xl">
                <h1 class="px-4 text-white underline text-4xl break-words">Gestor</h1>
            </div>
        </div>
    </section>
    <article class="w-full py-8">
        <div class="flex justify-center">
            <div class="max-w-7xl text-justify">@if($errors->any())
                    <div class="w-full bg-red-500 p-2 text-center my-2 text-white">
                        {{$errors->first()}}
                    </div>
                @endif
                @if (session('status'))
                    <div class="w-full bg-green-500 p-2 text-center my-2 text-white">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="text-center m-auto w-1/2">
                    <a class="inline-block p-2 w-full bg-teal-500 text-white rounded mr-2 hover:bg-orange-800" href="{{ route('posts.create') }}" title="Edit">Crear nuevo post</a>
                </div>
                <table class="table-auto mt-10">
                    <thead>
                    <tr class="text-white text-center">
                        <th class="px-2">Título</th>
                        <th class="px-2">Creado</th>
                        <th class="px-2">Autor</th>
                        <th class="px-2">Estado</th>
                        <th class="px-2">Acción</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr class="text-center hover:bg-teal-600">
                            <td class="px-2 text-white"><a href="{{ route('posts.detail', $post->slug) }}">{{ $post->title }}</a></td>
                            <td class="px-2 text-white">{{ $post->created_at->format('j F, Y') }}</td>
                            <td class="px-2 text-white">{{ $post->user->name }}</td>
                            <td class="px-2">
                                @if ($post->is_draft)
                                    <div class="text-red-500">Borrador</div>
                                @else
                                    <div class="text-green-500">Publicado</div>
                                @endif
                            </td>
                            <td class="px-2">
                                <a class="inline-block px-4 py-1 m-3 bg-teal-700 text-white rounded mr-2 hover:bg-teal-800" href="{{ route('posts.edit', $post) }}" title="Edit">Editar</a>

                                <a class="inline-block px-4 py-1 m-3 bg-red-500 text-white rounded mr-2 hover:bg-red-800 delete-post" href="{{ route('posts.destroy', $post) }}" title="Delete" data-id="{{$post->id}}">Borrar</a>
                                <form id="posts.destroy-form-{{$post->id}}" action="{{ route('posts.destroy', $post) }}" method="POST" class="hidden">
                                    {{ csrf_field() }}
                                    @method('DELETE')
                                </form>
                            </td>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </article>
    <script>

        var delete_post_action = document.getElementsByClassName("delete-post");

        var deleteAction = function(e) {
            event.preventDefault();
            var id = this.dataset.id;
            if(confirm('Are you sure?')) {
                document.getElementById('posts.destroy-form-' + id).submit();
            }
            return false;
        }

        for (var i = 0; i < delete_post_action.length; i++) {
            delete_post_action[i].addEventListener('click', deleteAction, false);
        }
    </script>
@endsection
