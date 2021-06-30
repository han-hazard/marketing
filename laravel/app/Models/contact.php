<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    use HasFactory;
    protected $table = 'contact';
    protected $fillable = ['name','address','email','content','created_by'];
    public function user(){
        return $this->hasOne(User::class,'id','created_by');
    }
}
