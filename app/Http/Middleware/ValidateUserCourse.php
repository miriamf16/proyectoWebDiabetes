<?php

namespace App\Http\Middleware;

use App\Models\UsersJoinedCourses;
use Closure;
use Illuminate\Http\Request;

class ValidateUserCourse
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $userJoined = UsersJoinedCourses::where('id_user',auth()->id())->where('id_course',$request->route('id'))->first();

        if($userJoined)
        {
            if($userJoined->joined)
            {
                return $next($request);
            }
            else
            {
            return redirect()->route('dashboard-user')->with('message','Your request is not yet approved.');
            }
        }
        else
        {
            UsersJoinedCourses::create([
                'id_user' => auth()->id(),
                'id_course' => $request->route('id'),
                'response' => '[]',
                'joined' => false,
            ]);
            return redirect()->route('dashboard-user')->with('message','Your request is sent, pending approval.');
        }


        return redirect('/');
        
        

    }
}
