<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 2018/3/4
 * Time: 14:41
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WxModel extends Model
{
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'wx_access_token';

    public $primaryKey = 'id';

    protected $dateFormat = 'U';

}