<?php

namespace App\Http\Controllers\MediaSite\Authors;

use App\Http\Controllers\Controller;
use App\Author;
use Illuminate\Http\Request;

class ListAuthorsController extends Controller {
    public function execute(Request $request) {
        $authors = Author::all();
        return $authors;
    }
}