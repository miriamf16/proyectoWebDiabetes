<?php

namespace App\Http\Livewire;

use App\Models\Courses;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class CoursesTable extends Component
{
    use WithPagination;

    public $isOpen = false, $name_EN, $name_ES, $image, $slug, $author, $material, $course_id;

    public function render()
    {
        return view('livewire.courses-table',['courses' => Courses::paginate(6)]);
    }

    public function getMaterial($id)
    {
        // $courseItem = Courses::select('material')->where('id',$id)->get();
        $courseItem = Courses::select('id','name_EN','name_ES','image','author','material')->where('id',$id)->get();

        // return json_decode($courseItem[0]->material);
        return $courseItem->toJson();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function resetFields()
    {
        $this->name_EN = '';
        $this->name_ES = '';
        $this->image = '';
        $this->slug = '';
        $this->author ='';
        $this->material = '';
        $this->course_id = '';
    }

    public function create()
    {
        $this->resetFields();
        $this->openModal();
    }

    public function store()
    {
        $this->validate([
            'name_EN' => 'required',
            'name_ES' => 'required',
            'image' => 'required',
            'author' => 'required',
            'material' => 'required',
        ]);
        $this->slug = str::slug($this->name_EN);

        $this-> image = $this->analizeURLImage($this->image);

        Courses::updateOrCreate(['id' => $this->course_id],[
            'name_EN' => $this->name_EN,
            'name_ES' => $this->name_ES,
            'image' => $this->image,
            'author' => $this->author,
            'slug' => $this->slug,
            'material' => $this->material,
        ]);

        session()->flash('message', 
            $this->course_id ? 'Course Edited Correctly.' : 'Course Created Successfully.');
        
        $this->closeModal();
        $this->resetFields();
    }

    public function edit($id)
    {
        $course = Courses::findOrFail($id);
        $this->name_EN = $course->name_EN;
        $this->name_ES = $course->name_ES;
        $this->image = $course->image;
        $this->slug = $course->slug;
        $this->author = $course->author;
        $this->material = $course->material;
        $this->course_id = $course->id;

        // $this->openModal();

    }

    public function delete($id)
    {
        Courses::find($id)->delete();
        session()->flash('message', 'Course Deleted Successfully.');
    }

    public function analizeURLImage($url)
    {
        // session()->flash('message',strtolower($url));

        if(str_contains(strtolower($url),'drive.google'))
        {
            $url_parts = explode('/',$url);
            $size = count($url_parts);
            if($size>=3)
            {
                $id = $url_parts[$size-2];
    
                $final_url = 'https://drive.google.com/uc?export=view&id='.$id;
                
                return $final_url;
            }
            else
            {
                return $url;
            }

        }
        else
        {
            return $url;
        }
    }
}
