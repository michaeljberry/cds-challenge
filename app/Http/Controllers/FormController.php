<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\InputRequest;

class FormController extends Controller
{
    public function store(InputRequest $request)
    {
        return redirect()->back()->with('success', 'You have filled in all the fields correctly.');
    }
}
