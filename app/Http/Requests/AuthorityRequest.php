<?php
/**
 * Created by PhpStorm.
 * User: sgq
 * Date: 18/4/12
 * Time: 下午6:19
 */
namespace App\Http\Requests;

class AuthorityRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize()
    {
        //return false;
        return true;
    }

    /**
     * 自定义验证规则rules
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required',
            'password' => 'required'
        ];
    }

    /**
     * 自定义验证信息
     * @return array
     */
    public function messages()
    {
        return [
            'email.required' => '邮箱不能为空',
            'password.required' => '登录密码不能为空'
        ];
    }
}