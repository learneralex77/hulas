<?php

namespace App\Http\Controllers;

use App\Models\ForexRate;
use Illuminate\Http\Request;
use App\Http\Requests\ForexRateRequest;

class ForexRateController extends Controller
{
    public function index()
    {
        // Fetch all forex rates. Laravel will automatically cast 'slots' to an array.
        $forexRates = ForexRate::all();

        return view('backend.forex-rates.index', compact('forexRates'));
    }



    public function create()
    {
        // Empty collections to avoid undefined variable errors in the Blade
        $morningRates = collect();
        $afternoonRates = collect();

        return view('backend.forex-rates.create', compact('morningRates', 'afternoonRates'));
    }


    public function store(ForexRateRequest $request)
    {
        $validated = $request->validated();

        // Prepare morning slots data
        $morningSlots = [];
        if (!empty($request->input('slots.morning'))) {
            foreach ($request->input('slots.morning') as $index => $morning) {
                $morningSlots[] = [
                    'flag' => $morning['flag'],
                    'currency' => $morning['currency'],
                    'unit' => $morning['unit'],
                    'buying_rate' => $morning['buying_rate'],
                    'display_order' => $morning['display_order'] ?? 0,
                    'is_published' => $morning['is_published'] ?? false,
                ];
            }
        }

        // Prepare afternoon slots data
        $afternoonSlots = [];
        if (!empty($request->input('slots.afternoon'))) {
            foreach ($request->input('slots.afternoon') as $index => $afternoon) {
                if ($afternoon['currency']) { // Make sure the currency is provided
                    $afternoonSlots[] = [
                        'flag' => $afternoon['flag'],
                        'currency' => $afternoon['currency'],
                        'unit' => $afternoon['unit'],
                        'buying_rate' => $afternoon['buying_rate'],
                        'display_order' => $afternoon['display_order'] ?? 0,
                        'is_published' => $afternoon['is_published'] ?? false,
                    ];
                }
            }
        }

        // Update or create the forex rate entry with the morning and afternoon slots
        ForexRate::updateOrCreate(
            ['date' => $request->date],
            ['slots' => [
                'morning' => $morningSlots,
                'afternoon' => $afternoonSlots,
            ]]
        );

        return redirect()->route('forex-rate.index')->with('success', 'Forex rates saved successfully.');
    }


    public function edit($id)
    {
        $forexRate = ForexRate::findOrFail($id);

        $morningRates = collect($forexRate->slots['morning'] ?? [])->map(fn($rate) => (object) $rate);
        $afternoonRates = collect($forexRate->slots['afternoon'] ?? [])->map(fn($rate) => (object) $rate);

        return view('backend.forex-rates.edit', compact('forexRate', 'morningRates', 'afternoonRates'));
    }

    public function update(ForexRateRequest $request, $id)
    {
        $validated = $request->validated();
        $forexRate = ForexRate::findOrFail($id);

        // Prepare morning slots
        $morningSlots = [];
        if (!empty($request->input('slots.morning'))) {
            foreach ($request->input('slots.morning') as $index => $morning) {
                $morningSlots[] = [
                    'flag' => $morning['flag'],
                    'currency' => $morning['currency'],
                    'unit' => $morning['unit'],
                    'buying_rate' => $morning['buying_rate'],
                    'display_order' => $morning['display_order'] ?? 0,
                    'is_published' => $morning['is_published'] ?? false,
                ];
            }
        }

        // Prepare afternoon slots
        $afternoonSlots = [];
        if (!empty($request->input('slots.afternoon'))) {
            foreach ($request->input('slots.afternoon') as $index => $afternoon) {
                if ($afternoon['currency']) { // Only if currency is filled
                    $afternoonSlots[] = [
                        'flag' => $afternoon['flag'],
                        'currency' => $afternoon['currency'],
                        'unit' => $afternoon['unit'],
                        'buying_rate' => $afternoon['buying_rate'],
                        'display_order' => $afternoon['display_order'] ?? 0,
                        'is_published' => $afternoon['is_published'] ?? false,
                    ];
                }
            }
        }

        // Update the ForexRate model
        $forexRate->update([
            'date' => $request->date, // Optional: keep if user can update date too
            'slots' => [
                'morning' => $morningSlots,
                'afternoon' => $afternoonSlots,
            ]
        ]);

        return redirect()->route('forex-rate.index')->with('success', 'Rates updated successfully.');
    }


    public function destroy(ForexRate $forexRate)
    {
        $forexRate->delete();
        return redirect()->route('forex-rate.index')->with('success', 'Forex rate deleted successfully.');
    }

    public function destroyTimeSlot($timeSlot, Request $request)
    {
        $date = $request->date;
        $forexRate = ForexRate::whereDate('date', $date)->firstOrFail();

        $slots = $forexRate->slots;
        unset($slots[$timeSlot]);

        $forexRate->update(['slots' => $slots]);

        return redirect()->route('forex-rate.index')->with('success', ucfirst($timeSlot) . ' slot deleted successfully.');
    }

    public function addRateRow(Request $request)
    {
        $timeSlot = $request->input('time_slot');
        $index = $request->input('index');
        $rate = null;

        $html = view('backend.forex-rates.partials.rate-fields', compact('timeSlot', 'index', 'rate'))->render();

        return response()->json(['html' => $html]);
    }
}
