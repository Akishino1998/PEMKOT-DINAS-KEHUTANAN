<?php
namespace App\Http\Controllers\Master;

use App\Http\Requests\CreateRefDinasJenisRequest;
use App\Http\Requests\UpdateRefDinasJenisRequest;
use App\Repositories\RefDinasJenisRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class RefDinasJenisController extends AppBaseController
{
    /** @var RefDinasJenisRepository $refDinasJenisRepository*/
    private $refDinasJenisRepository;

    public function __construct(RefDinasJenisRepository $refDinasJenisRepo)
    {
        $this->refDinasJenisRepository = $refDinasJenisRepo;
    }

    /**
     * Display a listing of the RefDinasJenis.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $refDinasJenis = $this->refDinasJenisRepository->all();

        return view('master.jenis-dinas.index')
            ->with('refDinasJenis', $refDinasJenis);
    }

    /**
     * Show the form for creating a new RefDinasJenis.
     *
     * @return Response
     */
    public function create()
    {
        return view('master.jenis-dinas.create');
    }

    /**
     * Store a newly created RefDinasJenis in storage.
     *
     * @param CreateRefDinasJenisRequest $request
     *
     * @return Response
     */
    public function store(CreateRefDinasJenisRequest $request)
    {
        $input = $request->all();

        $refDinasJenis = $this->refDinasJenisRepository->create($input);

        Flash::success('Ref Dinas Jenis saved successfully.');

        return redirect(route('master.jenis-dinas.index'));
    }

    /**
     * Display the specified RefDinasJenis.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $refDinasJenis = $this->refDinasJenisRepository->find($id);

        if (empty($refDinasJenis)) {
            Flash::error('Ref Dinas Jenis not found');

            return redirect(route('master.jenis-dinas.index'));
        }

        return view('master.jenis-dinas.show')->with('refDinasJenis', $refDinasJenis);
    }

    /**
     * Show the form for editing the specified RefDinasJenis.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $refDinasJenis = $this->refDinasJenisRepository->find($id);

        if (empty($refDinasJenis)) {
            Flash::error('Ref Dinas Jenis not found');

            return redirect(route('master.jenis-dinas.index'));
        }

        return view('master.jenis-dinas.edit')->with('refDinasJenis', $refDinasJenis);
    }

    /**
     * Update the specified RefDinasJenis in storage.
     *
     * @param int $id
     * @param UpdateRefDinasJenisRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRefDinasJenisRequest $request)
    {
        $refDinasJenis = $this->refDinasJenisRepository->find($id);

        if (empty($refDinasJenis)) {
            Flash::error('Ref Dinas Jenis not found');

            return redirect(route('master.jenis-dinas.index'));
        }

        $refDinasJenis = $this->refDinasJenisRepository->update($request->all(), $id);

        Flash::success('Ref Dinas Jenis updated successfully.');

        return redirect(route('master.jenis-dinas.index'));
    }

    /**
     * Remove the specified RefDinasJenis from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $refDinasJenis = $this->refDinasJenisRepository->find($id);

        if (empty($refDinasJenis)) {
            Flash::error('Ref Dinas Jenis not found');

            return redirect(route('master.jenis-dinas.index'));
        }

        $this->refDinasJenisRepository->delete($id);

        Flash::success('Ref Dinas Jenis deleted successfully.');

        return redirect(route('master.jenis-dinas.index'));
    }
}
