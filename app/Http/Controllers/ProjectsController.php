<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Project;
use App\Client;

use DB;

class ProjectsController extends Controller
{
  //
  public function __construct()
  {
    //$this->middleware('auth');
  }


  public function index(Request $request)
  {
    return view('projects.index', []);
  }

  public function create(Request $request)
  {
    $clients = Client::all();
    return view('projects.add', [
      'clients' => $clients, []
    ]);
  }

  public function edit(Request $request, $id)
  {
    $project = Project::findOrFail($id);
    $clients = Client::all();
    return view('projects.add', ['clients' => $clients,
      'model' => $project    ]);
  }

  public function show(Request $request, $id)
  {
    $project = Project::findOrFail($id);
    return view('projects.show', [
      'model' => $project    ]);
  }

  public function grid(Request $request)
  {
    $len = $_GET['length'];
    $start = $_GET['start'];

    $select = "SELECT *,1,2 ";
    $presql = " FROM projects a ";
    if($_GET['search']['value']) {
      $presql .= " WHERE project_name LIKE '%".$_GET['search']['value']."%' ";
    }

    $presql .= "  ";

    //------------------------------------
    // 1/2/18 - Jasmine Robinson Added Orderby Section for the Grid Results
    //------------------------------------
    $orderby = "";
    $columns = array('id','project_name','client_id','start_date','duration','next_due_date','amount','created_at','updated_at',);
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
  $project = null;
  if($request->id > 0) { $project = Project::findOrFail($request->id); }
  else {
    $project = new Project;
  }



    $project->id = $request->id?:0;


      $project->project_name = $request->project_name;


      $project->client_id = $request->client_id;


      $project->start_date = $request->start_date;


      $project->duration = $request->duration;


      $project->next_due_date = $request->next_due_date;


      $project->amount = $request->amount;


    //   $project->created_at = $request->created_at;


    //   $project->updated_at = $request->updated_at;

    //$project->user_id = $request->user()->id;
  $project->save();

  return redirect('/projects');

}

public function store(Request $request)
{
  return $this->update($request);
}

public function destroy(Request $request, $id) {

  $project = Project::findOrFail($id);

  $project->delete();
  return "OK";

}


}
