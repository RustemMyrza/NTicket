<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $table = 'tickets';

    protected $fillable = [
        'passenger',
        'route'
    ];

    public function getUser()
    {
        return $this->hasOne(User::class, 'id', 'passenger');
    }
}
