<?php

namespace App\Http\Controllers;

use App\Mail\AdminWelcomeEmail;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Admin::all();
        return response()->view("cms.admin.index", ["admins" => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('cms.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //
        $request->validate([
            "admin_name" => "required|max:20|min:2|string",
            'moblie' => 'required|digits:12|numeric',
            "admin_email" => "required|email|string|unique:admins,email",
            "admin_image" => "required|image|mimes:jpg,png|max:1024",
            "admin_password" => ["required", Password::min(8)->uncompromised()],
        ]);
        $admin = new Admin();
        $admin->name = $request->input("admin_name");
        $admin->email = $request->input("admin_email");
        $admin->moblie = $request->input("moblie");
        $admin->password = Hash::make($request->input("admin_password"));
        $decrypt_password = $request->input("admin_password");

        if ($request->hasFile("admin_image")) {

            $adminImage = $request->file("admin_image");
            $imageName = time() . '_image_' . $admin->name . '.' . $adminImage->getClientOriginalExtension();
            $adminImage->storePubliclyAs('admins', $imageName, ["disk" => "public"]);
            $admin->image = 'admins/' . $imageName;
        }
        $saved = $admin->save();
        if ($saved) {
            Mail::to($request->user())->to($admin->email)->send(new AdminWelcomeEmail($admin, $decrypt_password));
        }
        return redirect()->route('admins.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        //
        $admin = Admin::findOrFail($id);
        return response()->view('cms.admin.edit', ["admins" => $admin]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $validator = validator($request->all(), [
            "admin_name" => "required|max:20|min:2|string",
            'moblie' => 'required|digits:12|numeric',
            "admin_email" => "required|email|string|unique:admins,email," . $id,
        ]);
        if (!$validator->fails()) {
            $admin = Admin::findOrFail($id);
            $admin->name = $request->input("admin_name");
            $admin->email = $request->input("admin_email");
            $admin->moblie = $request->input("moblie");
            $saved = $admin->save();
            return response()->json(
                ['message' => $saved ? "Admin updated successfully" : "Failed to update Admin"],
                $saved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
            );
        } else {
            return response()->json(
                ['message' => $validator->getMessageBag()->first()],
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }
        return redirect()->route("admins.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $admin = Admin::findOrFail($id);
        $deleted = $admin->delete();
        if ($deleted) {
            Storage::delete($admin->image);
        }
        return response()->json(
            ['message' => $deleted ? "Admin deleted successfully" : "Failed to delete Admin"],
            $deleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
        );

    }
}
