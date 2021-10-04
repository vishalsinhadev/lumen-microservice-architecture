<?php
/**
 *
 * @author : Vishal Kumar Sinha <vishalsinhadev@gmail.com>
 */
namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\JsonResponse;
use App\Http\Traits\ApiResponseTrait;

/**
 * Class AuthController
 *
 * @group Auth
 * @package App\Http\Controllers
 */
class AuthController extends Controller
{

    use ApiResponseTrait;
    /**
     * Current User
     *
     * @authenticated
     * @return JsonResponse
     */
    public function getUser()
    {
        $user = Auth::user();
        $data = [
            'response' => new UserResource($user)
        ];
        return $this->successWithData($data);
    }

    /**
     * Login
     *
     * @bodyParam email string required The email
     * @bodyParam password string required The password
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);
        $username = $request->email;
        $password = $request->password;
        $user = User::where([
            'email' => $username
        ])->first();
        if ($user == null) {
            return $this->errorsWithMessage(true, 'Incorrect Email or Password', 422);
        }
        if (Hash::check($password, $user->password)) {
            $data = [
                'response' => new UserResource($user),
                'token' => $user->createToken('secret')->accessToken
            ];
            return $this->successWithData($data);
        }
        return $this->errorsWithMessage(true, 'Incorrect Email or Password', 422);
    }

    /**
     * Register
     *
     * @bodyParam email string required The email
     * @bodyParam password string required The password
     * @bodyParam name string required The name
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function register(Request $request)
    {}

    /**
     * Send new Password Request
     *
     * @bodyParam email string required The email
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function forgotPassword(Request $request)
    {}

    public function recoverPassword(Request $request, $otp)
    {}

    public function changePassword(Request $request)
    {}

    public function logout(Request $request)
    {
        $request->user()
            ->token()
            ->revoke();
        return $this->successWithData([], 'Successfully logged out');
    }
}