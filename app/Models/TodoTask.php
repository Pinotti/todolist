<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodoTask extends Model
{
    use HasFactory;

    protected $fillable = [
        'descricao',
        'completo'
    ];

    public function todo()
    {
        return $this->belongsTo(Todo::class);
    }
}
