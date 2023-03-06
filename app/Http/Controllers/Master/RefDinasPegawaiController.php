<?php

namespace App\Http\Controllers\Master;

use App\Http\Requests\CreateRefDinasPegawaiRequest;
use App\Http\Requests\UpdateRefDinasPegawaiRequest;
use App\Repositories\RefDinasPegawaiRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\AuthRole;
use App\Models\RefDinas;
use App\Models\RefDinasJenis;
use App\Models\RefJabatan;
use App\Models\User;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Hash;
use Response;

class RefDinasPegawaiController extends AppBaseController
{
    /** @var RefDinasPegawaiRepository $refDinasPegawaiRepository*/
    private $refDinasPegawaiRepository;

    public function __construct(RefDinasPegawaiRepository $refDinasPegawaiRepo)
    {
        $this->refDinasPegawaiRepository = $refDinasPegawaiRepo;
    }

    /**
     * Display a listing of the RefDinasPegawai.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $refDinasPegawais = $this->refDinasPegawaiRepository->all();

        return view('master.pegawai.index')
            ->with('refDinasPegawais', $refDinasPegawais);
    }

    /**
     * Show the form for creating a new RefDinasPegawai.
     *
     * @return Response
     */
    public function create()
    {
        $role = AuthRole::whereIn('id',[2,3,4,5])->get();
        if (auth()->user()->role == 1) {
            $dinas = RefDinas::get();
            $jabatan = RefJabatan::get();
        }else{
            $dinas = RefDinas::where('id',auth()->user()->dinas)->get();
            $refDinas = RefDinas::find(auth()->user()->dinas);
            $jabatan = RefJabatan::where('id_jenis_dinas',$refDinas->id_jenis_dinas)->get();
        }
        return view('master.pegawai.create',compact('dinas','jabatan','role'));
    }

    /**
     * Store a newly created RefDinasPegawai in storage.
     *
     * @param CreateRefDinasPegawaiRequest $request
     *
     * @return Response
     */
    public function store(CreateRefDinasPegawaiRequest $request)
    {
        $input = $request->all();

        $jenisDinas = RefDinasJenis::find($request->dinas);
        if (empty($jenisDinas)) {
            Flash::error('Jenis Dinas Tidak Diketahui');
            return redirect(route('master.pegawai.index'));
        }
        $jabatan = RefJabatan::find($request->jabatan);
        if (empty($jabatan)) {
            Flash::error('Jabatan Tidak Diketahui');
            return redirect(route('master.pegawai.index'));
        }

        $refDinasPegawai = $this->refDinasPegawaiRepository->create($input);
        $refDinasPegawai->id_dinas = $request->dinas;
        $refDinasPegawai->id_jabatan = $request->jabatan;
        $refDinasPegawai->save();
        if ($request->email != null and $request->role != null and $request->password != null) {
            $user = new User;
            $user->name = $request->nama;
            $user->email = $request->email;
            $user->dinas = $refDinasPegawai->id_dinas;
            $user->jabatan = $refDinasPegawai->id_jabatan;
            $user->role = $request->role;
            $user->password = Hash::make($request->password);
            $user->save();
            $refDinasPegawai->id_user = $user->id;
            $refDinasPegawai->save();
        }
       
        Flash::success('Ref Dinas Pegawai saved successfully.');

        return redirect(route('master.pegawai.index'));
    }

    /**
     * Display the specified RefDinasPegawai.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $refDinasPegawai = $this->refDinasPegawaiRepository->find($id);

        if (empty($refDinasPegawai)) {
            Flash::error('Ref Dinas Pegawai not found');

            return redirect(route('master.pegawai.index'));
        }

        return view('master.pegawai.show')->with('refDinasPegawai', $refDinasPegawai);
    }

    /**
     * Show the form for editing the specified RefDinasPegawai.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $refDinasPegawai = $this->refDinasPegawaiRepository->find($id);

        if (empty($refDinasPegawai)) {
            Flash::error('Ref Dinas Pegawai not found');
            return redirect(route('master.pegawai.index'));
        }
        $role = AuthRole::get();
        if (auth()->user()->role == 1) {
            $dinas = RefDinas::get();
            $jabatan = RefJabatan::get();
        }else{
            $dinas = RefDinas::where('id',auth()->user()->dinas)->get();
            $jabatan = RefJabatan::get();
        }
        return view('master.pegawai.edit',compact('dinas','jabatan','role'))->with('refDinasPegawai', $refDinasPegawai);
    }

    /**
     * Update the specified RefDinasPegawai in storage.
     *
     * @param int $id
     * @param UpdateRefDinasPegawaiRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRefDinasPegawaiRequest $request)
    {
        $refDinasPegawai = $this->refDinasPegawaiRepository->find($id);

        if (empty($refDinasPegawai)) {
            Flash::error('Ref Dinas Pegawai not found');

            return redirect(route('master.pegawai.index'));
        }
        $jenisDinas = RefDinasJenis::find($request->dinas);
        if (empty($jenisDinas)) {
            Flash::error('Jenis Dinas Tidak Diketahui');
            return redirect(route('master.pegawai.index'));
        }
        $jabatan = RefJabatan::find($request->jabatan);
        if (empty($jabatan)) {
            Flash::error('Jabatan Tidak Diketahui');
            return redirect(route('master.pegawai.index'));
        }
        $refDinasPegawai = $this->refDinasPegawaiRepository->update($request->all(), $id);
        $refDinasPegawai->id_dinas = $request->dinas;
        $refDinasPegawai->id_jabatan = $request->jabatan;
        if ($refDinasPegawai->id_user != null) {
            // Udah Punya Akun
            $user = User::find($refDinasPegawai->id_user);
            $user->name = $refDinasPegawai->nama;
            $user->dinas = $refDinasPegawai->id_dinas;
            $user->jabatan = $refDinasPegawai->id_jabatan;
            if (isset($request->non_aktif)) {
                $user->non_aktif = NOW();
            }else{
                $user->non_aktif = null;
                $user->role = $request->role;
            }
            $user->save();
        }else{

        }

        Flash::success('Ref Dinas Pegawai updated successfully.');

        return redirect(route('master.pegawai.index'));
    }

    /**
     * Remove the specified RefDinasPegawai from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $refDinasPegawai = $this->refDinasPegawaiRepository->find($id);

        if (empty($refDinasPegawai)) {
            Flash::error('Ref Dinas Pegawai not found');

            return redirect(route('master.pegawai.index'));
        }

        $this->refDinasPegawaiRepository->delete($id);

        Flash::success('Ref Dinas Pegawai deleted successfully.');

        return redirect(route('master.pegawai.index'));
    }
    function akun($id){
        $refDinasPegawai = $this->refDinasPegawaiRepository->find($id);

        if (empty($refDinasPegawai)) {
            Flash::error('Ref Dinas Pegawai not found');
            return redirect(route('master.pegawai.index'));
        }
        $role = AuthRole::get();
        return view('master.pegawai.akun',compact('refDinasPegawai','role'));
    }
    function createAkun(Request $request, $id){
        $refDinasPegawai = $this->refDinasPegawaiRepository->find($id);
        if (empty($refDinasPegawai)) {
            Flash::error('Ref Dinas Pegawai not found');
            return redirect(route('master.pegawai.index'));
        }
        $user = new User;
        $user->name = $refDinasPegawai->nama;
        $user->dinas = $refDinasPegawai->id_dinas;
        $user->jabatan = $refDinasPegawai->id_jabatan;
        $user->role = $request->role;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        $refDinasPegawai->id_user = $user->id;
        $refDinasPegawai->save();
        Flash::success('Ref Dinas Pegawai saved successfully.');
        return redirect(route('master.pegawai.index'));
    }
}
