<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;
    //protected $fillable = ['title', 'brand]

    public function scopeFilter($query, array  $filters){ //Permite filtrar en el modelo
        if ($filters['tag'] ?? false) {//Si esto no es false, coalescent
            //SQL Query,buscando tags que sean igual al valor de tag
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }

        if ($filters['search'] ?? false) {
            //Diferentes queries buscando el valor en el search bar
            $query->where('title', 'like', '%' . request('search') . '%')
            ->orWhere('description', 'like', '%' . request('search') . '%')
            ->orWhere('tags', 'like', '%' . request('search') . '%');
        }

    }
}
