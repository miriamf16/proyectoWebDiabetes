<x-app-layout>
    <script src="https://cdn.tiny.cloud/1/uz069s1gf7jedtp9k8cgqst6rdg65vw9mb4mmxpg3w3f4dur/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users Join Course') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <livewire:user-courses/>
            </div>
        </div>
    </div>
</x-app-layout>
