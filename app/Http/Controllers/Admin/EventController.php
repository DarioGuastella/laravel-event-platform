<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    public function validation($data)
    {
        $validated = Validator::make(
            $data,
            [
                "name" => "required|min:5|max:50",
                "date" => "required",
                "available_tickets" => "max:500",

            ],
            [
                'title.required' => 'Il titolo è necessario',
                'date.required' => 'La data è necessaria'
            ]
        )->validate();

        return $validated;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        $tags = Tag::all();

        return view("admin.events.index", compact("events", "tags"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view("admin.events.create", compact("tags"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEventRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventRequest $request)
    {
        $data = $request->all();
        $dati_validati = $this->validation($data);
        $percorso = Storage::disk("public")->put('/uploads', $request['img']);
        $dati_validati["img"] = $percorso;

        $evento = new Event();

        $evento->fill($dati_validati);
        $evento->save();

        if ($request->tags) {
            $evento->tags()->attach($request->tags);
        }

        return redirect()->route("admin.events.show", $evento->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        $tags = Tag::all();
        return view("admin.events.show", compact("event", "tags"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $tags = Tag::all();
        return view("admin.events.edit", compact("event", "tags"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEventRequest  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        $data = $request->all();

        if ($request->hasFile("img")) {

            if ($event->img) {
                Storage::disk("public")->delete($event->img);
            }
            $percorso = Storage::disk("public")->put('/uploads', $request['img']);
            $data["img"] = $percorso;
        }

        $event->update($data);
        if ($request->filled("tags")) {
            $data["tags"] = array_filter($data["tags"]) ? $data["tags"] : [];  //Livecoding con Luca
            $event->tags()->sync($data["tags"]);
        }

        return redirect()->route("admin.events.show", $event->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route("admin.events.index");
    }
}
