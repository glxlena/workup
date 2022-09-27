<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Establishment;

class EstablishmentController extends Controller
{

    public function show(Establishment $establishment)
    {
        return view('establishments.empresa', ['establishment'=>$establishment]);
    }

    public function edit(Establishment $establishment)
    {
        return view('establishments.edit', ['establishment'=>$establishment]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Establishment $establishment)
    {
        $data = $request->all();
        $establishment->update($data);
        return redirect()->route('establishment.show',$establishment);
    }

}
