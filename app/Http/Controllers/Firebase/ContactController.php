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
        $total = $this->database->getReference($this->ref_table_name)->getSnapShot()->numChildren();
        return view('firebase.contact.index', compact('collection', 'total'));
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

    public function edit($id)
    {
        $key = $id;
        $editData = $this->database->getReference($this->ref_table_name)->getChild($key)->getValue();
        if($editData)
        {
        return view('firebase.contact.edit', compact('editData', 'key'));
        }
        else
        {
            return redirect('contacts')->with('status', 'Id not found');
        }
    }

    public function update(Request $request, $id)
    {
        $key = $id;
        $updateData = [
            'first_name'    => $request->first_name,
            'last_name'     => $request->last_name,
            'email'         => $request->email,
            'password'      => $request->password,
        ];
        $res_updated = $this->database->getReference($this->ref_table_name.'/'.$key) // this is the root reference
        ->update($updateData);
        if($res_updated)
        {
            return redirect('contacts')->with('status', 'Contact Updated Successfully');
        }
        else 
        {
            return redirect('contacts')->with('status', 'Something went wrong');
        }
    }

    public function destroy($id)
    {
        $key = $id;
        $deleteData = $this->database->getReference($this->ref_table_name.'/'.$key)->remove();
        if($deleteData)
        {
            return redirect('contacts')->with('status', 'Contact Deleted Successfully');
        }
        else 
        {
            return redirect('contacts')->with('status', 'Something went wrong');
        }


    }
}
