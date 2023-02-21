<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GeneralSetting extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name_ar',
        'name_en',
        'email',
        'tel',
        'zoom',
        'googleMeet',
        'microsoft',
        'facebook',
        'twitter',
        'whatsapp',
        'telegram',
        'instgram',
        'address',
        'logo',
        'vision',
        'mission',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
