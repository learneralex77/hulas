<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\ForexRate;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ForexRateRequest;

class ForexRateController extends Controller
{
    /**
     * Display the list of forex rates.
     */
    public function index()
    {
        return view('backend.forex-rates.index', [
            'morningRates' => ForexRate::where('time_slot', 'morning')->get(),
            'afternoonRates' => ForexRate::where('time_slot', 'afternoon')->get(),
        ]);
    }

    public function create()
    {
        // Initialize with empty rate objects for form structure
        $morningRates = collect([new ForexRate(['time_slot' => 'morning'])]);
        $afternoonRates = collect([new ForexRate(['time_slot' => 'afternoon'])]);

        return view('backend.forex-rates.create', compact('morningRates', 'afternoonRates'));
    }

    /**
     * Store new forex rates for morning and afternoon time slots.
     */
    public function store(ForexRateRequest $request)
    {
        // dd($request->all());
        DB::beginTransaction();

        try {
            // Process morning and afternoon rates separately
            $this->storeOrUpdateTimeSlot($request, 'morning');
            $this->storeOrUpdateTimeSlot($request, 'afternoon');

            DB::commit();
            return redirect()->route('forex-rate.index')
                ->with('success', 'Forex rates saved successfully.');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Failed to save forex rates: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing forex rates.
     */
    public function edit()
    {
        return view('forex-rates.edit', [
            'morningRates' => ForexRate::where('time_slot', 'morning')->get(),
            'afternoonRates' => ForexRate::where('time_slot', 'afternoon')->get(),
        ]);
    }

    /**
     * Update existing forex rates for morning and afternoon time slots.
     */
    public function update(ForexRateRequest $request)
    {
        DB::beginTransaction();

        try {
            // Clear existing records for clean updates
            ForexRate::where('time_slot', 'morning')->delete();
            ForexRate::where('time_slot', 'afternoon')->delete();

            // Process morning and afternoon rates separately
            $this->storeOrUpdateTimeSlot($request, 'morning');
            $this->storeOrUpdateTimeSlot($request, 'afternoon');

            DB::commit();
            return redirect()->route('forex-rate.index')
                ->with('success', 'Forex rates updated successfully.');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Failed to update forex rates: ' . $e->getMessage());
        }
    }

    /**
     * Dynamically add a new row in the form via AJAX.
     */
    public function addRow()
    {
        $timeSlot = request()->time_slot;
        $index = request()->index;

        return response()->json([
            'html' => view('backend.forex-rates.partials.rate-fields', [
                'timeSlot' => $timeSlot,
                'index' => $index,
                'rate' => null
            ])->render(),
        ]);
    }


    /**
     * Store or update forex rates for a specific time slot.
     */
    // In storeOrUpdateTimeSlot method
    protected function storeOrUpdateTimeSlot($request, $timeSlot)
    {
        foreach ($request->input("{$timeSlot}_currency") as $key => $currency) {
            ForexRate::create([
                'time_slot' => $timeSlot,
                'date' => $request->input("{$timeSlot}_date")[$key],
                'flag' => $request->input("{$timeSlot}_flag")[$key],
                'currency' => $currency,
                'unit' => $request->input("{$timeSlot}_unit")[$key],
                'buying_rate' => $request->input("{$timeSlot}_buying_rate")[$key],
                'display_order' => $request->input("{$timeSlot}_display_order")[$key] ?? 0,
                'is_published' => $request->input("{$timeSlot}_is_published")[$key],
            ]);
        }
    }

    public function destroyTimeSlot(string $timeSlot)
    {
        DB::beginTransaction();

        try {
            if (!in_array($timeSlot, ['morning', 'afternoon'])) {
                throw new \Exception('Invalid time slot specified');
            }

            ForexRate::where('time_slot', $timeSlot)->delete();
            DB::commit();

            return redirect()->route('forex-rate.index')
                ->with('success', ucfirst($timeSlot) . ' rates deleted successfully');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Deletion failed: ' . $e->getMessage());
        }
    }
}
