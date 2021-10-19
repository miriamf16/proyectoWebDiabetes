<?php

namespace App\Http\Livewire;

use App\Models\Courses;
use Livewire\Component;

class CoursesList extends Component
{
    public function render()
    {
        return view('livewire.courses-list',[
        'courses' => Courses::join('users_joined_courses','courses.id','=','users_joined_courses.id_course')
            ->where('users_joined_courses.id_user','=',auth()->user()->id)->paginate(6)
        ]);
    }

}
