<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 2018/2/26
 * Time: 10:00
 */

namespace App\Http\Controllers;


use App\Models\Trank;

class TrankController extends Controller
{
    public function orm1(){
//        all();
//        $tranks=Trank::all();
//        find();
//        $trank=Trank::find('10');
//        findOrFail()
//        $trank=Trank::findOrFail('100');
//        var_dump($trank);
//        $tranks=Trank::get();
//        dd($tranks);
//        $tranks=Trank::where('pid','>','5')
//        ->orderBy('age','desc')
//        ->first();
//        dd($tranks);
//        echo '<pre>';
//        Trank::chunk(4,function($students){
//            var_dump($students);
//        });
//        聚合函数
//        $num=Trank::count();
//        var_dump($num);
        $max=Trank::where('pid','>','10')->max('age');
        var_dump($max);
    }
    public function orm2(){
//        使用模型的Create方法新增数据
//        $trank=Trank::create(
//            ['NAME'=>'test1','age'=>'17','groupid'=>'3']
//        );
//        dd($trank);
        //firstOrCreate()
//        $trank=Trank::firstOrCreate(
//            ['NAME'=>'test2']
//        );
        //firstOrNew
        $trank=Trank::firstOrNew(
            ['NAME'=>'test3']
        );
        //dd($trank);
        $bool=$trank->save();
        dd($bool);

    }
    public function orm3(){
        //通过模型更新数据
//        $trank=Trank::find(11);
//        $trank->age='18';
//        $bool=$trank->save();
//        dd($bool);

        $num=Trank::where('pid','>','12')->update(
            ['age'=>'41']
        );
        var_dump($num);
    }
    public function orm4(){
        //通过模型删除
//        $trank=Trank::find(15);
//        $bool=$trank->delete();
//        var_dump($bool);
        //通过主键删除
//        $num=Trank::destroy(13);
//        $num=Trank::destroy(12,14);
//        $num=Trank::destroy([12,14]);
//        var_dump($num);
        $num=Trank::where('pid','>','10')->delete();
        var_dump($num);
        echo "";
    }
}