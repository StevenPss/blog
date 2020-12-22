<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class SearchDropdown extends Component
{
    public $search = '';

    public function render()
    {
        $search = '%'. $this->search .'%';
        $searchResults = [];
        
        if (strlen($this->search) >= 2) {
           $searchResults = Post::where('title','like' , $search)->get();
        }
        //dump($this->search);
        return view('livewire.search-dropdown', [
            'searchResults' => collect($searchResults)->take(5)
        ]);
    }
}
