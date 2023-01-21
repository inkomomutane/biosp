<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Biosp\StoreBiospRequest;
use App\Http\Requests\Biosp\UpdateBiospRequest;
use App\Models\Biosp;
use App\Models\DocumentType;
use App\Models\ForwardedService;
use App\Models\Genre;
use App\Models\Neighborhood;
use App\Models\Provenance;
use App\Models\PurposeOfVisit;
use App\Models\ReasonOpeningCase;
use Flasher\Noty\Laravel\Facade\Noty;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class BiospController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:super-admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
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
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('pages.backend.biosps.create_edit')->with('neighborhoods', Neighborhood::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreBiospRequest  $request
     * @return RedirectResponse
     */
    public function store(StoreBiospRequest $request)
    {
        try {
            Biosp::create(
                [
                    'name' => $request->name,
                    'neighborhood_uuid' => $request->neighborhood_uuid,
                    'project_name' => $request->project_name,
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
     * @param  Biosp  $biosp
     * @return Application|Factory|View
     */
    public function show(Biosp $biosp)
    {
        return view('pages.backend.biosps.show')
            ->with([
                'biosp' => Biosp::with([
                    'neighborhood',
                    'genres',
                    'documentTypes',
                    'forwardedServices',
                    'provenances',
                    'purposeOfVisits',
                    'reasonOpeningCases',
                ])->find($biosp->uuid),
                'genres' => Genre::all(),
                'documentTypes' => DocumentType::all(),
                'forwardedServices' => ForwardedService::all(),
                'provenances' => Provenance::all(),
                'purposeOfVisits' => PurposeOfVisit::all(),
                'reasonOpeningCases' => ReasonOpeningCase::all(),
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Biosp  $biosp
     * @return Application|Factory|View
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
     * @param  UpdateBiospRequest  $request
     * @param  Biosp  $biosp
     * @return RedirectResponse|null
     */
    public function update(UpdateBiospRequest $request, Biosp $biosp): ?RedirectResponse
    {
        try {
            $biosp->update([
                'name' => $request->name,
                'neighborhood_uuid' => $request->neighborhood_uuid,
                'project_name' => $request->project_name,
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
     * @param  Biosp  $biosp
     * @return RedirectResponse|null
     */
    public function destroy(Biosp $biosp): ?RedirectResponse
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
