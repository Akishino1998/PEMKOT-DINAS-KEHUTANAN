<?php

namespace App\Http\Controllers\Master;

use App\Http\Requests\CreateRefJabatanRequest;
use App\Http\Requests\UpdateRefJabatanRequest;
use App\Repositories\RefJabatanRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\RefDinasJenis;
use Illuminate\Http\Request;
use Flash;
use Response;

class RefJabatanController extends AppBaseController
{
    /** @var RefJabatanRepository $refJabatanRepository*/
    private $refJabatanRepository;

    public function __construct(RefJabatanRepository $refJabatanRepo)
    {
        $this->refJabatanRepository = $refJabatanRepo;
    }

    /**
     * Display a listing of the RefJabatan.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $jabatan = $this->refJabatanRepository->all();

        return view('master.jabatan.index')
            ->with('jabatan', $jabatan);
    }

    /**
     * Show the form for creating a new RefJabatan.
     *
     * @return Response
     */
    public function create()
    {
        $jenisDinas = RefDinasJenis::get();
        return view('master.jabatan.create',compact('jenisDinas'));
    }

    /**
     * Store a newly created RefJabatan in storage.
     *
     * @param CreateRefJabatanRequest $request
     *
     * @return Response
     */
    public function store(CreateRefJabatanRequest $request)
    {
        $input = $request->all();

        $jenisDinas = RefDinasJenis::find($request->jenis_dinas);
        if (empty($jenisDinas)) {
            Flash::error('Jenis Dinas Tidak Diketahui');
            return redirect(route('master.jabatan.index'));
        }
        $refJabatan = $this->refJabatanRepository->create($input);
        $refJabatan->id_jenis_dinas = $request->jenis_dinas;
        $refJabatan->save();
        Flash::success('Ref Jabatan saved successfully.');

        return redirect(route('master.jabatan.index'));
    }

    /**
     * Display the specified RefJabatan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $refJabatan = $this->refJabatanRepository->find($id);

        if (empty($refJabatan)) {
            Flash::error('Ref Jabatan not found');

            return redirect(route('master.jabatan.index'));
        }

        return view('master.jabatan.show')->with('refJabatan', $refJabatan);
    }

    /**
     * Show the form for editing the specified RefJabatan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $refJabatan = $this->refJabatanRepository->find($id);
        $jenisDinas = RefDinasJenis::get();
        if (empty($refJabatan)) {
            Flash::error('Ref Jabatan not found');
            return redirect(route('master.jabatan.index'));
        }

        return view('master.jabatan.edit',compact('jenisDinas'))->with('refJabatan', $refJabatan);
    }

    /**
     * Update the specified RefJabatan in storage.
     *
     * @param int $id
     * @param UpdateRefJabatanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRefJabatanRequest $request)
    {
        $refJabatan = $this->refJabatanRepository->find($id);

        if (empty($refJabatan)) {
            Flash::error('Ref Jabatan not found');

            return redirect(route('master.jabatan.index'));
        }
        $jenisDinas = RefDinasJenis::find($request->jenis_dinas);
        if (empty($jenisDinas)) {
            Flash::error('Jenis Dinas Tidak Diketahui');
            return redirect(route('master.jabatan.index'));
        }

        $refJabatan = $this->refJabatanRepository->update($request->all(), $id);
        $refJabatan->id_jenis_dinas = $request->jenis_dinas;
        $refJabatan->save();
        Flash::success('Ref Jabatan updated successfully.');

        return redirect(route('master.jabatan.index'));
    }

    /**
     * Remove the specified RefJabatan from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $refJabatan = $this->refJabatanRepository->find($id);

        if (empty($refJabatan)) {
            Flash::error('Ref Jabatan not found');

            return redirect(route('master.jabatan.index'));
        }

        $this->refJabatanRepository->delete($id);

        Flash::success('Ref Jabatan deleted successfully.');

        return redirect(route('master.jabatan.index'));
    }
}
