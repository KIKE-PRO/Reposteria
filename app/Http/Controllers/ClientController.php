<?php
namespace App\Http\Controllers;
use App\Client;
use App\Http\Requests\StoreRequest;
use App\Http\Requests\UpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
class ClientController extends Controller
{
    public function index()
    {
        $title="LISTADO DE CLIENTES";
        $clients= DB::table('clients')->orderBy('id','DESC')->paginate(5);
        // $clients= Client::orderBy('id','DESC')->paginate(5);
        return view('clients.index',compact('title','clients'));
    }
    public function create()
    {
        return view ('clients.create');
    }

    public function store(StoreRequest $request)
    {

        Client::create($request->all());
        return redirect()->route('clients.index');    
    }

    public function show(Client $client)
    {
        return view ('clients.show', compact('client'));
    }

    public function edit(Client $client)
    {
       return view ('clients.edit',compact('client'));
    }    

    public function update(Request $request, $id)
    {

      $client = Client::findOrfail($id);

        $client_dni_exist = Client::where('dni', $request->dni)->first();


        if ($client_dni_exist && $client->dni != $request->dni) 
        {
            
          Session::flash('message-error',"El D.N.I esta duplicado y no puede ser editado.");

          return redirect()->route('client.edit',$id);
        }
        else{

            $client->name = $request->name;
            $client->phone = $request->phone;
            $client->adress = $request->adress;
            $client->socialNetwork = $request->socialNetwork;
            $client->dni = $request->dni;
            $client->save();

        }

        Session::flash('message',"Usuario actualizado correctamente");

        return redirect()->route('client.show',['client'=>$client]);
    
    }

   public function destroy(Client $client)
    {
        $client->delete();
        
        return redirect()->route('clients.index');
    }
}
