<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chaine extends Model
{
    use HasFactory;
    protected $table = 'chaines';
    const TYPE_ABONNEMENT_FREE = 'Free';
    const TYPE_ABONNEMENT_VIP = 'VIP';
}
