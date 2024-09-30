<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Segment extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $table = 'routes';

    protected $fillable = [
        'from_place',
        'to_place',
        'departure_time',
        'arrival_time',
        'price',
        'seats_number',
        'organizer',
    ];

    public function getTickets()
    {
        return $this->hasMany(Segment::class, 'tickets', 'id');
    }

    public function getOrganization()
    {
        return $this->hasOne(Organization::class, 'id', 'organizer');
    }
}
