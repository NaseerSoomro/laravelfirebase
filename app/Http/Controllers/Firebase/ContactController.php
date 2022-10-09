<?php

namespace App\Http\Controllers\Firebase;
use Kreait\Firebase\Contract\Database;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __construct(Database $database)
    {
        $this->database = $database;
        $this->ref_table_name   = 'contacts';
    }
    public function index()
    {
        $collection = $this->database->getReference($this->ref_table_name)->getValue();
        return view('firebase.contact.index', compact('collection'));
    }

    public function create()
    {
        return view('firebase.contact.create');
    }

    public function store(Request $request)
    {
        $postData = [
            'first_name'    => $request->first_name,
            'last_name'     => $request->last_name,
            'email'         => $request->email,
            'password'      => $request->password,
        ];
        // $postRef = $this->database->getReference('contacts')->push($postData);
        $postRef = $this->database->getReference($this->ref_table_name)->push($postData);
        if($postRef) 
        {
            return redirect('contacts')->with('status', 'Contact Inserted Successfully');
        }
        else 
        {
            return redirect('contacts')->with('status', 'Something went wrong');
        }
    }
}
