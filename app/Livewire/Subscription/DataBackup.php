<?php

namespace App\Livewire\Subscription;

use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.app')]
class DataBackup extends Component
{
    use WithFileUploads;

    public $backupFile;

    public function exportData()
    {
        $subscriptions = Subscription::where('user_id', Auth::id())->get();
        $filename = 'sub_manager_backup_'.now()->format('Y_m_d_H_i').'.json';

        return response()->streamDownload(function () use ($subscriptions) {
            echo $subscriptions->toJson(JSON_PRETTY_PRINT);
        }, $filename);
    }

    public function importData()
    {
        $this->validate([
            'backupFile' => 'required|file|mimes:json|max:2048',
        ]);

        $json = file_get_contents($this->backupFile->getRealPath());
        $data = json_decode($json, true);

        if ($data) {
            foreach ($data as $item) {
                Subscription::updateOrCreate(
                    [
                        'name' => $item['name'],
                        'user_id' => Auth::id(),
                    ],
                    [
                        'price' => $item['price'],
                        'next_renewal_date' => $item['next_renewal_date'],
                        'description' => $item['description'] ?? null,
                    ]
                );
            }

            session()->flash('notify', ['message' => 'Data imported successfully!', 'type' => 'success']);

            return $this->redirect(route('subscriptions.index'), navigate: true);
        }
    }

    public function render()
    {
        return view('livewire.subscription.data-backup');
    }
}
