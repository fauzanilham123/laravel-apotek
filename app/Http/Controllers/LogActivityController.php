<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $dariTanggal = (request('dari_tanggal'));
        $sampaiTanggal = (request('sampai_tanggal'));

        // Query dasar tanpa filter tanggal
        $logactivities = ActivityLog::sortable();

        // Tambahkan filter berdasarkan tanggal jika input tersedia
        if ($dariTanggal && $sampaiTanggal) {
            $logactivities->whereBetween('time', [$dariTanggal, $sampaiTanggal]);
        }
        //get posts
        $logactivities = $logactivities->paginate(10);

        //render view with logactivities
        return view('admin.logactivity.index', compact('logactivities'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ActivityLog $logActivity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ActivityLog $logActivity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ActivityLog $logActivity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ActivityLog $logActivity)
    {
        //
    }
}