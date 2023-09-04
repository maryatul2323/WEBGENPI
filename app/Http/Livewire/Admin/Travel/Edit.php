<?php

namespace App\Http\Livewire\Admin\Travel;

use App\Models\Destination;
use App\Models\Facility;
use App\Models\Note;
use App\Models\Policy;
use App\Models\Travel;
use App\Models\TravelObject;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class Edit extends Component
{

    use WithFileUploads;


    public $travel;
    public $title;
    public $priceStartingFrom;
    public $serviceDuration;
    public $description;
    public $mainImage;
    public $travelObjects = [];
    public $destinations = [];
    public $destinationRemoved = [];
    public $notes = [];
    public $noteRemoved = [];
    public $facilities = [];
    public $facilityRemoved = [];
    public $policies = [];
    public $policyRemoved = [];
    public $validationFailed = false;


    public function mount(Travel $travel)
    {
        $this->travelObjects = TravelObject::all();
        $this->travel            = $travel;
        $this->title             = $travel->title;
        $this->priceStartingFrom = $travel->price_starting_from;
        $this->serviceDuration   = $travel->service_duration;
        $this->description       = $travel->description;
        
        foreach ($travel->destinations as $destination)
        {
            array_push($this->destinations, ['travelObjectId' => $destination->travel_object_id, 'destinationId'  => $destination->id]);
        }

        foreach ($travel->notes as $note)
        {
            array_push($this->notes, ['value' => $note->value, 'noteId' => $note->id]);
        }

        foreach ($travel->facilities as $facility)
        {
            array_push($this->facilities, ['value' => $facility->value, 'facilityId' => $facility->id]);
        }
        
        foreach ($travel->policies as $policy)
        {
            array_push($this->policies, ['title' => $policy->title, 'description' => $policy->description, 'policyId' => $policy->id]);
        }
    }   


    public function addDestination()
    {
        array_push($this->destinations, ['travelObjectId']);
    }


    public function deleteDestination($index, $destinationId = null)
    {
        if (count($this->destinations) > 1)
        {
            if ($destinationId)
            {
                array_push($this->destinationRemoved, $destinationId);
            }

            unset($this->destinations[$index]);
            array_values($this->destinations);
        }
    }


    public function addNote()
    {
        array_push($this->notes, ['value']);
    }


    public function deleteNote($index, $noteId = null)
    {
        if (count($this->notes) > 1)
        {
            if ($noteId)
            {
                array_push($this->noteRemoved, $noteId);
            }

            unset($this->notes[$index]);
            array_values($this->notes);
        }
    }


    public function addFacility()
    {
        array_push($this->facilities, ['value']);
    }


    public function deleteFacility($index, $facilityId = null)
    {
        if (count($this->facilities) > 1)
        {
            if ($facilityId)
            {
                array_push($this->facilityRemoved, $facilityId);
            }

            unset($this->facilities[$index]);
            array_values($this->facilities);
        }
    }


    public function addPolicy()
    {
        array_push($this->policies, ['value']);
    }


    public function deletePolicy($index, $policyId = null)
    {
        if (count($this->policies) > 1)
        {
            if ($policyId)
            {
                array_push($this->policyRemoved, $policyId);
            }

            unset($this->policies[$index]);
            array_values($this->policies);
        }
    }


    protected function rules()
    {
        return [
            'title' =>  ['required', 'min:3', 'max:180', function ($attr, $value, $fail) {
                            if ($this->travel->slug != Str::slug($value))
                            {
                                if (Travel::where('slug', Str::slug($value))->first())
                                {
                                    $fail('Judul sudah digunakan');
                                }
                            }
                        }],
            'priceStartingFrom'             => ['required', 'integer', 'min:0'],
            'serviceDuration'               => ['required'],
            'description'                   => ['required', 'min:3'],
            'mainImage'                     => ['nullable', 'image', 'mimes:jpg,png', 'max:1024'],
            'destinations.*.travelObjectId' => ['required'],
            'notes.*.value'                 => ['required', 'min:3', 'max:250'],
            'facilities.*.value'            => ['required', 'min:3', 'max:250'],
            'policies.*.title'              => ['required', 'min:3', 'max:180'],
            'policies.*.description'        => ['required', 'min:3', 'max:250'],
        ];
    }


    protected $messages = [
        'required'                   => 'Wajib diisi',
        'title.min'                  => 'Minimal 3 karakter',
        'title.max'                      => 'Maksimal 180 karakter',
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

        $this->travel->update([
            'title'               => Str::title($this->title),
            'slug'                => Str::slug($this->title),
            'description'         => $this->description,
            'price_starting_from' => $this->priceStartingFrom,
            'service_duration'    => Str::title($this->serviceDuration),
        ]);


        if ($this->mainImage)
        {
            Storage::delete('public/images/travels/' . $this->travel->main_image);

            $imageName = Str::random(10) . '.' . $this->mainImage->extension();

            $this->mainImage->storeAs('public/images/travels', $imageName);

            $this->travel->update([
                'main_image' => $imageName
            ]);
        }


        $destinationWasChanged = [];
        foreach ($this->destinations as $itemDestionation)
        {
            if (isset($itemDestionation['destinationId']))
            {
                $destination = Destination::find($itemDestionation['destinationId']);

                $destination->update([
                    'travel_object_id' => $itemDestionation['travelObjectId']
                ]);

                array_push($destinationWasChanged, $destination->wasChanged());
            }
            else 
            {
                Destination::create([
                    'travel_object_id' => $itemDestionation['travelObjectId'],
                    'travel_id'        => $this->travel->id
                ]);

                array_push($destinationWasChanged, true);
            }
        }


        if ($this->destinationRemoved)
        {
            Destination::whereIn('id', $this->destinationRemoved)->delete();

            array_push($destinationWasChanged, true);
        }


        $noteWasChanged = [];
        foreach ($this->notes as $itemNote)
        {
            if (isset($itemNote['noteId']))
            {
                $note = Note::find($itemNote['noteId']);

                $note->update([
                    'value' => $itemNote['value']
                ]);

                array_push($noteWasChanged, $note->wasChanged());
            }
            else 
            {
                Note::create([
                    'value'     => $itemNote['value'],
                    'travel_id' => $this->travel->id
                ]);

                array_push($noteWasChanged, true);
            }
        }

        
        if ($this->noteRemoved)
        {
            Note::whereIn('id', $this->noteRemoved)->delete();

            array_push($noteWasChanged, true);
        }


        $facilityWasChanged = [];
        foreach ($this->facilities as $itemFacility)
        {
            if (isset($itemFacility['facilityId']))
            {
                $facility = Facility::find($itemFacility['facilityId']);

                $facility->update([
                    'value' => $itemFacility['value']
                ]);

                array_push($facilityWasChanged, $facility->wasChanged());
            }
            else 
            {
                Facility::create([
                    'value'     => $itemFacility['value'],
                    'travel_id' => $this->travel->id
                ]);

                array_push($facilityWasChanged, true);
            }
        }

        
        if ($this->facilityRemoved)
        {
            Facility::whereIn('id', $this->facilityRemoved)->delete();

            array_push($facilityWasChanged, true);
        }


        $policyWasChanged = [];
        foreach ($this->policies as $itemPolicy)
        {
            if (isset($itemPolicy['policyId']))
            {
                $policy = Policy::find($itemPolicy['policyId']);

                $policy->update([
                    'title'       => Str::title($itemPolicy['title']),
                    'description' => $itemPolicy['description'],
                ]);

                array_push($policyWasChanged, $policy->wasChanged());
            }
            else 
            {
                Policy::create([
                    'title'       => Str::title($itemPolicy['title']),
                    'description' => $itemPolicy['description'],
                    'travel_id'   => $this->travel->id
                ]);

                array_push($policyWasChanged, true);
            }
        }

        
        if ($this->policyRemoved)
        {
            Policy::whereIn('id', $this->policyRemoved)->delete();

            array_push($policyWasChanged, true);
        }


        if ($this->travel->wasChanged() || in_array(true, $destinationWasChanged) || in_array(true, $noteWasChanged) || in_array(true, $facilityWasChanged) || in_array(true, $policyWasChanged))
        {
            session()->flash('message', 'Berhasil melakukan perubahan data travel');
        }
    }


    public function render()
    {
        return view('livewire.admin.travel.edit')
                    ->layoutData([
                        'titleBar'      => 'Ubah Travel',
                        'heroImage'     => 'travel.jpg',
                        'heroGradient'  => 'from-blue-600/75 to-blue-800/75',
                        'breadcrumbs' => [
                            ['route' => route('admin.travel.index'), 'label' => 'daftar travel'],
                            ['route' => route('admin.travel.details', $this->travel), 'label' => $this->travel->title],
                            ['route' => '#', 'label' => 'ubah travel']
                        ]
                    ]);
    }

}
