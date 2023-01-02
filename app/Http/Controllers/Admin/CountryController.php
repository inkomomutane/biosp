<?php

namespace App\Http\Controllers\Admin;

use App\Models\Country;
use App\Http\Controllers\Controller;
use App\Http\Requests\Country\StoreCountryRequest;
use App\Http\Requests\Country\UpdateCountryRequest;

class CountryController extends Controller
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
        $countries = Country::latest()->paginate(5);
        return view('pages.backend.countries.index')
        ->with('countries', $countries);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.backend.countries.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCountryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCountryRequest $request)
    {
        try {

            Country::create(['name' => $request->name]);

            //  $this->flash()->addSuccess(__('Country created.'));
            return redirect()->route('country.index');
        } catch (\Throwable $th) {
            // throw $th;
          //  $this->flash()->addError(__('Error creating country.'));
            return redirect()->route('country.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        return view('pages.backend.countries.create_edit',[
            'country' => $country
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCountryRequest  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCountryRequest $request, Country $country)
    {
        try {
            $country->update([
                'name' => $request->name
            ]);
            //  $this->flash()->addSuccess('Country updated.');
            return redirect()->route('country.index');
        } catch (\Throwable $e) {
            // throw $e;
          //  $this->flash()->addError('Error updating country.');
            return redirect()->route('country.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        try {
            $country->delete();
            //  $this->flash()->addSuccess('Country deleted.');
            return redirect()->route('country.index');
        } catch (\Throwable $th) {
          //  $this->flash()->addError('Error deleting country.');
            return redirect()->route('country.index');
        }
    }


    public function destroyForced(String $country)
    {
        try {
            Country::withTrashed()->where('uuid',$country)->first()->forceDelete();
            //  $this->flash()->addSuccess('Country deleted.');
            return redirect()->route('country.trash');
        } catch (\Throwable $th) {
          //  $this->flash()->addError('Error deleting country.');
            return redirect()->route('country.trash');
        }
    }

    public function restore(String $country)
    {
        try {
            Country::onlyTrashed()->where('uuid',$country)->first()->restore();
            //  $this->flash()->addSuccess('Country deleted.');
            return redirect()->route('country.trash');
        } catch (\Throwable $th) {
          //  $this->flash()->addError('Error deleting country.');
            return redirect()->route('country.trash');
        }
    }
}
