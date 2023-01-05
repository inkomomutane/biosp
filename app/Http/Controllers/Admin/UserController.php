<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\GrantRoleRequest;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use Flasher\Noty\Laravel\Facade\Noty;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:super-admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::latest()->paginate(5);

        return view('pages.backend.users.index')
        ->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('pages.backend.users.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return Response
     */
    public function store(StoreUserRequest $request)
    {
        try {
            $data = $request->all();
            $dataCreate = [];

            foreach ($data as $key => $value) {
                if ($key == 'password' && $value) {
                    $value = Hash::make($value);
                }
                if (! is_null($value)) {
                    $dataCreate[$key] = $value;
                }
            }
            $user = User::create($dataCreate);
            $user->syncRoles(['aosp']);

            Noty::addSuccess(__('User created.'));

            return redirect()->route('user.index');
        } catch (\Throwable $th) {
            // throw $th;
            Noty::addError(__('Error creating user.'));

            return redirect()->route('user.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return Response
     */
    public function show(User $user)
    {
        return view('pages.backend.users.show')
        ->with('user', $user)
        ->with('roles', Role::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return Response
     */
    public function edit(User $user)
    {
        return view('pages.backend.users.create_edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->all();

        $dataUpdate = [];
        foreach ($data as $key => $value) {
            if ($key == 'password' && $value) {
                $value = Hash::make($value);
            }
            if (! is_null($value)) {
                $dataUpdate[$key] = $value;
            }
        }
        try {
            $user->update($dataUpdate);
            Noty::addSuccess('User updated.');

            return redirect()->route('user.index');
        } catch (\Throwable $e) {
            // throw $e;
            Noty::addError('Error updating user.');

            return redirect()->route('user.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return Response
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
            Noty::addSuccess('User deleted.');

            return redirect()->route('user.index');
        } catch (\Throwable $th) {
            Noty::addError('Error deleting user.');

            return redirect()->route('user.index');
        }
    }

    public function grant(User $user, GrantRoleRequest $request)
    {
        try {
            $user->syncRoles($request->role);
            Noty::addSuccess('User role granted.');

            return redirect()->route('user.show', [
                'user' => $user->uuid,
            ]);
        } catch (\Throwable $th) {
            Noty::addError('Error grantig role to user.');

            return redirect()->route('user.show', [
                'user' => $user->uuid,
            ]);
        }
    }
}
