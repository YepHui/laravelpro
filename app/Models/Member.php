<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 2018/2/26
 * Time: 9:48
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public static function getMember(){
        return 'member name is sean';
    }
}