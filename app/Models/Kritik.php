<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kritik extends Model
{
    use HasFactory;

    protected $table = 'kritiks';
    protected $primaryKey = 'id';
<<<<<<< HEAD
    protected $fillable = ['comment','rating','film_id','user_id', ];

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
=======
    protected $fillable = ['comment','rating','film_id','user_id'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
>>>>>>> efd83a9 (Menambahkan api)
    }
}
