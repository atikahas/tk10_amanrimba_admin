<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\InvKuali;
use App\Models\InvKualiLog;

class Inventorykuali extends Component
{
    public $item_name, $item_ttl, $date, $created_by;
    public $itemTtl = [];
    public $savedRows = [];
    public $activeTab = 'inv.kuali';

    public function mount()
    {
        $kuali = InvKuali::all();
        foreach ($kuali as $k) {
            $this->itemTtl[$k->id] = $k->item_ttl;
            $this->savedRows[$k->id] = false;
        }
    }

    public function render()
    {
        $this->kuali = InvKuali::all();

        return view('livewire.inventory.kuali.kuali');
    }

    public function updateTtl($itemId)
    {
        
        $item = InvKuali::findOrFail($itemId);
        $itemName = $item->item_name;
        $item->update([
            'item_ttl' => $this->itemTtl[$itemId],
            'created_by' => Auth::id(),
        ]);

        $this->activeTab = 'inv.kuali';
        $this->savedRows[$itemId] = true;

        InvKualiLog::create([
            'item_id' => $itemId,
            'item_name' => $itemName,
            'item_ttl' => $this->itemTtl[$itemId],
            'updated_by' => Auth::id(),
        ]);

        
        session()->flash('success', 'Item TTL updated successfully');
    }
}
