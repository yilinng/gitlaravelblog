<?php

namespace App\Http\Controllers;

use App\Customer;

use App\Company;

use Illuminate\Http\Request;

class CustomersController extends Controller
{

    public function index()
    {

       $customers = Customer::with('company')->get();

        return view('customer.index', compact('customers'));

    }



    public function create()
    {
    	
        $companies = Company::all();
        $customer = new Customer();
        
    	return view('customer.create', compact('companies','customer'));
    }

    public function store()
    {
    	$this->authorize('create', Customer::class);

    	$customer = Customer::create($this->validateRequest());

        $this->storeImage($customer);

    	return redirect('customers');
    }

    public function show(Customer $customer)
    {

        return view('customer.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {

        $companies = Company::all();

        return view('customer.edit', compact('customer','companies'));
    }

    public function update(Customer $customer)
    {
        
        $customer->update($this->validateRequest());

        $this->storeImage($customer);

        return redirect('customers/' . $customer->id);
    }

    public function destory(Customer $customer)
    {
        $this->authorize('delete', $customer);

        $customer->delete();

        return redirect('customers');
    }

    private function validateRequest()
    {

        return tap(request()->validate([

            'name' =>'required|min:3',
            'email' =>'required',
            'active' =>'required',
            'company_id' =>'required',


        ]), function(){
            if (request()->hasFile('image')) {

            //dd(request()->image);

            request()->validate([
                'image' => 'file|image|max:5000',
            ]);
            
            }
        });
              
    }

    private function storeImage($customer)
    {
        if (request()->has('image')) {

            $customer->update([

                'image' =>request()->image->store('uploads', 'public'),
            ]);
            
        }
    }
}
