<?php

namespace App\Models;

use App\Models\User;
use App\Models\BookDriveFile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BookDrive extends Model
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

    public function Book_drive_files()
    {
        return $this->hasMany(BookDriveFile::class, 'bookDrive_id', 'id');
    }
}
