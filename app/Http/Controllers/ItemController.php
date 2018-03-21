<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ItemModel;

class ItemController extends Controller
{
  public function __construct(ItemModel $item)
  {
    $this -> item = $item;
  }

  public function registerItem(Request $request)
  {

    $item = [
      "user_id" => $request->user_id,
      "name"  => $request->name,
      "price"  => $request->price,
      "stock"  => $request->stock
    ];


    $item = $this->item->create($item);

    return response([
             'msg'=>'success',
         ],200);
  }

  public function allItem()
  {
    $item = $this->item->all();

    return $item;

  }

  public function findItem($id)
  {
    $item = $this->item->find($id);


    return $item;
  }

  public function destroyItem($id)
  {
    $item = $this->item->find($id)->delete();

    return response([
         'msg'=>'success',
     ],200);
  }

  public function updateviewItem(Request $request, $id)
  {

    $item = $this->item->find($id);

    $item->user_id = $request->user_id;
    $item->name = $request->name;
    $item->price = $request->price;
    $item->stock = $request->stock;

    $item = $item->save();

    return response([
         'msg'=>'success',
     ],200);
  }





}
