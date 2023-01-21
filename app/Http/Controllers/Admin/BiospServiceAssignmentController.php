<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Biosp\BiospAssignServiceRequest;
use App\Models\Biosp;
use Flasher\Noty\Laravel\Facade\Noty;
use Illuminate\Http\RedirectResponse;

class BiospServiceAssignmentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','role:super-admin']);
    }

    /**
     * @param Biosp $biosp
     * @param BiospAssignServiceRequest $biospAssignServiceRequest
     * @return RedirectResponse|null
     */
    public function genres(Biosp $biosp, BiospAssignServiceRequest $biospAssignServiceRequest): ?RedirectResponse
    {
        try {
            $biosp->genres()->sync($biospAssignServiceRequest->services);
            Noty::addSuccess(__(
                key: ':resource assigned successful.',
                replace: ['resource' => __('Genres')]
            ));
            return redirect()->back(302);
        } catch (Exception $exception) {
            Noty::addError(__(
                key: 'Error assigning :resource.',
                replace: ['resource' => __('Genres')]
            ));
            return redirect()->back(302);
        }
    }

    public function documentTypes(Biosp $biosp, BiospAssignServiceRequest $biospAssignServiceRequest): ?RedirectResponse
    {
        try {
            $biosp->documentTypes()->sync($biospAssignServiceRequest->services);
            Noty::addSuccess(__(
                key: ':resource assigned successful.',
                replace: ['resource' => __('Document types')]
            ));
            return redirect()->back(302);
        } catch (Exception $exception) {
            Noty::addError(__(
                key: 'Error assigning :resource.',
                replace: ['resource' => __('Document types')]
            ));
            return redirect()->back(302);
        }
    }

    public function forwardedServices(Biosp $biosp, BiospAssignServiceRequest $biospAssignServiceRequest): ?RedirectResponse
    {
        try {
            $biosp->forwardedServices()->sync($biospAssignServiceRequest->services);
            Noty::addSuccess(__(
                key: ':resource assigned successful.',
                replace: ['resource' => __('Forwarded services')]
            ));
            return redirect()->back(302);
        } catch (Exception $exception) {
            Noty::addError(__(
                key: 'Error assigning :resource.',
                replace: ['resource' => __('Forwarded services')]
            ));
            return redirect()->back(302);
        }
    }

    public function provenances(Biosp $biosp, BiospAssignServiceRequest $biospAssignServiceRequest): ?RedirectResponse
    {
        try {
            $biosp->provenances()->sync($biospAssignServiceRequest->services);
            Noty::addSuccess(__(
                key: ':resource assigned successful.',
                replace: ['resource' => __('Provenances')]
            ));
            return redirect()->back(302);
        } catch (Exception $exception) {
            Noty::addError(__(
                key: 'Error assigning :resource.',
                replace: ['resource' => __('Provenances')]
            ));
            return redirect()->back(302);
        }
    }

    public function purposeOfVisits(Biosp $biosp, BiospAssignServiceRequest $biospAssignServiceRequest): ?RedirectResponse
    {
        try {
            $biosp->purposeOfVisits()->sync($biospAssignServiceRequest->services);
            Noty::addSuccess(__(
                key: ':resource assigned successful.',
                replace: ['resource' => __('Purposes of visit')]
            ));
            return redirect()->back(302);
        } catch (Exception $exception) {
            Noty::addError(__(
                key: 'Error assigning :resource.',
                replace: ['resource' => __('Purposes of visit')]
            ));
            return redirect()->back(302);
        }
    }

    public function reasonOpeningCases(Biosp $biosp, BiospAssignServiceRequest $biospAssignServiceRequest): ?RedirectResponse
    {
        try {
            $biosp->reasonOpeningCases()->sync($biospAssignServiceRequest->services);
            Noty::addSuccess(__(
                key: ':resource assigned successful.',
                replace: ['resource' => __('Reasons of opening case')]
            ));
            return redirect()->back(302);
        } catch (Exception $exception) {
            Noty::addError(__(
                key: 'Error assigning :resource.',
                replace: ['resource' => __('Reasons of opening case')]
            ));
            return redirect()->back(302);
        }
    }

}
