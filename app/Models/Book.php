<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'room',
        'bookshelf',
        'shelf',
        'position'
    ];
    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }
    public function available()
    {
        $lendings = Lending::where('book_id', $this->id)->count();
        if($lendings) return false; 
        else return true;
    }
}
