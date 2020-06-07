<?php

namespace App\Http\Controllers\dashboard;

use App\Contact;
use App\User;
use App\Helpers\CustomUrl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreContactPost;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware(['auth', 'rol.admin']);
    }

    public function index()
    {
        $user = Auth::user();
        $contacts = Contact::where('admin_id', '=', $user->id)->orderBy('created_at', 'desc')->paginate(10);

        return view('dashboard.contact.index', ['contacts' => $contacts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        /*$users = User::pluck('id');
        $contact = new Contact();
        return view('frontblog.blog.contact', ['contact' => $contact]);*/
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactPost $request)
    {   
        /*Contact::create($request->validated());
        return back()->with('status', 'Contacto creado con exito');*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        return view('dashboard.contact.show', ["contact" => $contact]);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return back()->with('status', 'Contacto eliminado con exito');

    }
}
