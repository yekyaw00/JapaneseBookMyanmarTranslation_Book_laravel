<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vocabulary extends Model
{
    use HasFactory;

    protected $fillable = ['vocab_name', 'vocab_pronunciation', 'vocab_meaning'];

    public function chapter(){
        return $this->belongsTo(Chapter::class);
    }
}
