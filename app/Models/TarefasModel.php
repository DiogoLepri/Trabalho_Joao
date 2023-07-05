<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TarefasModel extends Model
{
    protected $table =  'projeto';

    protected $fillable = ['title','description','status'];

    protected $title;
    protected $description;
    protected $status;
}
