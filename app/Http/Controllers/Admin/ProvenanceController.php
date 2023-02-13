<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Provenance\StoreProvenanceRequest;
use App\Http\Requests\Provenance\UpdateProvenanceRequest;
use App\Models\Provenance;
use Flasher\Noty\Laravel\Facade\Noty;
use Illuminate\Http\Response;

class ProvenanceController extends Controller
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
        $provenances = Provenance::latest()->paginate(5);

        return view('pages.backend.provenances.index')
            ->with('provenances', $provenances);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('pages.backend.provenances.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreProvenanceRequest  $request
     * @return Response
     */
    public function store(StoreProvenanceRequest $request)
    {
        try {
            Provenance::create(['name' => $request->name]);

            Noty::addSuccess(__(
                key: ':resource created',
                replace:['resource' => __('Provenance')]
            ));

            return redirect()->route('provenance.index');
        } catch (\Throwable $th) {
            Noty::addError(__(
                key: 'Error creating :resource.',
                replace:['resource' => __('Provenance')]
            ));

            return redirect()->route('provenance.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Provenance  $provenance
     * @return Response
     */
    public function show(Provenance $provenance)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Provenance  $provenance
     * @return Response
     */
    public function edit(Provenance $provenance)
    {
        return view('pages.backend.provenances.create_edit', [
            'provenance' => $provenance,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateProvenanceRequest  $request
     * @param  Provenance  $provenance
     * @return Response
     */
    public function update(UpdateProvenanceRequest $request, Provenance $provenance)
    {
        try {
            $provenance->update([
                'name' => $request->name,
            ]);
            Noty::addSuccess(__(
                key: ':resource updated',
                replace:['resource' => __('Provenance')]
            ));

            return redirect()->route('provenance.index');
        } catch (\Throwable $e) {
            Noty::addError(__(
                key: 'Error updating :resource.',
                replace:['resource' => __('Provenance')]
            ));

            return redirect()->route('provenance.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Provenance  $provenance
     * @return Response
     */
    public function destroy(Provenance $provenance)
    {
        try {
            $provenance->forceDelete();
            Noty::addSuccess(__(
                key: ':resource deleted',
                replace:['resource' => __('Provenance')]
            ));

            return redirect()->route('provenance.index');
        } catch (\Throwable $th) {
            Noty::addError(__(
                key: 'Error deleting :resource.',
                replace:['resource' => __('Provenance')]
            ));

            return redirect()->route('provenance.index');
        }
    }
}
