<?php 
namespace App\Http\Controllers\Auth;

use Auth;
use App\Models\User;
use Config;
use Request;
use Illuminate\Routing\Controller;
use App\Exceptions\User\AuthenticationFailException;
use App\Exceptions\App\InvalidRequestInputException;

class PhylabAuthController extends Controller {

    /**
     * Handle an authentication attempt.
     *
     * @return Response
     */
    public function postLogin()
    {
        $checkBool = false;
        $validatorRules = array(
                'email'  => 'required',
                'password' => 'required'
            );
        $validatorAttributes = array(
                'email'  => '邮箱',
                'password' => '密码'
            );
        postCheck($validatorRules,Config::get('phylab.validatorMessage'),$validatorAttributes);
        if(Request::has('remember'))
            $checkBool = Auth::attempt(['email' => Request::get('email'), 'password' => Request::get('password')], Request::get('remember'));
        else
            $checkBool = Auth::attempt(['email' => Request::get('email'), 'password' => Request::get('password')]);
        if($checkBool){
            return response()->json(["status"=>SUCCESS_MESSAGE]);
        }
        else{
            throw new AuthenticationFailException();
        }
    }
    /**
     * Handle register and login.
     *
     * @return Response
     */
    public function postRegister(){
        $validatorRules = array(
                'name' => 'required|between:6,20|unique:users',
                'email' => 'required|email|max:255|unique:users',
                'student_id' => 'required|studentId|unique:users',
                'password' => 'required|confirmed|between:6,15',
            );
        $validatorAttributes = array(
                'name'  => '用户名',
                'email' => '邮箱',
                'student_id' => '学号',
                'password'  => '密码'
            );
        try{
        postCheck($validatorRules,Config::get('phylab.validatorMessage'),$validatorAttributes);
        }
        catch(InvalidRequestInputException $e){
            return response()->view('auth.register',["status"=>FAIL_MESSAGE,"message"=>json_decode($e->getMessage())]);
        }
        Auth::login($this->create(Request::all()));
        return redirect('/index');
    }
    /**
     * insert a user into users table.
     * @param array
     * @return User_id
     */
    function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'student_id' => $data['student_id'],
            'password' => bcrypt($data['password']),
            'avatar_path'    =>  Config::get('phylab.defaultAvatarPath'),
            'birthday'      => '1990-01-01'
        ]);
    }

}
