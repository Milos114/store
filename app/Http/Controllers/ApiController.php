<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

class ApiController extends Controller
{
    protected $username;

    /**
     * @param  string $username
     * @return mixed
     */
    public function gitData($username)
    {
        $this->username = $username;

        return $this->events()->pluck('type')->map(function ($event) {
            return $this->eventScores()->get($event, 1);
        })->sum();
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    protected function events()
    {
        $client = new Client(['base_uri' => 'https://api.github.com/']);
        return $events = collect(json_decode($client->get("users/$this->username/events")->getBody()));
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    protected function eventScores()
    {
        return $eventScores = collect([
            'PushEvent' => 5,
            'CreateEvent' => 4,
            'IssuesEvent' => 3,
            'CommitCommentEvent' => 2
        ]);
    }
}
