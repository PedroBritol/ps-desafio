<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produto;

class Categoria extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_name'
    ];

    public function produto()
    {
        return $this->hasOne(Produto::class);
    }
}
