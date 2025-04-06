<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // converted existing JSON data to single values
        $agentDetails = DB::table('agent_details')->get();
        
        foreach ($agentDetails as $agent) {
            $state_agent_name = json_decode($agent->state_agent_name, true);
            $address = json_decode($agent->address, true);
            $contact_no = json_decode($agent->contact_no, true);
            $contact_person = json_decode($agent->contact_person, true);
            
            DB::table('agent_details')
                ->where('id', $agent->id)
                ->update([
                    'state_agent_name' => $state_agent_name[0] ?? '',
                    'address' => $address[0] ?? null,
                    'contact_no' => $contact_no[0] ?? null,
                    'contact_person' => $contact_person[0] ?? null,
                ]);
        }
        
        // modified the columns to be string types
        Schema::table('agent_details', function (Blueprint $table) {
            $table->string('state_agent_name', 255)->change();
            $table->string('address', 255)->nullable()->change();
            $table->string('contact_no', 20)->nullable()->change();
            $table->string('contact_person', 255)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Convert back to text columns for JSON storage
        Schema::table('agent_details', function (Blueprint $table) {
            $table->text('state_agent_name')->change();
            $table->text('address')->nullable()->change();
            $table->text('contact_no')->nullable()->change();
            $table->text('contact_person')->nullable()->change();
        });
        
    }
};
