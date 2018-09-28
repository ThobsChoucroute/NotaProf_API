<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appreciation;

class AppreciationController extends Controller
{

    /**
     * Get all appreciations
     *
     * @return Appreciation
     */
    public function index()
    {
        return Appreciation::all();
    }

    /**
     * Store new appreciation
     *
     * @param Request $request
     * @return Appreciation $appreciation
     */
    public function store(Request $request)
    {
        $appreciation = Appreciation::create([
            'content' => $request->content,
            'category_id' => $request->category_id,
        ]);

        return $appreciation;
    }

    /**
     * Get specific appreciation
     *
     * @param int $id
     * @return Appreciation $appreciation
     */
    public function show($id)
    {
        try
        {
            $appreciation = Appreciation::findOrFail($id);
            return $appreciation;
        } 
        catch(\Exception $e) 
        {
            return response()->json([
                'message' => 'error'
            ]);
        }
    }
}
