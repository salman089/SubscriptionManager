<?php

namespace App\Livewire\Subscription;

use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.app')]
class Index extends Component
{
    use WithPagination;

    #[Url(history: true)]
    public $search = '';

    #[Url(history: true)]
    public $startDate = ''; // Added

    #[Url(history: true)]
    public $endDate = '';   // Added

    public $cancelId = null;
    public $cancelName = '';
    public $confirmNameInput = '';

    // Reset pagination when any filter changes
    public function updatingSearch() { $this->resetPage(); }
    public function updatingStartDate() { $this->resetPage(); }
    public function updatingEndDate() { $this->resetPage(); }

    public function mount()
    {
        if (session()->has('notify')) {
            $this->dispatch('notify',
                message: session('notify')['message'],
                type: session('notify')['type']
            );
        }
    }

    public function markAsPaid($id)
    {
        $sub = Subscription::where('id', $id)->where('user_id', Auth::id())->first();
        if ($sub) {
            $sub->update([
                'next_renewal_date' => Carbon::parse($sub->next_renewal_date)->addMonth(),
            ]);
            $this->dispatch('subscription-updated');
            $this->dispatch('notify', message: 'Payment marked as paid!', type: 'success');
        }
    }

    public function confirmCancel($id)
    {
        $sub = Subscription::where('id', $id)->where('user_id', Auth::id())->first();
        if ($sub) {
            $this->cancelId = $sub->id;
            $this->cancelName = $sub->name;
            $this->confirmNameInput = '';
        }
    }

    public function closeModal() { $this->cancelId = null; }

    public function executeCancel()
    {
        if (strtolower(trim($this->confirmNameInput)) === strtolower(trim($this->cancelName))) {
            Subscription::where('id', $this->cancelId)->where('user_id', Auth::id())->delete();
            $this->closeModal();
            $this->dispatch('subscription-updated');
            $this->dispatch('notify', message: 'Subscription removed.', type: 'success');
        } else {
            $this->addError('confirmNameInput', 'The name does not match.');
        }
    }

    public function render()
    {
        $query = Subscription::where('user_id', Auth::id())
            ->when($this->search, fn ($q) => $q->where('name', 'like', '%'.$this->search.'%'))
            // Date Range logic
            ->when($this->startDate, fn ($q) => $q->whereDate('next_renewal_date', '>=', $this->startDate))
            ->when($this->endDate, fn ($q) => $q->whereDate('next_renewal_date', '<=', $this->endDate))
            ->orderBy('next_renewal_date', 'asc');

        return view('livewire.subscription.index', [
            'subscriptions' => $query->paginate(10)
        ]);
    }
}
