<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 2018/5/3
 * Time: 9:30
 */

namespace App\Http\Controllers;
use App\Commands\MyJob;
use App\Http\Controllers\Controller;
use Illuminate\Queue\Queue;

class TestQueueController extends Controller
{
    public function index()
    {
        /*ignore_user_abort(); //即使Client断开(如关掉浏览器)，PHP脚本也可以继续执行.
        set_time_limit(10); // 执行时间为无限制，php默认执行时间是30秒，可以让程序无限制的执行下去
        $interval=2; // 每隔一天运行一次
        do{
            sleep($interval); // 按设置的时间等待一小时循环执行
            $myjob=new MyJob();
            $this->dispatch($myjob);
            ob_flush();
        }while(true);*/
        $this->dispatch(new MyJob);
        //Queue::later(60, new PushMessage());// 推进队列
        $ver=$_SESSION['state'];
        return response()->json($ver);
    }
    /*public function takeTicket(){
        $Id=$_POST['word'];
        $this->dispatch(new takeTicket($Id));
    }*/
}