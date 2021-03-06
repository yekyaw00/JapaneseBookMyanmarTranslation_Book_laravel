<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;

    protected $fillable=['chapter_name'];

    public function book(){
        return $this->belongsTo(Book::class);
    }

    public function vocabularies() {
        return $this->hasMany(Vocabulary::class);
    }
}
