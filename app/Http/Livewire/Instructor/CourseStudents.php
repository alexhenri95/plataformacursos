<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Course;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\withPagination;

class CourseStudents extends Component
{
    use AuthorizesRequests;
    use withPagination;
    
    public $search, $course;

    public function mount(Course $course)
    {
        $this->course = $course;
        $this->authorize('dicatated', $course);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $students = $this->course->students()->where('name', 'LIKE', '%' . $this->search . '%')->paginate(2);

        return view('livewire.instructor.course-students', compact('students'))
                    ->layout('layouts.instructor', ['course' => $this->course]);
    }
}
