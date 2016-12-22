<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;

use Illuminate\Http\Request;

use App\Crawler;
class CrawlerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $crawler = Crawler::firstOrCreate($request->all());
        return response()->json($crawler);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $crawler = Crawler::find($id);
        try{
            $crawler->enable = $request->enable;
        } catch(\Exception $e) {
            $crawler->enable = 0;
        }
        $crawler->save();
        return response()->json($crawler);
    }

    /**
     * Insert the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postcrawler(Request $request)
    {
        try{
            $crawler = Crawler::where('link', $request->link)->firstOrFail();
        } catch (ModelNotFoundException $e) {
            $crawler = Crawler::create($request->all());
        }
        return response()->json($crawler);
    }

    /**
     * get the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getphimmoile()
    {
        return response()->json(Crawler::where('episode', 0)
                        ->whereNotNull('filmid')
                        ->where('source', 'http://phimmoi.net')
                        ->where('enable', 1)
                        ->orderBy('updated_at', 'desc')->first());
    }

    /**
     * get the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getphimmoibo()
    {
        return response()->json(Crawler::where('episode', '>', 0)
                        ->whereNotNull('filmid')
                        ->where('source', 'http://phimmoi.net')
                        ->where('enable', 1)
                        ->orderBy('updated_at', 'desc')->first());
    }
    /**
     * get the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function gethdonlinele()
    {
        return response()->json(Crawler::where('episode', 0)
                        ->whereNotNull('filmid')
                        ->where('source', 'http://hdonline.vn')
                        ->where('enable', 1)
                        ->orderBy('updated_at', 'desc')->first());
    }

    /**
     * get the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function gethdonlinebo()
    {
        return response()->json(Crawler::where('episode', '>', 0)
                        ->whereNotNull('filmid')
                        ->where('source', 'http://hdonline.vn')
                        ->where('enable', 1)
                        ->orderBy('updated_at', 'desc')->first());
    }
}
