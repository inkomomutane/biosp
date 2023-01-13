<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PurposeOfVisit\StorePurposeOfVisitRequest;
use App\Http\Requests\PurposeOfVisit\UpdatePurposeOfVisitRequest;
use App\Models\PurposeOfVisit;
use Flasher\Noty\Laravel\Facade\Noty;
use Illuminate\Http\Response;

class PurposeOfVisitController extends Controller
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
        $purpose_of_visits = PurposeOfVisit::latest()->paginate(5);

        return view('pages.backend.purpose_of_visits.index')
            ->with('purpose_of_visits', $purpose_of_visits);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('pages.backend.purpose_of_visits.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StorePurposeOfVisitRequest  $request
     * @return Response
     */
    public function store(StorePurposeOfVisitRequest $request)
    {
        try {
            PurposeOfVisit::create(['name' => $request->name]);

            Noty::addSuccess(__(
                key: ':resource created',
                replace:['resource' => __('Purpose of visit')]
            ));

            return redirect()->route('purpose_of_visit.index');
        } catch (\Throwable $th) {
            Noty::addError(__(
                key: 'Error creating :resource.',
                replace:['resource' => __('Purpose of visit')]
            ));

            return redirect()->route('purpose_of_visit.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  PurposeOfVisit  $purpose_of_visit
     * @return Response
     */
    public function show(PurposeOfVisit $purpose_of_visit)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  PurposeOfVisit  $purpose_of_visit
     * @return Response
     */
    public function edit(PurposeOfVisit $purpose_of_visit)
    {
        return view('pages.backend.purpose_of_visits.create_edit', [
            'purpose_of_visit' => $purpose_of_visit,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdatePurposeOfVisitRequest  $request
     * @param  PurposeOfVisit  $purpose_of_visit
     * @return Response
     */
    public function update(UpdatePurposeOfVisitRequest $request, PurposeOfVisit $purpose_of_visit)
    {
        try {
            $purpose_of_visit->update([
                'name' => $request->name,
            ]);
            Noty::addSuccess(__(
                key: ':resource updated',
                replace:['resource' => __('Purpose of visit')]
            ));

            return redirect()->route('purpose_of_visit.index');
        } catch (\Throwable $e) {
            Noty::addError(__(
                key: 'Error updating :resource.',
                replace:['resource' => __('Purpose of visit')]
            ));

            return redirect()->route('purpose_of_visit.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  PurposeOfVisit  $purpose_of_visit
     * @return Response
     */
    public function destroy(PurposeOfVisit $purpose_of_visit)
    {
        try {
            $purpose_of_visit->forceDelete();
            Noty::addSuccess(__(
                key: ':resource deleted',
                replace:['resource' => __('Purpose of visit')]
            ));

            return redirect()->route('purpose_of_visit.index');
        } catch (\Throwable $th) {
            Noty::addError(__(
                key: 'Error deleting :resource.',
                replace:['resource' => __('Purpose of visit')]
            ));

            return redirect()->route('purpose_of_visit.index');
        }
    }
}
