<?php

namespace App\Http\Livewire;

use App\Models\Transaction;
use Livewire\Component;

class Counter extends Component
{


    public $search; //type



    public function render()
    {
        $transcition = Transaction::where('placa','LIKE', '%'.$this->search.'%')
         ->orderBy('updated_at', 'desc')
         ->Paginate(5);

        return view('livewire.counter',[
            'transcitions' =>  $transcition,
        ]);
    }
}
