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

    <table class="table-fixed w-full">
        <thead>
            <tr class="bg-gray-100">
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">User</th>
                <th class="px-4 py-2">Name Course</th>
                <th class="px-4 py-2">Status</th>
                <th class="px-4 py-2"></th>
            </tr>
        </thead>
        <tbody>
            @if (empty($courses) || $courses->count() == 0)
                <div class="bg-teal-100 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                    <div class="flex">
                        <div>
                            <p class="text-sm">There are no users currently wanting a course.</p>
                        </div>
                    </div>
                </div>
            @else
                @foreach($courses as $course)
                <tr>
                    <td class="border px-4 py-2">{{ $course->id }}</td>
                    <td class="border px-4 py-2">{{ $course->name }}</td>
                    <td class="border px-4 py-2">{{ $course->name_ES }}</td>
                    <td class="border px-4 py-2">{{$course->joined?"Approved":"Not Approved" }}</td>
                    <td class="border px-4 py-2">
                        <button wire:click ="accept({{$course->id}})"
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Accept</button>
                            <button wire:click ="refuse({{$course->id}})"
                                class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">refuse</button>
                        <button wire:click="delete({{ $course->id }})"
                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                    </td>
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    <br>
    {{ $courses->links() }}