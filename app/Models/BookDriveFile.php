<?php

namespace App\Models;

use App\Models\User;
use App\Models\BookDrive;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BookDriveFile extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'bookDrive_id',
        'date',
        'file',
        'img',
        'name',
        'notes',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function book_drives()
    {
        return $this->belongsTo(BookDrive::class, 'bookDrive_id', 'id');
    }
}
