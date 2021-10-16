<?php

namespace App\Http\Livewire;

use App\Models\Courses;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class CoursesTable extends Component
{
    use WithPagination;

    public $isOpen = false, $name_EN, $name_ES, $slug, $author, $material, $course_id;

    public function render()
    {
        return view('livewire.courses-table',['courses' => Courses::paginate(6)]);
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
            'author' => 'required',
            'material' => 'required',
        ]);
        $this->slug = str::slug($this->name_EN);

        Courses::updateOrCreate(['id' => $this->course_id],[
            'name_EN' => $this->name_EN,
            'name_ES' => $this->name_ES,
            'author' => $this->author,
            'material' => $this->material,
        ]);

        session()->flash('message', 
            $this->course_id ? 'Course Successfully.' : 'Course Created Successfully.');
        
        $this->closeModal();
        $this->resetFields();
    }

    public function edit($id)
    {
        $course = Courses::findOrFail($id);
        $this->name_EN = $course->name_EN;
        $this->name_EN = $course->name_EN;
        $this->slug = $course->slug;
        $this->author = $course->author;
        $this->material = $course->material;
        $this->course_id = $course->id;

        $this->openModal();

    }

    public function delete($id)
    {
        Courses::find($id)->delete();
        session()->flash('message', 'Course Deleted Successfully.');
    }
}
