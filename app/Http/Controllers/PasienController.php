<?php

namespace App\Http\Controllers;

use App\Enums\StatusCodes;
use App\Models\Pasien;
use Illuminate\Http\Request;
use Kreait\Firebase\Messaging;

class PasienController extends CrudController
{
    private $model;

    public function __construct(Messaging $messaging)
    {
        $this->model = new Pasien;
        parent::__construct($this->model);
        $this->messaging = $messaging;
        $this->createRules = [
            'nama' => 'required|max:50',
            'nik' => 'required|unique:pasien',
            'alamat' => 'required',
            'foto' => 'required'
        ];
        $this->updateRules = [
            'nama' => 'max:50',
            'nik' => 'unique:pasien'
        ];
    }

    public function getByNik(Request $request, $nik)
    {
        $model = $this->model;
        if ($request->join !== null && $request->join !== '') {
            $join = strtolower($request->join);
            $words = explode(",", $join);
            $model = $model->with($words);
        }

        $result = $model->where("nik", $nik)->firstOrFail();

        return response()->json($result);
    }

    /**
     * Update an object using the id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateByNik(Request $request, $nik)
    {
        if ($this->updateRules != null) $this->validate($request, $this->updateRules);

        $result = $this->model::where("nik", $nik)->firstOrFail()->fill($request->all());
        $result->save();

        return response()->json(null, StatusCodes::NoContent);
    }

    /**
     * Delete an object using the id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($nik)
    {
        $object = $this->model::where("nik", $nik)->firstOrFail();
        $object->delete();

        return response()->json(null, StatusCodes::NoContent);
    }
}
