<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Buku;
use App\Http\Resources\Buku as BukuResource;

class BukuController extends Controller
{
    public function index()
    {
        //Get all task
        $buku = Buku::paginate(15);
 
        // Return a collection of $task with pagination
        return BukuResource::collection($buku);
    }
 
    public function show($id)
    {
        //Get the task
        $buku = Buku::findOrfail($id);
 
        // Return a single task
        return new BukuResource($buku);
    }
 
    public function destroy($id)
    {
        //Get the task
        $buku = Buku::findOrfail($id);
 
        if($buku->delete()) {
            return new TaskResource($buku);
        } 
 
    }
 
    public function store(Request $request)  {
 
        $buku = $request->isMethod('put') ? Task::findOrFail($request->task_id) : new Task;
            
        $buku->id = $request->input('buku_id');
        $buku->isbn = $request->input('isbn');
        $buku->buku = $request->input('buku');
        $buku->deskripsi = $request->input('deskripsi');
        $buku->author = $request->input('author');
        $buku->user_id =  1; //$request->user()->id;
 
        if($buku->save()) {
            return new BukuResource($buku);
        } 
        
    }
}
