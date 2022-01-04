<div>
    @foreach ($section->lessons as $item)
        <article class="card mt-4">
            <div class="card-body" x-data="{open: false}">
                @if($lesson->id == $item->id)
                    <form wire:submit.prevent="update">
                        <div class="flex items-center">
                            <label class="w-32">Nombre: </label>
                            <input type="text"  class="form-input w-full rounded" wire:model="lesson.name"/>
                        </div>

                        @error('lesson.name')
                        <div class="bg-red-200 border-l-4 border-red-600 mt-1">
                            <span class="text-sm text-red-600 px-4 py-1 font-bold">(*) {{$message}}</span>
                        </div>            
                        @enderror

                        <div class="flex items-center mt-4">
                            <label class="w-32">Plataforma:</label>
                            <select wire:model="lesson.platform_id" class="mt-1 block w-full py-2 px-3 border bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @foreach ($platforms as $platform)
                                    <option value="{{$platform->id}}">{{$platform->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex items-center mt-4">
                            <label class="w-32">Url: </label>
                            <input type="text" class="form-input w-full rounded" wire:model="lesson.url"/>
                        </div>

                        @error('lesson.url')
                        <div class="bg-red-200 border-l-4 border-red-600 mt-1">
                            <span class="text-sm text-red-600 px-4 py-1 font-bold">(*) {{$message}}</span>
                        </div>            
                        @enderror

                        <div class="flex justify-end mt-4">
                            <button type="button" class="text-sm bg-red-500 py-2 px-4 rounded text-white" wire:click="cancel">Cancelar</button>
                            <button type="submit" class="text-sm bg-indigo-500 py-2 px-4 rounded text-white ml-2">Actualizar</button>
                        </div>
                    </form>
                @else
                    <header class="cursor-pointer" x-on:click="open = !open">
                        <h1><i class="far fa-play-circle text-blue-500 mr-2"></i>Lección: {{$item->name}}</h1>
                    </header>
                    <div x-show="open">
                        <hr class="my-2">
                        <p class="text-sm">Plataforma: {{$item->platform->name}}</p>
                        <p class="text-sm">Enlace: <a class="text-blue-600" href="{{$item->url}}" target="_blank">{{$item->url}}</a></p>

                        <div class="mt-2">
                            <button class="text-sm bg-indigo-500 py-1 px-4 rounded text-white" wire:click="edit({{$item}})">Editar</button>
                            <button class="text-sm bg-red-500 py-1 px-4 rounded text-white ml-2" wire:click="destroy({{$item}})">Eliminar</button>
                        </div>
                        <div class="my-2">
                            @livewire('instructor.lesson-description', ['lesson'=> $item], key('lesson-description' . $item->id))
                        </div>
                        <div class="my-2">
                            @livewire('instructor.lesson-resources', ['lesson'=> $item], key('lesson-resources' . $item->id))
                        </div>
                    </div>
                @endif
            </div>
        </article>
    @endforeach

    <div x-data="{open: false}" class="mt-4">
        <a x-show="!open" x-on:click="open = true" class="flex items-center cursor-pointer">
            <i class="far fa-plus-square text-2xl text-red-500 mr-2"></i>
            <strong>Agregar nueva lección</strong>
        </a>

        <article class="card mt-2" x-show="open">
            <div class="card-body">
                <h1 class="text-lg font-bold mb-2">Agregar lección</h1>
                <div>
                    <div class="flex items-center">
                            <label class="w-32">Nombre: </label>
                            <input type="text"  class="form-input w-full rounded" wire:model="name"/>
                        </div>

                        @error('name')
                        <div class="bg-red-200 border-l-4 border-red-600 mt-1">
                            <span class="text-sm text-red-600 px-4 py-1 font-bold">(*) {{$message}}</span>
                        </div>            
                        @enderror

                        <div class="flex items-center mt-4">
                            <label class="w-32">Plataforma:</label>
                            <select wire:model="platform_id" class="mt-1 block w-full py-2 px-3 border bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @foreach ($platforms as $platform)
                                    <option value="{{$platform->id}}">{{$platform->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        @error('platform_id')
                        <div class="bg-red-200 border-l-4 border-red-600 mt-1">
                            <span class="text-sm text-red-600 px-4 py-1 font-bold">(*) {{$message}}</span>
                        </div>            
                        @enderror

                        <div class="flex items-center mt-4">
                            <label class="w-32">Url: </label>
                            <input type="text" class="form-input w-full rounded" wire:model="url"/>
                        </div>

                        @error('url')
                        <div class="bg-red-200 border-l-4 border-red-600 mt-1">
                            <span class="text-sm text-red-600 px-4 py-1 font-bold">(*) {{$message}}</span>
                        </div>            
                        @enderror

                        
                </div>

                <div class="flex justify-end mt-2">
                    <button class="text-sm bg-red-500 py-2 px-4 rounded text-white" wire:click="cancel">Cancelar</button>
                    <button class="text-sm bg-indigo-500 py-2 px-4 rounded text-white ml-2" wire:click="store">Agregar</button>
                </div>
            </div>
        </article>
    </div>
</div>
