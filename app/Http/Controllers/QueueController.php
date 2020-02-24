<?php

namespace App\Http\Controllers;


use App\Jobs\ProcessPodcast;

class QueueController extends Controller
{

	public function index()
	{
	
		$members = [
			'qiaofeng',
			'yekai',
			'afei'
		];

		foreach ($members as $name) {
			ProcessPodcast::dispatch($name);
		}

	}
}
