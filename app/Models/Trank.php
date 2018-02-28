<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 2018/2/24
 * Time: 8:59
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Trank extends Model
{
    //指定表名
    protected $table="t_rank";
    //自动维护时间戳
    public $timestamps = false;
    //指定idNAME
    protected $primaryKey="pid";
    //允许批量赋值的字段
    protected $fillable=['NAME','age','groupid'];
    //指定不允许批量赋值的字段
    protected $guarded=[];
    public function scopePopular($query){
        return $query->where('age','>=','23');
    }

    protected  function getDateFormat(){
        return time();
    }
}