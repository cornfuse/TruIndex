<?php

namespace App\Http\Controllers\Scraper;

use App\Http\Controllers\Controller;
use App\interfaces\IService\ContentServiceInterface;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    use ApiResponse;

    private ContentServiceInterface $contentService;
    public function __construct(ContentServiceInterface $crawlerService)
    {
       $this->contentService = $crawlerService;
    }

    public  function crawl_data()
    {
        try {
         $result =  $this->contentService->get_contents();
         return $this->success("list",$result,200);
        }catch (\Throwable $e){
          return $this->fail($e->getMessage());
        }
    }
}
