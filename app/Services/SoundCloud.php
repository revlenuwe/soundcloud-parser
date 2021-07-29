<?php


namespace App\Services;


use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\TooManyRedirectsException;
use Illuminate\Support\Str;
use Symfony\Component\HttpKernel\Exception\TooManyRequestsHttpException;

class SoundCloud
{
    const API_RESOLVE_URL = 'https://api.soundcloud.com/';

    private $client;
    private $client_id;

    public function __construct(){
        $this->client = new Client(['base_uri' => self::API_RESOLVE_URL]);
        $this->client_id = config('soundcloud.client_id');
    }

    /**
     * @param $url
     * @return mixed|\Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getTrackData($url)
    {
        try {
            $response = $this->client->get('resolve.json',[
                'query' => [
                    'url' => $url,
                    'client_id' => $this->client_id
                ]
            ]);
        }catch(ClientException $e){
            return $e->getResponse()->getBody();
        }


        return json_decode($response->getBody());
    }

    /**
     * @param $url
     * @return false|int
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function downloadTrack($url)
    {
        $trackData = $this->getTrackData($url);
        $fileName = Str::slug($trackData->title).'.mp3';

        $this->checkApiAvailability($trackData->id);

        header("Content-type: audio/mpeg");
        header("Content-Disposition: attachment; filename={$fileName}");

        return readfile($trackData->stream_url.'?client_id='.$this->client_id);
    }

    /**
     * @param $trackId
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function checkApiAvailability($trackId)
    {
        try {
            return $this->client->get('tracks/'.$trackId.'/stream',[
                'query' => [
                    'client_id' => $this->client_id
                ]
            ]);
        }catch(ClientException $e){
            throw new TooManyRequestsHttpException();
        }
    }
}
