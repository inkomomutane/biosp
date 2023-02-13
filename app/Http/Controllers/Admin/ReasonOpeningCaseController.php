<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReasonOpeningCase\StoreReasonOpeningCaseRequest;
use App\Http\Requests\ReasonOpeningCase\UpdateReasonOpeningCaseRequest;
use App\Models\ReasonOpeningCase;
use Flasher\Noty\Laravel\Facade\Noty;
use Illuminate\Http\Response;

class ReasonOpeningCaseController extends Controller
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
        $reason_opening_cases = ReasonOpeningCase::latest()->paginate(5);

        return view('pages.backend.reason_opening_cases.index')
            ->with('reason_opening_cases', $reason_opening_cases);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('pages.backend.reason_opening_cases.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StorePurposeOfVisitRequest  $request
     * @return Response
     */
    public function store(StoreReasonOpeningCaseRequest $request)
    {
        try {
            ReasonOpeningCase::create(['name' => $request->name]);

            Noty::addSuccess(__(
                key: ':resource created',
                replace:['resource' => __('Reason of opening case')]
            ));

            return redirect()->route('reason_opening_case.index');
        } catch (\Throwable $th) {
            Noty::addError(__(
                key: 'Error creating :resource.',
                replace:['resource' => __('Reason of opening case')]
            ));

            return redirect()->route('reason_opening_case.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  ReasonOpeningCase  $reason_opening_case
     * @return Response
     */
    public function show(ReasonOpeningCase $reason_opening_case)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  ReasonOpeningCase  $reason_opening_case
     * @return Response
     */
    public function edit(ReasonOpeningCase $reason_opening_case)
    {
        return view('pages.backend.reason_opening_cases.create_edit', [
            'reason_opening_case' => $reason_opening_case,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdatePurposeOfVisitRequest  $request
     * @param  ReasonOpeningCase  $reason_opening_case
     * @return Response
     */
    public function update(UpdateReasonOpeningCaseRequest $request, ReasonOpeningCase $reason_opening_case)
    {
        try {
            $reason_opening_case->update([
                'name' => $request->name,
            ]);
            Noty::addSuccess(__(
                key: ':resource updated',
                replace:['resource' => __('Reason of opening case')]
            ));

            return redirect()->route('reason_opening_case.index');
        } catch (\Throwable $e) {
            Noty::addError(__(
                key: 'Error updating :resource.',
                replace:['resource' => __('Reason of opening case')]
            ));

            return redirect()->route('reason_opening_case.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  ReasonOpeningCase  $reason_opening_case
     * @return Response
     */
    public function destroy(ReasonOpeningCase $reason_opening_case)
    {
        try {
            $reason_opening_case->forceDelete();
            Noty::addSuccess(__(
                key: ':resource deleted',
                replace:['resource' => __('Reason of opening case')]
            ));

            return redirect()->route('reason_opening_case.index');
        } catch (\Throwable $th) {
            Noty::addError(__(
                key: 'Error deleting :resource.',
                replace:['resource' => __('Reason of opening case')]
            ));

            return redirect()->route('reason_opening_case.index');
        }
    }
}
