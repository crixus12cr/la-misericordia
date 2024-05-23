<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Filtro de turnos.

                    <form action="{{ route('dashboard') }}" method="GET">
                        <select name="status" onchange="this.form.submit()">
                            <option value="">Seleccione</option>
                            <option value="all">Todos los estados</option>
                            <option value="pending">Pendiente</option>
                            <option value="in_progress">En Progreso</option>
                            <option value="completed">Completado</option>
                            <option value="canceled">Cancelado</option>
                        </select>
                    </form>

                    <table class="table-auto w-full mt-6">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">N° Turno</th>
                                <th class="px-4 py-2">Fecha</th>
                                <th class="px-4 py-2">Paciente</th>
                                <th class="px-4 py-2">Categoria</th>
                                <th class="px-4 py-2">Módulo</th>
                                <th class="px-4 py-2">Estado</th>
                                <th class="px-4 py-2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($turns as $turn)
                                <tr>
                                    <td class="border px-4 py-2">{{ $turn->turn_prefix }}</td>
                                    <td class="border px-4 py-2">{{ $turn->created_at->format('d-m-Y') }}</td>
                                    <td class="border px-4 py-2">
                                        {{ $turn->user->name }}<br>
                                        {{ $turn->user->number_document }}
                                    </td>
                                    <td class="border px-4 py-2">{{ $turn->category->name }}</td>
                                    <td class="border px-4 py-2">{{ $turn->module->name }}</td>
                                    <td class="border px-4 py-2"
                                        style="
                                        {{ $turn->status == 'pending' ? 'background-color: #FFFFCC; font-weight: bold;' : '' }}
                                        {{ $turn->status == 'in_progress' ? 'background-color: #CCCCFF; font-weight: bold;' : '' }}
                                        {{ $turn->status == 'completed' ? 'background-color: #CCFFCC; font-weight: bold;' : '' }}
                                        {{ $turn->status == 'canceled' ? 'background-color: #FFCCCC; font-weight: bold;' : '' }}
                                    ">
                                        <span>
                                            {{ $turn->status == 'pending' ? 'Pendiente' : '' }}
                                            {{ $turn->status == 'in_progress' ? 'En progreso' : '' }}
                                            {{ $turn->status == 'completed' ? 'Completado' : '' }}
                                            {{ $turn->status == 'canceled' ? 'Cancelado' : '' }}
                                        </span>
                                    </td>
                                    <td class="border px-4 py-2">
                                        <form action="{{ route('turns.update', $turn->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <select name="status" onchange="this.form.submit()">
                                                <option value="">opciones</option>
                                                <option value="in_progress">En Progreso</option>
                                                <option value="completed">Completado</option>
                                                <option value="canceled">Cancelado</option>
                                            </select>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
