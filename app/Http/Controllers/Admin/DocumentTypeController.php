<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DocumentType\StoreDocumentTypeRequest;
use App\Http\Requests\DocumentType\UpdateDocumentTypeRequest;
use App\Models\DocumentType;
use Flasher\Noty\Laravel\Facade\Noty;
use Illuminate\Http\Response;

class DocumentTypeController extends Controller
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
        $document_types = DocumentType::latest()->paginate(5);

        return view('pages.backend.document_types.index')
            ->with('document_types', $document_types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('pages.backend.document_types.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreDocumentTypeRequest  $request
     * @return Response
     */
    public function store(StoreDocumentTypeRequest $request)
    {
        try {
            DocumentType::create(['name' => $request->name]);

            Noty::addSuccess(__(
                key: ':resource created',
                replace:['resource' => __('Document type')]
            ));

            return redirect()->route('document_type.index');
        } catch (\Throwable $th) {
            Noty::addError(__(
                key: 'Error creating :resource.',
                replace:['resource' => __('Document type')]
            ));

            return redirect()->route('document_type.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  DocumentType  $document_type
     * @return Response
     */
    public function show(DocumentType $document_type)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  DocumentType  $document_type
     * @return Response
     */
    public function edit(DocumentType $document_type)
    {
        return view('pages.backend.document_types.create_edit', [
            'document_type' => $document_type,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateDocumentTypeRequest  $request
     * @param  DocumentType  $document_type
     * @return Response
     */
    public function update(UpdateDocumentTypeRequest $request, DocumentType $document_type)
    {
        try {
            $document_type->update([
                'name' => $request->name,
            ]);
            Noty::addSuccess(__(
                key: ':resource updated',
                replace:['resource' => __('Document type')]
            ));

            return redirect()->route('document_type.index');
        } catch (\Throwable $e) {
            Noty::addError(__(
                key: 'Error updating :resource.',
                replace:['resource' => __('Document type')]
            ));

            return redirect()->route('document_type.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DocumentType  $document_type
     * @return Response
     */
    public function destroy(DocumentType $document_type)
    {
        try {
            $document_type->forceDelete();
            Noty::addSuccess(__(
                key: ':resource deleted',
                replace:['resource' => __('Document type')]
            ));

            return redirect()->route('document_type.index');
        } catch (\Throwable $th) {
            Noty::addError(__(
                key: 'Error deleting :resource.',
                replace:['resource' => __('Document type')]
            ));

            return redirect()->route('document_type.index');
        }
    }
}
