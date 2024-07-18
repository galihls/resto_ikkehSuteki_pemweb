<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\dataform;

class AdminDataFormController extends Controller
{
    public function index()
    {
        $dataForms = dataform::all();
        return view("admin.dataforms.index", compact("dataForms"));
    }
}
