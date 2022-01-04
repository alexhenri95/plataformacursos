<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased bg-gray-100">
        <x-jet-banner />

        <div class="min-h-screen">

            @livewire('navigation-menu')

            <!-- Page Content -->
            <div class="container py-8 grid grid-cols-5 gap-4">

                <aside class="col-span-1">
                    <h1 class="text-lg mb-4 font-bold text-gray-700">Edición del curso</h1>
                    <ul class="text-sm text-gray-700 mb-6">
                        <li class="leading-7 mb-1 border-l-4 @routeIs('instructor.courses.edit', $course) border-indigo-400 @else border-transparent @endif pl-2">
                            <a href="{{ route('instructor.courses.edit', $course) }}">Información del curso</a>
                        </li>
                        <li class="leading-7 mb-1 border-l-4 @routeIs('instructor.courses.curriculum', $course) border-indigo-400 @else border-transparent @endif pl-2">
                            <a href="{{ route('instructor.courses.curriculum', $course) }}">Lecciones del curso</a>
                        </li>
                        <li class="leading-7 mb-1 border-l-4 @routeIs('instructor.courses.goals', $course) border-indigo-400 @else border-transparent @endif border-transparent pl-2">
                            <a href="{{ route('instructor.courses.goals', $course) }}">Metas del curso</a>
                        </li>
                        <li class="leading-7 mb-1 border-l-4 border-transparent pl-2 @routeIs('instructor.courses.students', $course) border-indigo-400 @else border-transparent @endif">
                            <a href="{{ route('instructor.courses.students', $course) }}">Alumnos</a>
                        </li>

                        @if($course->observation)
                        <li class="leading-7 mb-1 border-l-4 border-transparent pl-2 @routeIs('instructor.courses.observation', $course) border-indigo-400 @else border-transparent @endif">
                            <a href="{{ route('instructor.courses.observation', $course) }}">Observaciones</a>
                        </li>
                        @endif

                    </ul>

                    @switch($course->status)
                        @case(1)
                            <form action="{{route('instructor.courses.status', $course)}}" method="POST">
                                @csrf
                                <button class="btn btn-danger">Solicitar revisión</button>
                            </form>
                            @break
                        @case(2)
                            <div class="card text-gray-500 text-sm ">
                                <div class="card-body flex items-center">
                                    <div class="loader ease-linear rounded-full border-8 border-t-8 border-gray-200 h-8 w-8 mr-4"></div>
                                    En revisión
                                </div>
                            </div>
                            @break
                        @case(3)
                            <div class="card text-gray-500 text-sm ">
                                <div class="card-body">
                                    <i class="fas fa-check mr-2 text-green-500"></i>Este curso se encuentra publicado.
                                </div>
                            </div>
                            @break
                        @default
                    @endswitch

                    
                </aside>

                <div class="col-span-4 card">

                    <main class="card-body text-gray-700">
                        {{$slot}}
                    </main>
                </div>
            </div>
            
        </div>

        @stack('modals')

        @livewireScripts

        @isset($js)
            {{$js}}
        @endisset
        
    </body>
</html>
