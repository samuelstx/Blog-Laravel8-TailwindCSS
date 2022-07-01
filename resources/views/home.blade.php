@extends('..layouts.app')

@section('style')
    <style>
        #logo{
            display: none;
        }
        .post{
            display: none;
        }
    </style>

@section('content')
    <section id="about" style="display: none" class="w-5/6 border-white border-2 mx-auto bg-teal-800 text-white py-4 flex-row justify-center text-center">
        <h2 class="text-3xl">Sobre Mí</h2>
        <div class="flex text-justify justify-center">
            <div class="max-w-5xl px-2 text-center">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptate necessitatibus ullam commodi perferendis accusamus sint error sequi, dolorem nam, vel praesentium dignissimos nostrum quod fuga corporis asperiores laudantium, possimus veniam!
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur iure cumque qui impedit quod earum dolores nisi nemo totam vero natus aperiam, libero consequuntur nesciunt atque officia exercitationem rerum. Veritatis!
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas in hic ratione recusandae nostrum, saepe aliquam alias ipsum? Asperiores rerum numquam officia harum atque, impedit perspiciatis facilis nobis tempora est!
            </div>
        </div>
    </section>
    <section class="w-full">
        <div class="flex justify-center">
            <div class="max-w-6xl text-center text-white">
                <h2 class="py-4 text-3xl border-solid border-gray-300 border-b-2">Posts más recientes</h2>
                <div class="flex flex-wrap justify-between">
                    @foreach($posts as $post)
                        <a href="{{ route('posts.detail', $post->slug) }}" style="width:300px" class="post text-left p-2 text-white hover:bg-teal-800 bg-cool-gray-700 shadow-outline-blue hover:shadow-outline-teal m-5">
                            <h3 class="text-xl underline text-teal-100">{{$post->title}}</h3>
                            <p>{{$post->get_limit_body}}</p>
                        </a>
                    @endforeach
                </div>
                <div class="mt-12">
                    <h3 class="hover:underline hover:text-teal-100 text-2xl font-bold"><a class="mt-12" href="{{ route('posts.allposts') }}">Ver todos los posts...</a></h3>
                </div>
            </div>
        </div>
    </section>
    <script>
        $('#logo').hover(function(){
            $('#about:hidden').fadeIn('slow')
            },
            function () {
                $('#about').fadeOut('slow')
            }
        );

        $(document).ready(function () {
            $('.post:hidden').each(function (index){
                $(this).fadeIn('slow');
            });
            $('#logo').fadeIn('slow');
        })
    </script>
@endsection
