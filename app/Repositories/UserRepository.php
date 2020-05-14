<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\User;

/**
 * Class UserRepository
 * @package App\Repositories
 * @version May 13, 2020, 3:42 am UTC
 */

class UserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'password',
        'role',
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
        return User::class;
    }
}
