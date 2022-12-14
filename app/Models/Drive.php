<?php

namespace App\Models;

use App\Models\User;
use App\Models\DriveFile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Drive extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'date',
        'name',
        'notes',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function drive_files()
    {
        return $this->hasMany(DriveFile::class, 'drive_id', 'id');
    }
}
