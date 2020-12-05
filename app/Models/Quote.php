<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;
    protected $appends = ["author"];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
    public function getAuthorAttribute()
    {
        if($this->author_id == 1 ) {
            return $this->author = "Marcus Aurelius";
        } elseif($this->author_id == 2) {
            return  $this->author = "Seneca";
        }
        elseif($this->author_id == 3) {
            return  $this->author = "Epictetus";
        }
        elseif($this->author_id == 4) {
            return  $this->author = "Cato";
        }
        elseif($this->author_id == 5) {
            return   $this->author = "Zeno";
        } else {
            return null;
        }


    }
}
