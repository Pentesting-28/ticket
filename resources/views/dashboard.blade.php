<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg text-center">
                {{-- <x-jet-welcome /> --}}<br><br>
                Ticket de atención al cliente<br><br>
                Implementar un sistema sencillo, para atención al cliente, donde se tiene un pequeño
                formulario para registrar Id y nombre de la persona que desea ser atendida y dos colas de
                atención al cliente.

                <br><br>
                Cola 1 ==>  Tiene una duración de 2 min<br><br>
                
                Cola 2 ==>  Tiene una duración de 3 min<br>
                <br><br>

                        En cada registro de persona, se debe decidir en cuál de las colas será atendido con mayor rapidez y asignarlo a dicha cola.<br><br>

                        Se requiere guardar en base de datos la información de las colas, de manera de poder recuperarla al momento de abrir la aplicación.<br><br>

                        Al recuperar data de la base de datos, se debe hacer la verificación de las personas en la cola y eliminar aquellas que ya fueron atendidas.<br><br>

            </div>
        </div>
    </div>
</x-app-layout>
