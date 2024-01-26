<?php
namespace App\services\contentService;

use App\interfaces\IService\ContentServiceInterface;
use GuzzleHttp\Client;

class ContentService implements ContentServiceInterface {
     public function get_contents()
     {
        $client = new Client();
        $url = config('globals.punchContentUrl_TEST');
         $response = $client->get($url);
         $body =     $response->getBody()->getContents();

      $data = json_decode($body,true);
      $payload = $data['payload'];
         $filteredData = [];
         foreach ($payload[0] as $item) {
             $title = $item['title'];
             $content = $item['content'];
             $filteredContent = strip_tags($content);
             $moreFilteredContent = str_replace('(adsbygoogle = window.adsbygoogle || []).push({});', '', $filteredContent);

             $filteredItem = [
                 "title" => $title,
                 "content" => $moreFilteredContent
             ];
             array_push($filteredData, $filteredItem);
         }
         return $filteredData;
     }
}
