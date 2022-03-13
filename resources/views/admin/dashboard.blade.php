@push('headscripts')
<script src="{{asset('js/charts-lines.js')}}" defer></script>
<script src="{{asset('js/charts-pie.js')}}" defer></script>
@endpush
<x-admin-layout title="Dashboard">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Dashboard
        </h2>

        <!-- New Table -->
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
        </div>

    </div>
</x-admin-layout>
