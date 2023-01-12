<?php

namespace App\Http\Livewire;

use App\Models\Lead;
use Livewire\Component;
use Livewire\WithPagination;

class LeadIndex extends Component
{
    public function render()
    {
        $leads = Lead::paginate(10);
        //dd($leads);
        return view('livewire.lead-index', [
            'leads' => $leads,
        ]);
    }

    public function leadDelete($id){
        if(!permission_check("lead-management")){
            return redirect()->route('dashboard');
        }
        $lead = Lead::findOrfail($id);
        $lead->delete();

        flash()->addSuccess('Lead deleted.');
    }
}
