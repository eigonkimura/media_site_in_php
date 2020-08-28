<?php

namespace App\Http\Controllers\MediaSite\Authors;

use App\Author;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class CreateAuthorController extends Controller {
    public function execute(Request $request) {
        $name = $request->name;

        /* Save to database - Method 01
            Need put:
            "protected $fillable = ['name'];"
            in Author Model file.
        */
        
        // $createdAuthor = Author::create([
        //     'name' => $name
        // ]);


        /* Save to database - Method 02*/
        $author = new Author();
        $author->name = $name;
        $author->id = Uuid::uuid4();
        $author->save();
        
        return 'ok';

    }
}