<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manifestacao extends Model
{
    use HasFactory;


    protected $table = 'manifestacoes';

    
    protected $fillable = ['nome', 'email', 'tipo', 'mensagem', 'status'];
}
