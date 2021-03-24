<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class infoconnectss extends Model
{
    use HasFactory;
    protected $table='info_connect';
    protected $fillable =['name'];//name','numberphone','birth_date
    public function user(){
        return $this->belongsTo('App\Models\User');
    }}
