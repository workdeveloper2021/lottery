<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buyticket extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pId','sId','tickpriceids','useriddds','status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'useriddds', 'id');
    }
}