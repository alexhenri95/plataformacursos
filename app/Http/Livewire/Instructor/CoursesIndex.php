<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Course;
use Livewire\Component;
use Livewire\withPagination;

class CoursesIndex extends Component
{
	use withPagination;
	public $search;

	public function limpiar_page()
	{
		$this->reset('page');
	}

    public function render()
    {
    	$courses = Course::where('title', 'LIKE', '%'.$this->search.'%')
    						->where('user_id', auth()->user()->id)
                            ->latest('id','desc')
    						->paginate(5);
        return view('livewire.instructor.courses-index', compact('courses'));
    }
}
