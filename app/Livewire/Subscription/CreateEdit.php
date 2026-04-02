<?php

namespace App\Livewire\Subscription;

use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class CreateEdit extends Component
{
    public ?int $subscriptionId = null;

    public string $name = '';

    public string|float $price = '';

    public string $next_renewal_date = '';

    public string $description = '';

    public function mount(?int $id = null): void
    {
        if ($id) {
            $sub = Subscription::where('user_id', Auth::id())->findOrFail($id);
            $this->subscriptionId = $sub->id;
            $this->name = $sub->name;
            $this->price = $sub->price;
            // Format for the date input (must be Y-m-d)
            $this->next_renewal_date = $sub->next_renewal_date->format('Y-m-d');
            $this->description = $sub->description ?? '';
        }
    }

    public function save(): mixed
    {
        $data = $this->validate([
            'name' => 'required|min:3',
            'price' => 'required|numeric|min:0',
            'next_renewal_date' => 'required|date',
            'description' => 'nullable|string|max:500',
        ]);

        if ($this->subscriptionId) {
            $sub = Subscription::where('user_id', Auth::id())->findOrFail($this->subscriptionId);
            $sub->update($data);
        } else {
            Auth::user()->subscriptions()->create($data);
        }

        session()->flash('notify', ['message' => 'Subscription saved!', 'type' => 'success']);

        return $this->redirect(route('subscriptions.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.subscription.create-edit');
    }
}
