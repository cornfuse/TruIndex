<?php

namespace App\DTO\SitesDTO;


class CreateSiteListDTO{
    public  function  __construct(public readonly string $site_name,public readonly int $category_id, public  readonly int $weight)
    {

    }
}
