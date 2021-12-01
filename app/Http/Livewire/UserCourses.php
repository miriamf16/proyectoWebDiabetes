<?php

namespace App\Http\Livewire;

use App\Models\Courses;
use App\Models\User;
use App\Models\UsersJoinedCourses;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class UserCourses extends Component
{
    public function render()
    {
        return view('livewire.user-courses',[
            'courses' => DB::table('users_joined_courses')
            ->join('users','users_joined_courses.id_user','=','users.id')
            ->join('courses','users_joined_courses.id_course','=','courses.id')
            ->select('users_joined_courses.id','users.name','courses.name_ES','users_joined_courses.joined')
            ->paginate(8)
        ]);
    }


    public function accept($id)
    {
        $userJoinCourse = UsersJoinedCourses::find($id);
        $userJoinCourse->joined = true;
        $userJoinCourse->save();
        session()->flash('message','User approved in the course successfully');
    }

    public function refuse($id)
    {
        $userJoinCourse = UsersJoinedCourses::find($id);
        $userJoinCourse->joined = false;
        $userJoinCourse->save();
        session()->flash('message','User refuse in the course successfully');
    }

    public function delete($id)
    {

        UsersJoinedCourses::find($id)->delete();
        session()->flash('message', 'User not approved in the course.');
    }
}
