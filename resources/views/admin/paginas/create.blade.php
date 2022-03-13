<x-admin-layout title="Páginas">
    <div class="container grid px-6 mx-auto space-y-4">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Crear Página
        </h2>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <form action="{{route('paginas.store')}}" id="saveForm" method="POST"  enctype="multipart/form-data">
                @csrf
                @include('admin.paginas.form')
                <label class="block text-sm py-4">
                    <a href="javascript:save();" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        Guardar
                    </a>
                    <a href="{{route('paginas.index')}}" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        Cancelar
                    </a>
                </label>
            </form>
        </div>
    </div>
</x-admin-layout>
