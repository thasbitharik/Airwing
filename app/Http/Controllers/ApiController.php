<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Http\Request;
use DB;

class ApiController extends Controller
{
    public function CustomerDetails()
    {
        try {
            $data = DB::table('users')
            ->select('users.name','users.email','users.user_type_id')
            ->get();

            return response()->json($data);
        } catch (\Throwable $th) {
             \Log::error('Error fetching customer details: ' . $th->getMessage());

             return response()->json(['error' => 'An unexpected error occurred.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
