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



    <br>
    <p class="text-lg pb-4">My courses</p>
    @if(empty($courses) || $courses->count() == 0)
        <p class="text-center">You do not have courses available.</p>
        <div class="w-24 my-4 m-auto">
            <a class="inline-flex items-center h-8 px-4 text-sm text-indigo-100 transition-colors duration-150 bg-indigo-700 rounded-lg focus:shadow-outline hover:bg-indigo-800" href="{{ route('category','courses') }}">Join Here.</a>
        </div>
    @else
        @foreach ($courses as $course)
        <figure class="md:flex bg-gray-100 rounded-xl p-8 md:p-0">
            <img class="w-32 h-32 md:w-48 md:h-auto md:rounded-none rounded-full mx-auto md:mx-0 object-cover" src="{{$course->image}}" alt="" width="384" height="512">
            <div class="pt-6 md:p-8 text-center md:text-left space-y-4">
                <blockquote>
                    <p class="text-lg font-semibold">
                    {{$course->name_EN}}
                    </p>
                </blockquote>
                <div class="">
                    <figcaption class="font-medium mb-3">
                        <div class="text-cyan-600">
                        Author: {{$course->author}}
                        </div>
                        <div class="text-gray-500">
                        Joined: {{$course->created_at->diffForHumans()}}
                        </div>
                        @if(!$course->joined)
                        <div class="text-red-600">NOT APPROVED</div>
                        @endif
                    </figcaption>
                    <a class="inline-flex items-center h-8 px-5 py-5 text-base text-indigo-100 transition-colors duration-150 bg-blue-500 rounded-lg focus:shadow-outline hover:bg-blue-800" href="{{route('courses-view').'/'.$course->id_course}}">Play Course</a>
                </div>
            </div>
        </figure>
        @endforeach
    @endif

    {{ $courses->links() }}
</div>
