<?php
/**
 * Created by PhpStorm.
 * User: sgq
 * Date: 18/4/4
 * Time: 下午3:21
 */
namespace App\Models\Common;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CommonModel extends Model{
    /**
     * 构造函数
     * <li>表名初始化</li>
     */
    public function __construct() {
        parent::__construct();
        if (get_class($this) != 'CommonModel') {
            if (empty($this->table)) {
                $this->table = strtolower(preg_replace('/((?<=[a-z])(?=[A-Z]))/', '_', str_replace('\\', '', substr(strrchr(get_class($this), '\\'), 0, -5))));
            }
        }
    }

    /**
     * 重新定义时间戳格式
     * @param \DateTime|int $value
     * @return false|int
     */
    public function fromDateTime($value){
        return strtotime(parent::fromDateTime($value));
    }
    /**
     * 执行原生SQL
     * @param mixed  $mSql sql语句
     * <li>如果为数组，函数内部会使用implode($aSql) 转成字符串</li>
     * @param unknown $bindings
     * @return \Illuminate\Database\Eloquent\Collection
     */
    protected function runRawSql($mSql, $bindings = []){
        $sSql = (is_array($mSql)? implode($mSql): strval($mSql));
        return $this->fromQuery($sSql, $bindings, $this->connection);
    }
    /**
     * 开启SQL语句日志记录
     * @return void
     */
    protected function openSqlHistory(){
        DB::connection($this->connection)->enableQueryLog();
    }
    /**
     * 获取sql语句的执行日志
     */
    protected function getSqlHistory(){
        return DB::connection($this->connection)->getQueryLog();
    }
}