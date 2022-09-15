<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Http\Requests\MenuRequest;
use App\Models\Product;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $establishment_id = \Auth::user()->establishment_id;
        $menus = Menu::where('establishment_id', $establishment_id)
                    ->get();

        return view('menus.cardapios', ['menus'=> $menus]);
    }

    public function showPublic(Menu $menu)
    {
      return view('menus.public.show', ['menu' => $menu]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('menus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuRequest $request)
    {
        $data = $request->all();
         Menu::create($data);
         return redirect()->route('menu.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        $addableProducts = Product::where('establishment_id', $menu->establishment_id)
          ->whereDoesntHave('menus', function($query) use ($menu) {
            $query->where('menus.id', $menu->id);
          })
          ->get();

        return view('menus.show', ['menu'=>$menu, 'addableProducts' => $addableProducts]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        return view('menus.edit', ['menu'=> $menu]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $data = $request->all();
        $menu->update($data);
        return redirect()->route('menu.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('menu.index');
    }
}
