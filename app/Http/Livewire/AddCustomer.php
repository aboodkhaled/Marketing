<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\city;
use App\Models\item;
class AddCustomer extends Component
{

    use WithFileUploads;

    public $successMessage = '';
    public $catchError,$updateMode = false,$photos,$show_table = true,$Parent_id;

    public $currentStep = 1;

    public function render()
    {
        return view('livewire.add-customer', [
        'citys' => city::get(),
        'items' => item::get(),
    ]);
    }
}
