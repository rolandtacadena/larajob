<?php

namespace App\Repositories;

use App\Job;

class JobRepository
{
    /**
     * Get all raw jobs.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all()
    {
        return Job::latest();
    }

    /**
     * Get all jobs paginated.
     *
     * @param int $perPage
     * @return mixed
     */
    public function allPaginated($perPage = 40)
    {
        return $this->all()->paginate($perPage);
    }
}