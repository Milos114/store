<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

class ApiController extends Controller
{
    public function gitData($username)
    {
        $eventScores = collect([
            'PushEvent' => 5,
            'CreateEvent' => 4,
            'IssuesEvent' => 3,
            'CommitCommentEvent' => 2
        ]);

        return $this->events($username)->pluck('type')->map(function ($event) use ($eventScores) {
            return $eventScores->get($event, 1);
        })->sum();
    }

    /**
     * @param  $username
     * @return \Illuminate\Support\Collection
     */
    protected function events($username)
    {
        $client = new Client(['base_uri' => 'https://api.github.com/']);
        return $events = collect(json_decode($client->get("users/$username/events")->getBody()));
    }
}
