<?php

namespace App\Http\Controllers\Master;

use App\Http\Requests\CreateRefJenisSuratRequest;
use App\Http\Requests\UpdateRefJenisSuratRequest;
use App\Repositories\RefJenisSuratRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class RefJenisSuratController extends AppBaseController
{
    /** @var RefJenisSuratRepository $refJenisSuratRepository*/
    private $refJenisSuratRepository;

    public function __construct(RefJenisSuratRepository $refJenisSuratRepo)
    {
        $this->refJenisSuratRepository = $refJenisSuratRepo;
    }

    /**
     * Display a listing of the RefJenisSurat.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $refJenisSurats = $this->refJenisSuratRepository->all();

        return view('master.surat.index')
            ->with('refJenisSurats', $refJenisSurats);
    }

    /**
     * Show the form for creating a new RefJenisSurat.
     *
     * @return Response
     */
    public function create()
    {
        return view('master.surat.create');
    }

    /**
     * Store a newly created RefJenisSurat in storage.
     *
     * @param CreateRefJenisSuratRequest $request
     *
     * @return Response
     */
    public function store(CreateRefJenisSuratRequest $request)
    {
        $input = $request->all();

        $refJenisSurat = $this->refJenisSuratRepository->create($input);

        Flash::success('Ref Jenis Surat saved successfully.');

        return redirect(route('master.surat.index'));
    }

    /**
     * Display the specified RefJenisSurat.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $refJenisSurat = $this->refJenisSuratRepository->find($id);

        if (empty($refJenisSurat)) {
            Flash::error('Ref Jenis Surat not found');

            return redirect(route('master.surat.index'));
        }

        return view('master.surat.show')->with('refJenisSurat', $refJenisSurat);
    }

    /**
     * Show the form for editing the specified RefJenisSurat.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $refJenisSurat = $this->refJenisSuratRepository->find($id);

        if (empty($refJenisSurat)) {
            Flash::error('Ref Jenis Surat not found');

            return redirect(route('master.surat.index'));
        }

        return view('master.surat.edit')->with('refJenisSurat', $refJenisSurat);
    }

    /**
     * Update the specified RefJenisSurat in storage.
     *
     * @param int $id
     * @param UpdateRefJenisSuratRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRefJenisSuratRequest $request)
    {
        $refJenisSurat = $this->refJenisSuratRepository->find($id);

        if (empty($refJenisSurat)) {
            Flash::error('Ref Jenis Surat not found');

            return redirect(route('master.surat.index'));
        }

        $refJenisSurat = $this->refJenisSuratRepository->update($request->all(), $id);

        Flash::success('Ref Jenis Surat updated successfully.');

        return redirect(route('master.surat.index'));
    }

    /**
     * Remove the specified RefJenisSurat from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $refJenisSurat = $this->refJenisSuratRepository->find($id);

        if (empty($refJenisSurat)) {
            Flash::error('Ref Jenis Surat not found');

            return redirect(route('master.surat.index'));
        }

        $this->refJenisSuratRepository->delete($id);

        Flash::success('Ref Jenis Surat deleted successfully.');

        return redirect(route('master.surat.index'));
    }
}
