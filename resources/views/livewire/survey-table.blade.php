<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
    @if (session()->has('message'))
    <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
        <div class="flex">
            <div>
                <p class="text-sm">{{ session('message') }}</p>
            </div>
        </div>
    </div>
    @endif
    <button wire:click="create()"
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Create New Survey</button>
    @if($isOpen)
        @include('livewire.create_survey')
        <script>
            setTimeout(function() {
                [...document.querySelectorAll('a')].filter(e=>e.href.includes('page')).forEach(e=> {
                    e.addEventListener('click', function(e) {
                        e.currentTarget.href = '/dashboard/surveys?page=' + e.currentTarget.href.split('=')[1];
                    });
                });
            }, 1000);
        </script>
    @endif

    <div class="relative mx-4 mb-4 mt-1">
        <input type="text" wire:model="filter" class="w-full pl-3 pr-10 py-2 border-2 border-gray-200 rounded-xl hover:border-gray-300 focus:outline-none focus:border-blue-500 transition-colors" placeholder="Search..." />
        <button class="block w-7 h-7 text-center text-xl leading-0 absolute top-2 right-2 text-gray-400 focus:outline-none hover:text-gray-900 transition-colors">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </button>
    </div>

    <table class="table-fixed w-full">
        <thead>
            <tr class="bg-gray-100">
                <th class="px-4 py-2 w-20">ID</th>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Aviable from</th>
                <th class="px-4 py-2">Aviable to</th>
                <th class="px-4 py-2">Enabled</th>
                <th class="px-4 py-2">URL</th>
                <th class="px-4 py-2">Public</th>
                <th class="px-4 py-2">Created at</th>
                <th class="px-4 py-2">Created by</th>
                <th class="px-4 py-2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($surveys as $survey)
            <tr>
                <td class="border px-4 py-2">{{ $survey->id }}</td>
                <td class="border px-4 py-2">{{ $survey->name }}</td>
                <td class="border px-4 py-2">{{ $survey->aviableFrom }}</td>
                <td class="border px-4 py-2">{{ $survey->aviableTo }}</td>
                <td class="border px-4 py-2">{{ $survey->enabled }}</td>
                <td class="border px-4 py-2">
                    <a class="text-pink-700" href='{{url("survey/{$survey->slug}")}}'>Go to survey</a>
                </td>
                <td class="border px-4 py-2">{{ $survey->public}}</td>
                <td class="border px-4 py-2">{{ $survey->created_at->diffForHumans() }}</td>
                <td class="border px-4 py-2">{{ $survey->user->name }}</td>
                <td class="border px-2 py-1">
                    <button wire:click="edit({{ $survey->id }})"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">Edit</button>
                    <button wire:click="delete({{ $survey->id }})"
                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Delete</button>
                    <br/>
                    <a href="/dashboard/survey/{{$survey->slug}}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded mt-3" style="margin-top: 2em;">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div style="margin-top:1em"></div>
    {!! $surveys->links() !!}
</div>