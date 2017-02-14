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
        try{
            $crawler = Crawler::where('link', $request->link)->firstOrFail();
        } catch (ModelNotFoundException $e) {
            $crawler = Crawler::firstOrCreate($request->all());
        }
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
        $crawler->enable = 0;
        if ($request->has('enable')){
            $crawler->enable = $request->enable;
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
            $crawler["category"] = $request->category;
            $crawler["en"] = $request->en;
            $crawler["episode"] = $request->episode;
            $crawler["episodeid"] = $request->episodeid;
            $crawler["filmid"] = $request->filmid;
            $crawler["folder_name"] = $request->folder_name;
            $crawler["g_folder_id"] = $request->g_folder_id;
            $crawler["image"] = $request->image;
            $crawler["link"] = $request->link;
            $crawler["source"] = $request->source;
            $crawler["total"] = $request->total;
            $crawler["trailer"] = $request->trailer;
            $crawler["vi"] = $request->vi;
            $crawler["year"] = $request->year;
            $crawler->save();
        } catch (ModelNotFoundException $e) {
            $crawler = Crawler::create($request->all());
            $crawler["category"] = $request->category;
            $crawler["en"] = $request->en;
            $crawler["episode"] = $request->episode;
            $crawler["episodeid"] = $request->episodeid;
            $crawler["filmid"] = $request->filmid;
            $crawler["folder_name"] = $request->folder_name;
            $crawler["g_folder_id"] = $request->g_folder_id;
            $crawler["image"] = $request->image;
            $crawler["link"] = $request->link;
            $crawler["source"] = $request->source;
            $crawler["total"] = $request->total;
            $crawler["trailer"] = $request->trailer;
            $crawler["vi"] = $request->vi;
            $crawler["year"] = $request->year;
            $crawler->save();
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
