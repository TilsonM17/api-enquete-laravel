<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Poll as ModelsPoll;
use Illuminate\Http\Request;

class Poll extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$request->input("options")) {
            return response()->json(["message" => "Options are required"], 400);
        }
        $poll = new ModelsPoll();
        $poll->poll_description = $request->input("poll_description");
        $poll->save();
        //==========================
        foreach ($request->input("options") as $value) {
            $opt = new Option();
            $opt->poll_id = $poll->refresh()->poll_id;
            $opt->options = $value;

            $opt->save();
        }

        return response()->json([
            'poll_id' => $poll->refresh()->poll_id,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $poll = ModelsPoll::find($id);
        $option = Option::where('poll_id', $id)->get();
        if (!$poll or !$option) {
            return response()->json([
                'status' => 404,
                'statusText' => 'Error', 'data' => 'Not Found'
            ], 404);
        }
        foreach ($option as $value) {
            $option_data[] = [
                'option_id' => $value->option_id,
                'options' => $value->options,
               
            ];
        }
       

        return response()->json(
            [
                'status' => 200,
                'statusText' => 'OK',
                'data' => [
                    'poll_id' => $poll->poll_id,
                    'poll_description' => $poll->poll_description,
                    'option' =>  $option_data
                   
                ]
            ],
            200
        );
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
