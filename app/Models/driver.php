<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class driver extends Model
{
    use HasFactory;

    // 데이터베이스 테이블 이름
    protected $table = 'driver'; 

   // protected $primaryKey = ''; // 기본 키 컬럼 이름
}
