<?php

declare(strict_types=1);

namespace App\interfaces\IService;

use App\DTO\SitesDTO\CreateSiteCategoryDTO;

interface SitesCategoryInterface
{
    public  function create_sites_category(CreateSiteCategoryDTO $data);
    public  function list_sites_categories ();

    public  function update_sites_category(CreateSiteCategoryDTO $data);

    public  function delete_sites_category(int $id);
}
