<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEvolutionRequest;
use App\Models\Evolution;
use Illuminate\Http\Request;

class EvolutionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id_history_clinic)
    {
        try {
            $clinicEvolutions = Evolution::where('clinic_history_id',$id_history_clinic)->with('clinic_history')->get();
            return response()->json([
                'clinic_evolutions' => $clinicEvolutions,
                'status' => true
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
                'status' => false
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEvolutionRequest $request)
    {
        try {
            $clinicEvolution = new Evolution();
            // $clinicEvolution->fill($request->all());
            $clinicEvolution->clinic_history_id = $request->clinic_history_id;
            $clinicEvolution->patient_information = $request->patient_information;
            $clinicEvolution->medical_concept = $request->medical_concept;
            $clinicEvolution->principal_diagnostic = $request->principal_diagnostic;
            $clinicEvolution->related_diagnosis = $request->related_diagnosis;
            $clinicEvolution->type_diagnosis = $request->type_diagnosis;
            $clinicEvolution->forecast = $request->forecast;
            $clinicEvolution->exit = $request->exit;
            $clinicEvolution->date_hours = $request->date_hours;
            $clinicEvolution->save();
            return response()->json([
                'clinic_evolution' => $clinicEvolution,
                'status' => true
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
                'status' => false
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $clinicEvolution = Evolution::findOrFail($id);
            return response()->json([
                'clinic_evolution' => $clinicEvolution,
                'status' => true
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
                'status' => false
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $clinicEvolution = Evolution::findOrFail($id);
            $clinicEvolution->clinic_history_id = $request->clinic_history_id;
            $clinicEvolution->patient_information = $request->patient_information;
            $clinicEvolution->medical_concept = $request->medical_concept;
            $clinicEvolution->principal_diagnostic = $request->principal_diagnostic;
            $clinicEvolution->related_diagnosis = $request->related_diagnosis;
            $clinicEvolution->type_diagnosis = $request->type_diagnosis;
            $clinicEvolution->forecast = $request->forecast;
            $clinicEvolution->exit = $request->exit;
            $clinicEvolution->date_hours = $request->date_hours;
            $clinicEvolution->save();
            return response()->json([
                'clinic_evolution' => $clinicEvolution,
                'status' => true
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
                'status' => false
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $clinicEvolution = Evolution::findOrFail($id);
            $clinicEvolution->delete();
            return response()->json([
                'message' => "Clinic evolution deleted successfully",
                'status' => true
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
                'status' => false
            ]);
        }
    }
}
