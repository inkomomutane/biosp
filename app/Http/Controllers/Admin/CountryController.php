<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Country\StoreCountryRequest;
use App\Http\Requests\Country\UpdateCountryRequest;
use App\Models\Country;
use Flasher\Noty\Laravel\Facade\Noty;
use Illuminate\Http\Response;

class CountryController extends Controller
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
        $countries = Country::latest()->paginate(5);

        return view('pages.backend.countries.index')
        ->with('countries', $countries);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function trashedCountries()
    {
        $countries = Country::onlyTrashed()->latest()->paginate(5);

        return view('pages.backend.countries.index')
        ->with('countries', $countries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('pages.backend.countries.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreCountryRequest  $request
     * @return Response
     */
    public function store(StoreCountryRequest $request)
    {
        try {
            Country::create(['name' => $request->name]);

            Noty::addSuccess(__(
                key: ':resource created',
                replace:[ 'resource' => 'Country']
            ));

            return redirect()->route('country.index');
        } catch (\Throwable $th) {
            // throw $th;
            Noty::addError(__('Error creating country.'));

            return redirect()->route('country.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Country  $country
     * @return Response
     */
    public function show(Country $country)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Country  $country
     * @return Response
     */
    public function edit(Country $country)
    {
        return view('pages.backend.countries.create_edit', [
            'country' => $country,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateCountryRequest  $request
     * @param  Country  $country
     * @return Response
     */
    public function update(UpdateCountryRequest $request, Country $country)
    {
        try {
            $country->update([
                'name' => $request->name,
            ]);
            Noty::addSuccess(__(
                key: ':resource updated',
                replace:[ 'resource' => 'Country']
            ));

            return redirect()->route('country.index');
        } catch (\Throwable $e) {
            // throw $e;
            Noty::addError('Error updating country.');

            return redirect()->route('country.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Country  $country
     * @return Response
     */
    public function destroy(Country $country)
    {
        try {
            $country->delete();
            Noty::addSuccess('Country deleted.');

            return redirect()->route('country.index');
        } catch (\Throwable $th) {
            Noty::addError('Error deleting country.');

            return redirect()->route('country.index');
        }
    }

    public function destroyForced(string $country)
    {
        try {
            Country::withTrashed()->where('uuid', $country)->first()->forceDelete();
            Noty::addSuccess('Country deleted.');

            return redirect()->route('country.trash');
        } catch (\Throwable $th) {
            Noty::addError('Error deleting country.');

            return redirect()->route('country.trash');
        }
    }

    public function restore(string $country)
    {
        try {
            Country::onlyTrashed()->where('uuid', $country)->first()->restore();
            Noty::addSuccess('Country deleted.');

            return redirect()->route('country.trash');
        } catch (\Throwable $th) {
            Noty::addError('Error deleting country.');

            return redirect()->route('country.trash');
        }
    }
}
