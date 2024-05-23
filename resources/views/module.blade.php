<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Módulos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @foreach($categories as $category)
                        <div x-data="{ open: false }" class="mb-4 border rounded-lg overflow-hidden shadow">
                            <button @click="open = !open" class="w-full px-4 py-2 text-left bg-gray-200 hover:bg-gray-300 text-gray-900">
                                <h3 class="font-semibold">{{ $category->name }}</h3>
                            </button>
                            <div x-show="open" class="mt-2 p-4">
                                <form action="{{ route('categories.update', $category->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    @foreach($modulos as $modulo)
                                        <div class="flex items-center mb-2">
                                            <input type="checkbox" id="modulo_{{ $modulo->id }}" name="modulos[]" value="{{ $modulo->id }}"
                                                   @if($category->modules->contains($modulo)) checked @endif>
                                            <label for="modulo_{{ $modulo->id }}" class="ml-2 text-gray-900">{{ $modulo->name }}</label>
                                        </div>
                                    @endforeach

                                    <button type="submit" class="mt-3 bg-blue-500 hover:bg-blue-700 text-gray-900 font-bold py-2 px-4 rounded shadow">Actualizar módulos</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
