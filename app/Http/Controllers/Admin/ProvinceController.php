<?php

namespace App\Http\Controllers\Admin;

use App\Models\Country;
use App\Models\Province;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Http\Requests\Province\StoreProvinceRequest;
use App\Http\Requests\Province\UpdateProvinceRequest;



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
        return view('pages.backend.provinces.create_edit')->with('countries',Country::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProvinceRequest $request
     * @return Response
     */
    public function store(StoreProvinceRequest $request)
    {
        try {

            Province::create(
                ['name' => $request->name, 'country_uuid' => $request->country_uuid]
            );

            //  $this->flash()->addSuccess(__('Province created.'));
            return redirect()->route('province.index');
        } catch (\Throwable $th) {
            // throw $th;
            //  $this->flash()->addError(__('Error creating province.'));
            return redirect()->route('province.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Province $province
     * @return Response
     */
    public function show(Province $province)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Province $province
     * @return Response
     */
    public function edit(Province $province)
    {
        return view('pages.backend.provinces.create_edit',[
            'province' => $province
        ])->with('countries',Country::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateProvinceRequest  $request
     * @param Province $province
     * @return Response
     */
    public function update(UpdateProvinceRequest $request, Province $province)
    {
        try {
            $province->update([
                'name' => $request->name,
                'country_uuid' => $request->country_uuid
            ]);
            //  $this->flash()->addSuccess('Province updated.');
            return redirect()->route('province.index');
        } catch (\Throwable $e) {
            // throw $e;
            //  $this->flash()->addError('Error updating province.');
            return redirect()->route('province.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Province $province
     * @return Response
     */
    public function destroy(Province $province)
    {
        try {
            $province->forceDelete();
            //  $this->flash()->addSuccess('Province deleted.');
            return redirect()->route('province.index');
        } catch (\Throwable $th) {
            //  $this->flash()->addError('Error deleting province.');
            return redirect()->route('province.index');
        }
    }
}
