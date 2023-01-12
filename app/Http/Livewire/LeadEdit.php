<?php

namespace App\Http\Livewire;

use App\Models\Lead;
use App\Models\Note;
use Livewire\Component;

class LeadEdit extends Component
{
    public $lead_id;
    public $lead;
    public $name;
    public $email;
    public $phone;
    public $note;

    function mount(){
        $lead = Lead::findOrFail($this->lead_id);
        $this->name = $lead->name;
        $this->email = $lead->email;
        $this->phone = $lead->phone;
    }

    public function render()
    {
        $lead = Lead::findOrFail($this->lead_id);

        return view('livewire.lead-edit',[
            'notes' => $lead->notes,
        ]);
    }

    protected $rules = [
        'email' => 'email',
        'phone' => 'required',
    ];

    public function submitForm()
    {
        $lead = Lead::findOrFail($this->lead_id);

        $this->validate();

        $lead->name = $this->name;
        $lead->email = $this->email;
        $lead->phone = $this->phone;
        $lead->save();

        flash()->addSuccess('Load updated succefully');
    }

    public function addNote()
    {
        $note = new Note();
        $note->description = $this->note;
        $note->lead_id = $this->lead_id;

        $this->note = '';

        $note->save();
    }
}
