<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Neighborhood\StoreNeighborhoodRequest;
use App\Http\Requests\Neighborhood\UpdateNeighborhoodRequest;
use App\Models\Neighborhood;
use App\Models\Province;
use Flasher\Noty\Laravel\Facade\Noty;

class NeighborhoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $neighborhoods = Neighborhood::latest()->paginate(5);
        return view('pages.backend.neighborhoods.index')
            ->with('neighborhoods', $neighborhoods);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.backend.neighborhoods.create_edit')->with('provinces', Province::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNeighborhoodRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNeighborhoodRequest $request)
    {
        try {
            Neighborhood::create(
                ['name' => $request->name, 'province_uuid' => $request->province_uuid]
            );

            Noty::addSuccess(__(
                key: ':resource created',
                replace:[ 'resource' => __('Neighborhood')]
            ));
            return redirect()->route('neighborhood.index');
        } catch (\Throwable $th) {
            Noty::addError(__(
                key: 'Error creating :resource.',
                replace:[ 'resource' => __('Neighborhood')]
            ));
            return redirect()->route('neighborhood.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Neighborhood  $neighborhood
     * @return \Illuminate\Http\Response
     */
    public function show(Neighborhood $neighborhood)
    {
        Noty::addInfo(__(
            key: 'Not Found'));
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Neighborhood  $neighborhood
     * @return \Illuminate\Http\Response
     */
    public function edit(Neighborhood $neighborhood)
    {
        return view('pages.backend.neighborhoods.create_edit', [
            'neighborhood' => $neighborhood,
        ])->with('provinces', Province::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNeighborhoodRequest  $request
     * @param  \App\Models\Neighborhood  $neighborhood
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNeighborhoodRequest $request, Neighborhood $neighborhood)
    {
        try {
            $neighborhood->update([
                'name' => $request->name,
                'province_uuid' => $request->province_uuid,
            ]);
            Noty::addSuccess(__(
                key: ':resource updated',
                replace:[ 'resource' => __('Neighborhood')]
            ));

            return redirect()->route('neighborhood.index');
        } catch (\Throwable $e) {
//             throw $e;
                Noty::addError(__(
                    key: 'Error updating :resource.',
                    replace:[ 'resource' => __('Neighborhood')]
                ));

            return redirect()->route('neighborhood.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Neighborhood  $neighborhood
     * @return Response
     */
    public function destroy(Neighborhood $neighborhood)
    {
        try {
            $neighborhood->forceDelete();
            Noty::addSuccess(__(
                key: ':resource deleted',
                replace:[ 'resource' => __('Neighborhood')]
            ));
            return redirect()->route('neighborhood.index');
        } catch (\Throwable $th) {
            Noty::addError(__(
                key: 'Error deleting :resource.',
                replace:[ 'resource' => __('Neighborhood')]
            ));

            return redirect()->route('neighborhood.index');
        }
    }
}
