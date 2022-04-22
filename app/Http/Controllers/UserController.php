<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    private UserRepository $userRepository;

    public function __construct(
        UserRepository $userRepository
    ) {
        $this->userRepository = $userRepository;
    }

    public function index(Request $request)
    {
        $filters = [];

        if (isset($request->name)) {
            $filters['name'] = $request->name;
        }

        if (isset($request->email)) {
            $filters['email'] = $request->email;
        }

        if (isset($request->phone)) {
            $filters['phone'] = $request->phone;
        }

        if (isset($request->role)) {
            $filters['role'] = $request->role;
        }

        $users = $this->userRepository->getAllUser($filters);

        return view('admin.user.index', compact('users'));
    }

    public function createUser()
    {
        return view('admin.user.create');
    }

    public function viewUpdateUser(User $user)
    {
        return view('admin.user.update', compact('user'));
    }

    public function updateUser(UpdateUserRequest $request, User $user)
    {
        $data = [
            'name' => $request->name,
            'phone' => $request->phone
        ];

        if (!empty($request->post('cmt'))) {
            $data['cmt'] = Hash::make($request->post('cmt'));
        }

        if (!empty($request->post('address'))) {
            $data['address'] = Hash::make($request->post('address'));
        }

        if (!empty($request->post('password'))) {
            $data['password'] = Hash::make($request->post('password'));
        }

        if (!empty($request->post('confirm_password'))) {
            $data['password_confirmation'] = $request->post('password_confirmation');
        }

        $isUpdated = $this->userRepository->updateById($user->id, $data);
        if ($isUpdated) {
            alert()->success('Thành công!', 'Cập nhật ' . $request->name . ' thành công!');
        } else {
            alert()->warning('Cảnh báo!', 'Cập nhật tài khoản lỗi!');
        }

        return redirect()->route('admin.users.index');
    }

    public function storeUser(UserRequest $request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'role' => $request->role,
            'email_verified_at' => date('Y-m-d H:i:s')
        ];

        if (isset($request->phone)) {
            $data['phone'] = $request->phone;
        }

        if (isset($request->address)) {
            $data['address'] = $request->address;
        }

        if (isset($request->cmt)) {
            $data['cmt'] = $request->cmt;
        }

        if (isset($request->year) and isset($request->month) and isset($request->day)) {
            if (strlen($request->month) == 1) {
                $request->month = '0' . $request->month;
            }

            if (strlen($request->day) == 1) {
                $request->day = '0' . $request->day;
            }

            $data['dob'] = $request->year . '-' . $request->day . '-' . $request->month;
        }

        $user = $this->userRepository->createUser($data);

        if ($user instanceof User) {
            alert()->success('Thành công!', 'Tạo tài khoản thành công!');
        } else {
            alert()->warning('Cảnh báo!', 'Tạo tài khoản lỗi!');
        }

        return redirect()->route('admin.users.index');
    }

    public function deleteUser(int $userId)
    {
        $user = $this->userRepository->deleteById($userId);

        if ($user) {
            alert()->success('Thành công!', 'Xóa tài khoản thành công!');
        } else {
            alert()->warning('Cảnh báo!', 'Xóa tài không khoản thành công!');
            
        }

        return redirect()->route('admin.users.index');
    }
}
