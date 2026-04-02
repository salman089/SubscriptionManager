<?php

namespace App\Livewire\Subscription;

use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\On;

class DashboardOverview extends Component
{
    public $totalMonthly = 0;
    public $activeCount = 0;
    public $nextBillName = 'None';
    public $nextBillDate = '-';
    public $chartData = [];
    public $chartLabels = [];

    #[On('subscription-updated')]
    public function mount()
    {
        $subs = Subscription::where('user_id', Auth::id())->get();

        $this->totalMonthly = $subs->sum('price');
        $this->activeCount = $subs->count();

        $nextSub = Subscription::where('user_id', Auth::id())
            ->where('next_renewal_date', '>=', now())
            ->orderBy('next_renewal_date', 'asc')
            ->first();

        if ($nextSub) {
            $this->nextBillName = $nextSub->name;
            $this->nextBillDate = Carbon::parse($nextSub->next_renewal_date)->format('d M Y');
        }

        // Simple Forecast logic
        $this->chartLabels = [];
        $this->chartData = [];
        for ($i = 0; $i < 6; $i++) {
            $month = now()->addMonths($i);
            $this->chartLabels[] = $month->format('M');
            $this->chartData[] = $this->totalMonthly * ($i + 1);
        }
    }

    public function render()
    {
        return view('livewire.subscription.dashboard-overview');
    }
}
