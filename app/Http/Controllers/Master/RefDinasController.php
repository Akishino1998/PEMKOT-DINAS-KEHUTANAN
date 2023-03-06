<?php

namespace App\Http\Controllers\Master;

use App\Http\Requests\CreateRefDinasRequest;
use App\Http\Requests\UpdateRefDinasRequest;
use App\Repositories\RefDinasRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\RefDinasJenis;
use Illuminate\Http\Request;
use Flash;
use Response;

class RefDinasController extends AppBaseController
{
    /** @var RefDinasRepository $refDinasRepository*/
    private $refDinasRepository;

    public function __construct(RefDinasRepository $refDinasRepo)
    {
        $this->refDinasRepository = $refDinasRepo;
    }

    /**
     * Display a listing of the RefDinas.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $refDinas = $this->refDinasRepository->all();

        return view('master.dinas.index')
            ->with('refDinas', $refDinas);
    }

    /**
     * Show the form for creating a new RefDinas.
     *
     * @return Response
     */
    public function create()
    {
        $jenisDinas = RefDinasJenis::get();
        return view('master.dinas.create',compact('jenisDinas'));
    }

    /**
     * Store a newly created RefDinas in storage.
     *
     * @param CreateRefDinasRequest $request
     *
     * @return Response
     */
    public function store(CreateRefDinasRequest $request)
    {
        $input = $request->all();

        
        $jenisDinas = RefDinasJenis::find($request->jenis_dinas);
        if (empty($jenisDinas)) {
            Flash::error('Jenis Dinas Tidak Diketahui');
            return redirect(route('master.jabatan.index'));
        }
        $refDinas = $this->refDinasRepository->create($input);
        $refDinas->id_jenis_dinas = $request->jenis_dinas;
        $refDinas->save();
        Flash::success('Ref Dinas saved successfully.');

        return redirect(route('master.dinas.index'));
    }

    /**
     * Display the specified RefDinas.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $refDinas = $this->refDinasRepository->find($id);

        if (empty($refDinas)) {
            Flash::error('Ref Dinas not found');

            return redirect(route('master.dinas.index'));
        }
        return view('master.dinas.show')->with('refDinas', $refDinas);
    }

    /**
     * Show the form for editing the specified RefDinas.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $refDinas = $this->refDinasRepository->find($id);

        if (empty($refDinas)) {
            Flash::error('Ref Dinas not found');

            return redirect(route('master.dinas.index'));
        }
        $jenisDinas = RefDinasJenis::get();
        return view('master.dinas.edit',compact('jenisDinas'))->with('refDinas', $refDinas);
    }

    /**
     * Update the specified RefDinas in storage.
     *
     * @param int $id
     * @param UpdateRefDinasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRefDinasRequest $request)
    {
        $refDinas = $this->refDinasRepository->find($id);

        if (empty($refDinas)) {
            Flash::error('Ref Dinas not found');

            return redirect(route('master.dinas.index'));
        }
        $jenisDinas = RefDinasJenis::find($request->jenis_dinas);
        if (empty($jenisDinas)) {
            Flash::error('Jenis Dinas Tidak Diketahui');
            return redirect(route('master.jabatan.index'));
        }
        $refDinas = $this->refDinasRepository->update($request->all(), $id);
       
        $refDinas->id_jenis_dinas = $request->jenis_dinas;
        $refDinas->save();
        Flash::success('Ref Dinas updated successfully.');

        return redirect(route('master.dinas.index'));
    }

    /**
     * Remove the specified RefDinas from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $refDinas = $this->refDinasRepository->find($id);

        if (empty($refDinas)) {
            Flash::error('Ref Dinas not found');

            return redirect(route('master.dinas.index'));
        }

        $this->refDinasRepository->delete($id);

        Flash::success('Ref Dinas deleted successfully.');

        return redirect(route('master.dinas.index'));
    }
    function TTD($id){
        $refDinas = $this->refDinasRepository->find($id);
        if (empty($refDinas)) {
            Flash::error('Ref Dinas not found');
            return redirect(route('master.dinas.index'));
        }
        return view('master.dinas.ttd.ttd',compact('refDinas'));
    }
}
