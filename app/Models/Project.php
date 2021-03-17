<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'projects';
    /**
     * @var bool
     */
    public $timestamps = true;

    /**
     * @return string
     */
    public function getCodeAndNameAttribute()
    {
        return $this->code.' - '.$this->name;
    }
}
