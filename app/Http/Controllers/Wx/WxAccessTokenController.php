<?php namespace App\Http\Controllers\Wx;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\WxModel;
use DB;

class WxAccessTokenController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| WxAccessToken Controller
	|--------------------------------------------------------------------------
	|判断AccessToken的有效时间，保存并返回
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//$this->middleware('auth');
	}

	/**
	 * 获取AccessToken.
	 * @param $appid,$appsecret
	 * @return Response
	 */
	public function getAccessToken($appid,$appsecret){
		$newAccessToken = WxModel::find(1);
		$createTime = $newAccessToken->create_time;

		$data = array();
		//判断是否有access信息，没有则新建
		if(!empty($newAccessToken)){
			//如果现在的时间大于有效期
			if (time() > $createTime){
				$data['access_token'] = $this->getNewAccessToken($appid,$appsecret);
				$data['create_time']=strtotime("+1 hours 30 minute");

				//更新AccessToken
				$newAccessToken->update($data);
				return $data['access_token'];
			}else{
				return $newAccessToken->access_token;
			}
		}else{
			$data['access_token'] = $this->getNewAccessToken($appid,$appsecret);
			$data['create_time']=strtotime("+1 hours 30 minute");
			$createAccessToken = WxModel::create($data);
			return $createAccessToken->access_token;
		}
	}

	private function getNewAccessToken($appid,$appsecret){
		$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$appid}&secret={$appsecret}";
		$access_token_Arr = $this->https_request($url);
		return $access_token_Arr['access_token'];
	}

	private function https_request($url){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$out = curl_exec($ch);
		curl_close($ch);
		return  json_decode($out,true);
	}

}
