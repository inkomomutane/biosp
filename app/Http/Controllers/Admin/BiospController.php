<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Biosp\StoreBiospRequest;
use App\Http\Requests\Biosp\UpdateBiospRequest;
use App\Models\Biosp;
use App\Models\Neighborhood;
use Flasher\Noty\Laravel\Facade\Noty;

class BiospController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:super-admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $biosps = Biosp::with('neighborhood')->latest()->paginate(5);
        return view('pages.backend.biosps.index')
            ->with('biosps', $biosps);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.backend.biosps.create_edit')->with('neighborhoods', Neighborhood::all());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Biosp\StoreBiospRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBiospRequest $request)
    {
        try {
            Biosp::create(
                [
                    'name' => $request->name,
                    'neighborhood_uuid' => $request->neighborhood_uuid,
                    'project_name' => $request->project_name
                ]
            );

            Noty::addSuccess(__(
                key: ':resource created',
                replace:['resource' => __('Biosp')]
            ));

            return redirect()->route('biosp.index');
        } catch (\Throwable $th) {
            Noty::addError(__(
                key: 'Error creating :resource.',
                replace:['resource' => __('Biosp')]
            ));
            return redirect()->route('biosp.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Biosp  $biosp
     * @return \Illuminate\Http\Response
     */
    public function show(Biosp $biosp)
    {
        Noty::addInfo(__('Not Found'));
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Biosp  $biosp
     * @return \Illuminate\Http\Response
     */
    public function edit(Biosp $biosp)
    {
        return view('pages.backend.biosps.create_edit', [
            'biosp' => $biosp,
        ])->with('neighborhoods', Neighborhood::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Biosp\UpdateBiospRequest  $request
     * @param  \App\Models\Biosp  $biosp
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBiospRequest $request, Biosp $biosp)
    {
        try {
            $biosp->update([
                'name' => $request->name,
                'neighborhood_uuid' => $request->neighborhood_uuid,
                'project_name' => $request->project_name
            ]);
            Noty::addSuccess(__(
                key: ':resource updated',
                replace:['resource' => __('Biosp')]
            ));

            return redirect()->route('biosp.index');
        } catch (\Throwable $e) {
            Noty::addError(__(
                key: 'Error updating :resource.',
                replace:['resource' => __('Biosp')]
            ));

            return redirect()->route('biosp.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Biosp  $biosp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Biosp $biosp)
    {
        try {
            $biosp->delete();
            Noty::addSuccess(__(
                key: ':resource deleted',
                replace:['resource' => __('Biosp')]
            ));

            return redirect()->route('biosp.index');
        } catch (\Throwable $th) {
            Noty::addError(__(
                key: 'Error deleting :resource.',
                replace:['resource' => __('Biosp')]
            ));

            return redirect()->route('biosp.index');
        }
    }
}
