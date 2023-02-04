<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\GrantRoleRequest;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\Biosp;
use App\Models\User;
use Flasher\Noty\Laravel\Facade\Noty;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
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

            Noty::addSuccess(__(
                key: ':resource created',
                replace: ['resource' => __('User')]
            ));

            return redirect()->route('user.index');
        } catch (\Throwable $th) {
            Noty::addError(__(
                key: 'Error creating :resource.',
                replace: ['resource' => __('User')]
            ));

            return redirect()->route('user.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  User  $user
     * @return Application|Factory|View
     */
    public function show(User $user): Application|Factory|View
    {
        return view('pages.backend.users.show')
            ->with([
                'user' => User::with([
                    'biosps',
                ])->find($user->ulid),
                'roles' => Role::all(),
                'biosps' => Biosp::all(),
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User  $user
     * @return Application|Factory|View
     */
    public function edit(User $user): Application|Factory|View
    {
        return view('pages.backend.users.create_edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateUserRequest  $request
     * @param  User  $user
     * @return RedirectResponse
     */
    public function update(UpdateUserRequest $request, User $user): RedirectResponse
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
            Noty::addSuccess(__(
                key: ':resource updated',
                replace: ['resource' => __('User')]
            ));

            return redirect()->route('user.index');
        } catch (\Throwable $e) {
            Noty::addError(__(
                key: 'Error updating :resource.',
                replace: ['resource' => __('User')]
            ));

            return redirect()->route('user.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User  $user
     * @return RedirectResponse|null
     */
    public function destroy(User $user): ?RedirectResponse
    {
        try {
            $user->delete();
            Noty::addSuccess(__(
                key: ':resource deleted',
                replace: ['resource' => __('User')]
            ));

            return redirect()->route('user.index');
        } catch (\Throwable $th) {
            Noty::addError(__(
                key: 'Error deleting :resource.',
                replace: ['resource' => __('User')]
            ));

            return redirect()->route('user.index');
        }
    }

    /**
     * @param  User  $user
     * @param  GrantRoleRequest  $request
     * @return RedirectResponse|null
     */
    public function grant(User $user, GrantRoleRequest $request): ?RedirectResponse
    {
        try {
            $user->syncRoles($request->role);
            $user->biosps()->sync($request->biosps);
            Noty::addSuccess('User role and biosp granted.');

            return redirect()->route('user.show', [
                'user' => $user->ulid,
            ]);
        } catch (\Throwable $th) {
            Noty::addError('Error granting role and biosp to user.');

            return redirect()->route('user.show', [
                'user' => $user->ulid,
            ]);
        }
    }
}
