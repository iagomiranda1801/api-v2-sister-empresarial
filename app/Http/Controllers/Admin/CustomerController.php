<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //


    public function __construct(private Customer $customers)
    {
    }

    public function index(Request $request)
    {
        $customers = $this->customers->paginate(10);
        return view('admin.pages.customers.index', compact('customers'));
    }
}
