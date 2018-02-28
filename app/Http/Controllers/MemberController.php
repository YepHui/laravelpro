<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 2018/2/26
 * Time: 9:27
 */

namespace App\Http\Controllers;


use App\Models\Member;

class MemberController extends Controller
{
    public function info($id){
        return Member::getMember();
//        return 'member-info-'.$id;
//        return route('memberinfo');
    }
}