<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Ticket;

class Priority extends Model
{
    use HasFactory;

    public function ticket(): HasMany
    {
        return $this->HasMany(Ticket::class);
    }
}
