<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForwardedService\StoreForwardedServiceRequest;
use App\Http\Requests\ForwardedService\UpdateForwardedServiceRequest;
use App\Models\ForwardedService;
use Flasher\Noty\Laravel\Facade\Noty;
use Illuminate\Http\Response;

class ForwardedServiceController extends Controller
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
        $forwarded_services = ForwardedService::latest()->paginate(5);

        return view('pages.backend.forwarded_services.index')
            ->with('forwarded_services', $forwarded_services);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('pages.backend.forwarded_services.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreForwardedServiceRequest  $request
     * @return Response
     */
    public function store(StoreForwardedServiceRequest $request)
    {
        try {
            ForwardedService::create(['name' => $request->name]);

            Noty::addSuccess(__(
                key: ':resource created',
                replace:['resource' => __('Forwarded service')]
            ));

            return redirect()->route('forwarded_service.index');
        } catch (\Throwable $th) {
            Noty::addError(__(
                key: 'Error creating :resource.',
                replace:['resource' => __('Forwarded service')]
            ));

            return redirect()->route('forwarded_service.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  ForwardedService  $forwarded_service
     * @return Response
     */
    public function show(ForwardedService $forwarded_service)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  ForwardedService  $forwarded_service
     * @return Response
     */
    public function edit(ForwardedService $forwarded_service)
    {
        return view('pages.backend.forwarded_services.create_edit', [
            'forwarded_service' => $forwarded_service,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateForwardedServiceRequest  $request
     * @param  ForwardedService  $forwarded_service
     * @return Response
     */
    public function update(UpdateForwardedServiceRequest $request, ForwardedService $forwarded_service)
    {
        try {
            $forwarded_service->update([
                'name' => $request->name,
            ]);
            Noty::addSuccess(__(
                key: ':resource updated',
                replace:['resource' => __('Forwarded service')]
            ));

            return redirect()->route('forwarded_service.index');
        } catch (\Throwable $e) {
            Noty::addError(__(
                key: 'Error updating :resource.',
                replace:['resource' => __('Forwarded service')]
            ));

            return redirect()->route('forwarded_service.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  ForwardedService  $forwarded_service
     * @return Response
     */
    public function destroy(ForwardedService $forwarded_service)
    {
        try {
            $forwarded_service->forceDelete();
            Noty::addSuccess(__(
                key: ':resource deleted',
                replace:['resource' => __('Forwarded service')]
            ));

            return redirect()->route('forwarded_service.index');
        } catch (\Throwable $th) {
            Noty::addError(__(
                key: 'Error deleting :resource.',
                replace:['resource' => __('Forwarded service')]
            ));

            return redirect()->route('forwarded_service.index');
        }
    }
}
