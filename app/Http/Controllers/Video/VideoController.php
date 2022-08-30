<?php

namespace App\Http\Controllers\Video;

use App\Events\WatchVideoEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\VideoRequest;
use App\Models\Video\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{

    public function index()
    {

        $videos = Video::all();
        return view('video.showAll', compact('videos'));
    }
    //
    public function show($id)
    {
        $video = Video::find($id);
        if (!$video) {
            return redirect()->to(route('video.all'));
        }
        event(new WatchVideoEvent($video));
        return view('video.show', compact('video'));
    }
    public function create()
    {
        return view('video.create');
    }
    public function store(VideoRequest $request)
    {
        Video::create([
            'name' => $request->name,
            'embed_link' => $request->embed_link,
            'views' => $request->views,
        ]);
        return 'SUCCESS';
    }

    public function edit($id)
    {
        $video = Video::find($id);
        if (!$video) {
            return redirect()->to(route('video.all'));
        }

        return view('video.edit', compact('video'));
    }

    public function update(VideoRequest $request, $id)
    {

        $video = Video::find($id);
        if (!$video) {
            return redirect()->to(route('video.all'));
        }

        $video->update($request->all());
        return redirect()->to(route('video.all'))->with(['success', 'Video updated successfully']);
    }
}
