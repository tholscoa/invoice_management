<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Client;

use DB;

class ClientsController extends Controller
{
  //
  public function __construct()
  {
    //$this->middleware('auth');
  }


  public function index(Request $request)
  {
    return view('clients.index', []);
  }

  public function create(Request $request)
  {
    return view('clients.add', [
      []
    ]);
  }

  public function edit(Request $request, $id)
  {
    $client = Client::findOrFail($id);
    // return print($client->phone);
    return view('clients.add', [
      'model' => $client    ]);
  }

  public function show(Request $request, $id)
  {
    $client = Client::findOrFail($id);
    // return $client->phone;
    return view('clients.show', [
      'model' => $client    ]);
  }

  public function grid(Request $request)
  {
    $len = $_GET['length'];
    $start = $_GET['start'];

    $select = "SELECT *,1,2 ";
    $presql = " FROM clients a ";
    if($_GET['search']['value']) {
      $presql .= " WHERE client_name LIKE '%".$_GET['search']['value']."%' ";
    }

    $presql .= "  ";

    //------------------------------------
    // 1/2/18 - Jasmine Robinson Added Orderby Section for the Grid Results
    //------------------------------------
    $orderby = "";
    $columns = array('id','client_name','email','phone','other_details','created_at','updated_at',);
    $order = $columns[$request->input('order.0.column')];
    $dir = $request->input('order.0.dir');
    $orderby = "Order By " . $order . " " . $dir;

    $sql = $select.$presql.$orderby." LIMIT ".$start.",".$len;
    //------------------------------------

    $qcount = DB::select("SELECT COUNT(a.id) c".$presql);
    //print_r($qcount);
    $count = $qcount[0]->c;

    $results = DB::select($sql);
    $ret = [];
    foreach ($results as $row) {
      $r = [];
      foreach ($row as $value) {
        $r[] = $value;
      }
      $ret[] = $r;
    }

    $ret['data'] = $ret;
    $ret['recordsTotal'] = $count;
    $ret['iTotalDisplayRecords'] = $count;

    $ret['recordsFiltered'] = count($ret);
    $ret['draw'] = $_GET['draw'];

    echo json_encode($ret);

  }


  public function update(Request $request) {
    //
    /*$this->validate($request, [
    'name' => 'required|max:255',
  ]);*/
  $client = null;
  if($request->id > 0) { $client = Client::findOrFail($request->id); }
  else {
    $client = new Client;
  }



    $client->id = $request->id?:0;


      $client->client_name = $request->client_name;


      $client->email = $request->email;


      $client->phone = $request->phone;


      $client->other_details = $request->other_details;


    //   $client->created_at = $request->created_at;


    //   $client->updated_at = $request->updated_at;

    //$client->user_id = $request->user()->id;
  $client->save();

  return redirect('/clients');

}

public function store(Request $request)
{
  return $this->update($request);
}

public function destroy(Request $request, $id) {

  $client = Client::findOrFail($id);

  $client->delete();
  return "OK";

}


}
