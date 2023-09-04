<?php

namespace App\Http\Livewire\Guest\TouristAttraction;

use App\Models\TravelObject;
use App\Models\TravelObjectCategory;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;


    public $search = '';
    public $travelObjectCategories = [];
    public $travelObjectCategory = null;


    public function mount()
    {
        $this->travelObjectCategories = TravelObjectCategory::where('category', '!=', 'Pesona Alam')->get();
    }


    public function filter($value = null)
    {
        $this->travelObjectCategory = $value;        
    }


    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function paginationView()
    {
        return 'pagination.custom';
    }


    public function render()
    {
        return view('livewire.guest.tourist-attraction.index', [
                        'touristAttractions' => TravelObject::with(['travelObjectCategory'])
                                                                ->whereRelation('travelObjectCategory', 'category', '!=', 'Pesona Alam')
                                                                ->where(function($query) {
                                                                    $query->where('title', 'like', '%' . $this->search . '%')
                                                                            ->orWhere('location', 'like', '%' . $this->search . '%');
                                                                })
                                                                ->when($this->travelObjectCategory, function($query) {
                                                                    $query->where('travel_object_category_id', $this->travelObjectCategory);
                                                                })
                                                                ->latest()
                                                                ->paginate(9)
                    ])
                    ->layout('layouts.guest', [
                        'titleBar'      => 'Objek Wisata',
                        'headerBg'      => 'bg-purple-600/75',
                        'hero'          => asset('storage/images/heroes/tourist-attraction.jpg'),
                        'heroBgColor'   => 'bg-gradient-to-tr from-purple-600/75 to-purple-800/75',
                        'footerBgColor' => 'bg-gradient-to-tr from-purple-600/75 to-purple-800/75'
                    ]);
    }
}
