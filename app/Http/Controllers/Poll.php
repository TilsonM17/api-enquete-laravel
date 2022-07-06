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
     * @param  int  $id
     * @param  int  $id_vote
     * @return \Illuminate\Http\Response
     */
    public function vote($id, $id_vote)
    {
        $poll = ModelsPoll::find($id);
        $option = Option::where('poll_id', $id)->get();
        if (!$poll or !$option) {
            return response()->json([
                'status' => 404,
                'statusText' => 'Error', 'data' => 'Not Found'
            ], 404);
        }

        foreach ($option as $key => $value) {
            if ($value->option_id == $id_vote) {
                $value->votes = $value->votes + 1;
                $value->save();
            }
        }

        return [
            'option_id' => $id_vote
        ];

        
    }


    public function stats(int $id){

        $options = Option::where("poll_id",$id)->get();
            if(!$options){
                return response(status:404)->json([
                    'status' => 404,
                    'data' => 'Not Found'
                ],404);
            }

            $poll = ModelsPoll::findOrfail($id);
            $poll->views +=1;
            $poll->save();



            foreach($options as $opt){
                $votes[] = [
                    'option_id' => $opt->option_id,
                    "qty" => $opt->votes
                ];
            }
            
        return response()->json(
            [
                'status' => 200,
                'statusText' => 'OK',
                "views" => $poll->refresh()->views,
                "votes" => $votes
            ]
            );
    }
}
