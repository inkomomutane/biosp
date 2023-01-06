<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Province\StoreProvinceRequest;
use App\Http\Requests\Province\UpdateProvinceRequest;
use App\Models\Country;
use App\Models\Province;
use Flasher\Noty\Laravel\Facade\Noty;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class ProvinceController extends Controller
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
        $countries = Province::latest()->paginate(5);

        return view('pages.backend.provinces.index')
            ->with('provinces', $countries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('pages.backend.provinces.create_edit')->with('countries', Country::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreProvinceRequest  $request
     * @return Response
     */
    public function store(StoreProvinceRequest $request)
    {
        try {
            Province::create(
                ['name' => $request->name, 'country_uuid' => $request->country_uuid]
            );

            Noty::addSuccess(__(
                key: ':resource created',
                replace:['resource' => __('Province')]
            ));

            return redirect()->route('province.index');
        } catch (\Throwable $th) {
            Noty::addError(__(
                key: 'Error creating :resource.',
                replace:['resource' => __('Province')]
            ));
            return redirect()->route('province.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Province  $province
     * @return Response
     */
    public function show(Province $province)
    {
        Noty::addInfo(__('Not Found'));

        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Province  $province
     * @return Response
     */
    public function edit(Province $province)
    {
        return view('pages.backend.provinces.create_edit', [
            'province' => $province,
        ])->with('countries', Country::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateProvinceRequest  $request
     * @param  Province  $province
     * @return Response
     */
    public function update(UpdateProvinceRequest $request, Province $province)
    {
        try {
            $province->update([
                'name' => $request->name,
                'country_uuid' => $request->country_uuid,
            ]);
            Noty::addSuccess(__(
                key: ':resource updated',
                replace:['resource' => __('Province')]
            ));

            return redirect()->route('province.index');
        } catch (\Throwable $e) {
            Noty::addError(__(
                key: 'Error updating :resource.',
                replace:['resource' => __('Province')]
            ));

            return redirect()->route('province.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Province  $province
     * @return Response
     */
    public function destroy(Province $province)
    {
        try {
            $province->forceDelete();
            Noty::addSuccess(__(
                key: ':resource deleted',
                replace:['resource' => __('Province')]
            ));

            return redirect()->route('province.index');
        } catch (\Throwable $th) {
            Noty::addError(__(
                key: 'Error deleting :resource.',
                replace:['resource' => __('Province')]
            ));

            return redirect()->route('province.index');
        }
    }
}
