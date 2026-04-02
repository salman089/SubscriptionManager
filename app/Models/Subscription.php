<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    // Allow saving data to these fields
    protected $fillable = ['user_id', 'name', 'price', 'description', 'next_renewal_date'];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'next_renewal_date' => 'date',
        ];
    }

    // A subscription belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
