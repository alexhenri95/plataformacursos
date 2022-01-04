<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;

class Search extends Component
{
	public $search;

	public function getResultsProperty()
	{
		return Course::where('title','like','%'.$this->search.'%')
						->where('status',3)
						->take(6)
						->get();
	}

    public function render()
    {
        return view('livewire.search');
    }
}
