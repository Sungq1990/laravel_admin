<?php
/**
 * Created by PhpStorm.
 * User: sgq
 * Date: 18/4/4
 * Time: 下午2:06
 */
namespace App\Http\Controllers;

/**
 * 前台通用控制器
 * CommonController
 */
class CommonController extends Controller
{
    /**
     * 接口的执行开始时间
     * <li>单位:微妙</li>
     * @var int
     */
    private $_iStartTime = 0;
    /**
     * 当前action name
     * @var string
     */
    private $_currentAction;
    /**r
     * controller method configurations
     */
    public static $method_configurations = array();

    public function __construct()
    {
        $this->_iStartTime = microtime(true);
        $this->_currentAction = explode('@',request()->route()->getActionName())[1];
        //是否需要记录日志
        if (!empty(static::$method_configurations[$this->_currentAction]['add_log'])) {

        }
    }

    /**
     * 代码返回格式 统一格式
     * <li>注意：函数本身不会终止后续代码的执行。</li>
     * <li>如果抛出状态码后要结束程序，请这样调用 return $this->returnData()</li>
     * @param int $code
     * @param string $message
     * @param array $data
     * @return json
     */
    public function returnData($code, $message = 'success', $data = [])
    {
        $result = [
            'code' => $code,
            'message' => $message,
            'data' => $data
        ];

        return response()->json($result);
    }
}