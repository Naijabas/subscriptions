<?php

namespace App\Repositories;

use App\Models\Website;
use App\Repositories\BaseRepository;

/**
 * Class WebsiteRepository
 * @package App\Repositories
 * @version November 10, 2021, 8:40 pm UTC
*/

class WebsiteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'url'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Website::class;
    }
}
