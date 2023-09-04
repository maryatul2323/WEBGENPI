<?php

namespace App\Http\Livewire\Admin\TouristAttraction;

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


    public function delete(TravelObject $travelObject)
    {
        $travelObject->delete();

        session()->flash('message', 'Berhasil menghapus salah satu data objek wisata');
    }


    public function paginationView()
    {
        return 'pagination.custom';
    }


    public function render()
    {
        return view('livewire.admin.tourist-attraction.index', [
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
                    ->layoutData([
                        'titleBar'      => 'Daftar Objek Wisata',
                        'heroImage'     => 'tourist-attraction.jpg',
                        'heroGradient'  => 'from-purple-600/75 to-purple-800/75',
                        'breadcrumbs' => [
                            ['route' => '#', 'label' => 'daftar objek wisata']
                        ]
                    ]);
    }

}
