<?php
/**
 * Created by PhpStorm.
 * User: sgq
 * Date: 18/8/8
 * Time: 下午5:11
 */
namespace App\Models\Common;

class BaseModel extends CommonModel
{

    protected $dateFormat = 'U';

    /**
     * 构造
     * <li>指定库</li>
     */
    public function __construct()
    {
        $this->connection = 'mysql'; //指定库
        parent::__construct();
    }
}