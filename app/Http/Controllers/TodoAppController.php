<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListItem;

class TodoAppController extends Controller
{

    public function index(){
        return view('welcome', ['listItems' => ListItem::all()]);
    }

    public function saveItem(Request $request){
        \Log::info(json_encode($request->all()));
        $newListItem = new ListItem;
        $newListItem->name = $request->listItem;
        $newListItem->is_completed = 0;

        if($newListItem->name !== null){
            $newListItem->save();
        }else{
            return response('Invalid request, no null', 500);
        }

        \Log::info(json_encode($newListItem->all()));
        return redirect('/');
    }

    // Another way to access the id from the frontend
    // public function completeTask(Request $request){
    //     $listItemId = $request->item_id;
    //     $currentItem = ListItem::find($listItemId);

    //     if($currentItem->is_completed == 0){
    //         $currentItem->is_completed = 1;
    //         $currentItem->save();
    //     }else{
    //         $currentItem->is_completed = 0;
    //         $currentItem->save();
    //     }

    //     \Log::info(json_encode($currentItem));
    //     return redirect('/');
    // }

    public function completeTask($listItemId){
        $currentItem = ListItem::find($listItemId);

        if($currentItem->is_completed == 0){
            $currentItem->is_completed = 1;
            $currentItem->save();
        }else{
            $currentItem->is_completed = 0;
            $currentItem->save();
        }

        \Log::info(json_encode($currentItem));
        return redirect('/');
    }

    public function editTask($listItemId){
        return view('edit', ['listItem' => ListItem::find($listItemId)]);
    }

    public function updateTask(Request $request , $id){
        $currentItem = ListItem::find($id);
        $currentItem->name = $request->name;
        if($currentItem->name !== null){
            $currentItem->save();
        }else{
            return response('Invalid request, no null', 500);
        }
        return redirect('/');
    }

    public function deleteTask(Request $request , $id){
        $itemToDelete = ListItem::find($id);

        if($itemToDelete != null){
              $itemToDelete->delete();
        }else{
            return \response('Error deleting task, Not found', 404);
        }

        return redirect('/');
    }

}

