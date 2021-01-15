<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class RecentView extends Component
{
    public function render()
    {
        $current = Carbon::now();
        $recents = [];
        $recents['today'] =  User::find(Auth::user()->id)->files()->where('accessed_at', '>', $current->today());
        $recents['week'] =  User::find(Auth::user()->id)->files()->where('accessed_at', '>', $current->subWeek());
        $recents['month'] =  User::find(Auth::user()->id)->files()->where('accessed_at', '>', $current->subMonth());
        $recents['older'] =  User::find(Auth::user()->id)->files()->where('accessed_at', '>', $current);
        return view('livewire.recent-view', compact('recents'));
    }
}
