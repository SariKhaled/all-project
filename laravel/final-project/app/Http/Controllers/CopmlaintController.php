<?php

namespace App\Http\Controllers;

use App\Mail\ComplaintWelcomeEmail;
use App\Mail\ResponseWelcomeEmail;
use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;

class CopmlaintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $data = Complaint::all();
        $data = DB::select("SELECT * FROM complaints ORDER BY urgent DESC");


        return response()->view("cms.request.index", ["data" => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $data=Complaint::all();

        return response()->view('cms.request.request');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            "student_name" => "required|string|min:2|max:14",
            "student_number" => "required|digits:9|numeric",
            "student_email" => "required|email|string",
            "student_image" => "nullable|image|mimes:jpg,png|max:1024",
            "select" => "required|in:complaint,suggestion",
            "active" => "nullable",
            "title" => "required|string|max:50",
            "message" => "required|string|max:255",
        ]);






        $typeA = new Complaint();
        $typeA->student_id = $request->input("student_number");
        $typeA->student_name = $request->input("student_name");
        $typeA->student_email = $request->input("student_email");
        // $typeA->urgent = $request->input("active");
        if ($request->has("active") == "on") {
            $typeA->urgent = true;
        } else {
            $typeA->urgent = false;
        }
        $typeA->type = $request->input("select");
        $typeA->title = $request->input("title");
        $typeA->message = $request->input("message");

        if ($request->hasFile("student_image")) {

            $studentImage = $request->file("student_image");
            $studentName = time() . '_image_' .  $typeA->student_name . '.' . $studentImage->getClientOriginalExtension();
            $studentImage->storePubliclyAs('copmlaint', $studentName, ["disk" => "public"]);
            $typeA->image = 'copmlaint/' . $studentName;
        }else{
            $typeA->image = 'copmlaint/No.jpg' ;
        }

        $saved = $typeA->save();
        if ($saved) {
            Mail::to($request->user())->send(new ComplaintWelcomeEmail($typeA));
        }
        return redirect()->route("complaints.finish");


        // if ($saved) {
        //     return response()->json(["message" => "The " . $request->input("select") . " has been sent"], Response::HTTP_CREATED);
        // } else {
        //     return response()->json(["message" =>  "The " . $request->input("select") . " has been failed"], Response::HTTP_BAD_REQUEST);
        // }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Complaint::findOrFail($id);
        return response()->view('cms.request.edit', ["data" => $data]);
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
        $validator = validator($request->all(), [
            "textarea" => "required|min:3|max:1000"
        ]);
        $data = Complaint::findOrFail($id);

        if (!$validator->fails()) {
            $data->response = $request->input("textarea");
            $saved = $data->save();
            if ($saved) {
                $admin = Auth::user();
                Mail::to($request->user())->to($data->student_email)->send(new ResponseWelcomeEmail($data, $admin));
                return response()->json(["message" => "The response succeeded", "icon" => "success"], Response::HTTP_ACCEPTED);
            } else {
                return response()->json(["message" => "The response failed", "icon" => "error"], Response::HTTP_BAD_REQUEST);
            }
        } else {
            return response()->json(["message" => $validator->getMessageBag()->first(), "icon" => "error"], Response::HTTP_BAD_REQUEST);
        }
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
    public function closed($id)
    {
        $data = Complaint::findOrFail($id);

        if (!is_null($data->response)) {

            $data->status = "closed";
            $data->closed_date = now();
            $data->save();
            return response()->json(["message" => "The request has been closed", "icon" => "success"], Response::HTTP_OK);
        } else {

            $data->status = "open";
            $data->save();
            return response()->json(["message" => "A response must be added", "icon" => "error"], Response::HTTP_BAD_REQUEST);
        }
    }


    public function finish()
    {
        return response()->view("cms.request.finish-request");
    }
    public function search(Request $request)
    {
        if ($request->search) {
            $sari = $request->search;
            $data = Complaint::where("id", "=", $sari)->first();
            return response()->view('cms.request.search', ["data" => $data]);
        } else {

            $data = "";
            return response()->view("cms.request.search", ["data" => $data]);
        }
    }
}
