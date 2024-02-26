<?php

namespace App\Http\Controllers;

use Goutte\Client;
use Illuminate\Http\Request;

class FiverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $client = new Client();
        $url = 'https://www.fiverr.com/' . $request->username;
        $crawler = $client->request('GET', $url);
        $data = [];
         $crawler->filter('.review-item-component-wrapper')->each(function($item) use (&$data){
            $item_data = [
                'username'=> null,
                'country' => null,
                'stars' => null,
                'time_ago' => null,
                'user_comment' => null,
            ];

            $item->filter('.username')->each(function($node) use (&$item_data){
                $item_data['username'] = $node->text();
            });
            $item->filter('.country-name')->each(function($node) use (&$item_data){
                $item_data['country'] = $node->text();
            });
            $item->filter('.rating-score')->each(function($node) use (&$item_data){
                $item_data['stars'] = $node->text();
            });
            $item->filter('time')->each(function($node) use (&$item_data){
                $item_data['time_ago'] = $node->text();
            });
            $item->filter('.review-description')->each(function($node) use (&$item_data){
                $item_data['user_comment'] = $node->text();
            });

            $data[] = $item_data;
        });

        return view('home', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
