<?php

namespace App\Http\Livewire\Admin\Travel;

use App\Models\Destination;
use App\Models\Facility;
use App\Models\Note;
use App\Models\Policy;
use App\Models\Travel;
use App\Models\TravelObject;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class Create extends Component
{

    use WithFileUploads;


    public $title;
    public $priceStartingFrom;
    public $serviceDuration;
    public $description;
    public $mainImage;
    public $travelObjects = [];
    public $destinations = [];
    public $notes = [];
    public $facilities = [];
    public $policies = [];
    public $validationFailed = false;


    public function mount()
    {
        $this->newForm();
    }


    public function newForm()
    {
        $this->travelObjects = TravelObject::all();

        array_push($this->destinations, ['travelObjectId']);
        array_push($this->notes, ['value']);
        array_push($this->facilities, ['value']);
        array_push($this->policies, ['title', 'description']);
    }


    public function addDestination()
    {
        array_push($this->destinations, ['travelObjectId']);
    }


    public function deleteDestination($index)
    {
        if (count($this->destinations) > 1)
        {
            unset($this->destinations[$index]);
            array_values($this->destinations);
        }
    }


    public function addNote()
    {
        array_push($this->notes, ['value']);
    }


    public function deleteNote($index)
    {
        if (count($this->notes) > 1)
        {
            unset($this->notes[$index]);
            array_values($this->notes);
        }
    }


    public function addFacility()
    {
        array_push($this->facilities, ['value']);
    }


    public function deleteFacility($index)
    {
        if (count($this->facilities) > 1)
        {
            unset($this->facilities[$index]);
            array_values($this->facilities);
        }
    }


    public function addPolicy()
    {
        array_push($this->policies, ['title', 'description']);
    }


    public function deletePolicy($index)
    {
        if (count($this->policies) > 1)
        {
            unset($this->policies[$index]);
            array_values($this->policies);
        }
    }


    protected $rules = [
        'title'                         => 'required|min:3|max:180|unique:travel,title',
        'priceStartingFrom'             => 'required|integer|min:0',
        'serviceDuration'               => 'required',
        'description'                   => 'required|min:3',
        'mainImage'                     => 'required|image|mimes:jpg,png|max:1024',
        'destinations.*.travelObjectId' => 'required',
        'notes.*.value'                 => 'required|min:3|max:250',
        'facilities.*.value'            => 'required|min:3|max:250',
        'policies.*.title'              => 'required|min:3|max:180',
        'policies.*.description'        => 'required|min:3|max:250',
    ]; 


    protected $messages = [
        'required'                   => 'Wajib diisi',
        'title.min'                  => 'Minimal 3 karakter',
        'title.max'                      => 'Maksimal 180 karakter',
        'unique'                     => 'Judul sudah digunakan',
        'integer'                    => 'Nilai tidak valid',
        'priceStartingFrom.min'      => 'Nilai minimum Rp 0',
        'description.min'            => 'Minimal 3 karakter',
        'image'                      => 'Wajib gambar',
        'mimes'                      => 'Ekstensi yang diperbolehkan .jpg dan .png',
        'mainImage.max'              => 'Ukuran maksimal 1MB',
        'notes.*.value.min'          => 'Minimal 3 karakter',
        'notes.*.value.max'          => 'Maksimal 250 karakter',
        'facilities.*.value.min'     => 'Minimal 3 karakter',
        'facilities.*.value.max'     => 'Maksimal 250 karakter',
        'policies.*.title.min'       => 'Minimal 3 karakter',
        'policies.*.title.max'       => 'Maksmial 180 karakter',
        'policies.*.description.min' => 'Minimal 3 karakter',
        'policies.*.description.max' => 'Maksimal 250 karakter',
    ];


    public function updated($propertyName)
    {
        $this->validationFailed = false;

        $this->validateOnly($propertyName);
    }


    public function validation()
    {
        $this->validationFailed = true;

        $this->validate();

        $this->validationFailed = false;
    }


    public function submit()
    {
        $this->validation();

        $imageName = Str::random(10) . '.' . $this->mainImage->extension();

        $this->mainImage->storeAs('public/images/travels', $imageName);

        $travel = Travel::create([
            'code'                => 'TRA00' . Str::upper(Str::random(3)),
            'title'               => Str::title($this->title),
            'slug'                => Str::slug($this->title),
            'description'         => $this->description,
            'price_starting_from' => $this->priceStartingFrom,
            'service_duration'    => Str::title($this->serviceDuration),
            'main_image'          => $imageName
        ]);


        foreach ($this->destinations as $destination)
        {
            Destination::create([
                'travel_id'        => $travel->id,
                'travel_object_id' => $destination['travelObjectId'],
            ]);
        }


        foreach ($this->notes as $note)
        {
            Note::create([
                'value'     => $note['value'],
                'travel_id' => $travel->id
            ]);
        }


        foreach ($this->facilities as $facility)
        {
            Facility::create([
                'value'     => $facility['value'],
                'travel_id' => $travel->id
            ]);
        }


        foreach ($this->policies as $policy)
        {
            Policy::create([
                'title'       => Str::title($policy['title']),
                'description' => $policy['description'],
                'travel_id'   => $travel->id
            ]);
        }


        $this->reset();
        $this->newForm();

        session()->flash('message', 'Data travel baru berhasil ditambahkan');
    }


    public function render()
    {
        return view('livewire.admin.travel.create')
                    ->layoutData([
                        'titleBar'      => 'Tambah Travel',
                        'heroImage'     => 'travel.jpg',
                        'heroGradient'  => 'from-blue-600/75 to-blue-800/75',
                        'breadcrumbs' => [
                            ['route' => route('admin.travel.index'), 'label' => 'daftar travel'],
                            ['route' => '#', 'label' => 'tambah travel'],
                        ]
                    ]);
    }

}
