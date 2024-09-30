<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $table = 'carts';

    protected $fillable = [
        'route',
        'user'
    ];

    public function getRoute ()
    {
        return $this->hasOne(Segment::class, 'id', 'route');
    }

    public function getUser ()
    {
        return $this->hasOne(User::class, 'id', 'user');
    }
}
