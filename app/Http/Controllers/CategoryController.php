<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // show all categories
    public function index() {
        return view('admin.categories.index');
    }

    // show a single category
    public function show() {

    }

    // show create form
    public function create() {
        return view('admin.categories.create');
    }

    // store category data
    public function store(Request $request) {

    }

    // show edit form
    public function edit() {

    }

    // update category data
    public function update() {

    }

    // delete category
    public function destroy() {

    }
}
