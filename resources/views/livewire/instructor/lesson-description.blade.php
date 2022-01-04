<div>
    <article class="card" x-data="{open: false}">
        <div class="card-body bg-gray-100">
            <header>
                <h1 x-on:click="open = !open" class="cursor-pointer text-sm font-bold">Descripción</h1>
            </header>
            <div x-show="open">
                <hr class="my-2">

                @if($lesson->description)
                <form wire:submit.prevent="update">
                    <textarea wire:model="description.name" class="form-input w-full rounded"></textarea>

                    @error('description.name')
                    <div class="bg-red-200 border-l-4 border-red-600 mt-1">
                        <span class="text-sm text-red-600 px-4 py-1 font-bold">(*) {{$message}}</span>
                    </div>            
                    @enderror

                    <div class="flex justify-end">
                        <button type="button" class="text-sm bg-red-500 py-1 px-4 rounded text-white" wire:click="destroy">Eliminar</button>
                        <button type="submit" class="text-sm bg-indigo-500 py-1 px-4 rounded text-white ml-2">Actualizar</button>
                    </div>
                </form>

                @else

                <div>
                    <textarea wire:model="name" class="form-input w-full rounded"></textarea>

                    @error('name')
                    <div class="bg-red-200 border-l-4 border-red-600 mt-1">
                        <span class="text-sm text-red-600 px-4 py-1 font-bold">(*) {{$message}}</span>
                    </div>            
                    @enderror

                    <div class="flex justify-end">
                        <button wire:click="store" class="text-sm bg-indigo-500 py-1 px-4 rounded text-white ml-2">Guardar</button>
                    </div>
                </div>
                @endif

            </div>
        </div>
    </article>
</div>
