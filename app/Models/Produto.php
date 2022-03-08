<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;
use Illuminate\Support\Str;
class Produto extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'categoria_id', 'name', 'price', 'description', 'amount', 'photo'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function getTitleShortAttribute()
    {
        return Str::limit($this->description ?? '', 180,'...');
    }
    
}
