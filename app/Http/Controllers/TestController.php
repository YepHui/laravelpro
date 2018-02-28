<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 2018/2/23
 * Time: 15:23
 */

namespace App\Http\Controllers;

use App\Models\Trank;
use App\Models\Userinfo;
use DB;

class TestController extends Controller
{
    public function index(){
        DB::insert('insert into userinfo (username, passwd) values (?,?)',
            ['yaya','234567']);
    }

    public function selectTest()
    {
        $user = DB::select('select * from userinfo ');
        dd($user);
    }

    public function insertTest(){
        DB::table('userinfo')->insert([
            ['username'=>'test1','passwd'=>'test111'],
            ['username'=>'test2','passwd'=>'test222']
        ]);
    }

    public function selectTest2(){
        $userinfo = Userinfo::all()->toArray();
        dd($userinfo);
    }

    public function selectOne($request){
        $username='lisi';
        $uname=$request->input('uname');
        $userinfo=Userinfo::where($username,$uname)->first();
        dd($userinfo);
    }
    /*
     * 测试 */
    public function testTrank(){
        $tRank=Trank::popular()->orderBy('pid','desc')->get();
        /*foreach ($tRank as $trank){
            echo '&lt;'.$trank->pid.'&gt;'.$trank->NAME.'over<br>';
        }*/

        return response()->json($tRank);
        echo "testaaaaa";
    }
}