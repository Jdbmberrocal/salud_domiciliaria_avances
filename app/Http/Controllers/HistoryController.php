<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHistoryRequest;
use App\Http\Requests\UpdateHistoryRequest;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $clinicHistories = History::with('patient','professional')->get();
            return response()->json([
                'clinic_histories' => $clinicHistories,
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
    public function store(StoreHistoryRequest $request)
    {
        try {
            $clinicHistory = new History();
            // $clinicHistory->fill($request->all());
            $clinicHistory->patient_id = $request->patient_id;
            $clinicHistory->professional_id = Auth::user()->id;
            $clinicHistory->weight = $request->weight;
            $clinicHistory->size = $request->size;
            $clinicHistory->pulse = $request->pulse;
            $clinicHistory->temperature = $request->temperature;
            $clinicHistory->blood_pressure = $request->blood_pressure;
            $clinicHistory->general_state = $request->general_state;
            $clinicHistory->date_time = $request->date_time;
            $clinicHistory->antecedent = $request->antecedent;
            $clinicHistory->professional_concept = $request->professional_concept;
            $clinicHistory->recommendations = $request->recommendations;
            $clinicHistory->state = $request->state;
            // $clinicHistory->state = true; // Assuming state is true by default
            $clinicHistory->save();
            return response()->json([
                'clinic_history' => $clinicHistory,
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
            $clinicHistory = History::findOrFail($id);
            return response()->json([
                'clinic_history' => $clinicHistory,
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
    public function update(UpdateHistoryRequest $request, string $id)
    {
        try {
            $clinicHistory = History::findOrFail($id);
            $clinicHistory->patient_id = $request->patient_id;
            $clinicHistory->professional_id = $request->professional_id;
            $clinicHistory->weight = $request->weight;
            $clinicHistory->size = $request->size;
            $clinicHistory->pulse = $request->pulse;
            $clinicHistory->temperature = $request->temperature;
            $clinicHistory->blood_pressure = $request->blood_pressure;
            $clinicHistory->general_state = $request->general_state;
            $clinicHistory->date_time = $request->date_time;
            $clinicHistory->antecedent = $request->antecedent;
            $clinicHistory->professional_concept = $request->professional_concept;
            $clinicHistory->recommendations = $request->recommendations;
            $clinicHistory->state = $request->state;
            $clinicHistory->save();
            return response()->json([
                'clinic_history' => $clinicHistory,
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
            $clinicHistory = History::findOrFail($id);
            $clinicHistory->delete();
            return response()->json([
                'message' => "Clinic history deleted successfully",
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
