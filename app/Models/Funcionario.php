<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    public function user(){
        return $this->hasOne(User::class,'id','users_id');
    }

    public function faltas()
    {
        return $this->hasMany(Faltas::class);
    }

    public function ferias()
    {
        return $this->hasMany(Ferias::class);
    }
}
