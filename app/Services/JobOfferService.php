<?php

namespace App\Services;

use App\Events\JobOfferPosted;
use App\JobOffer;
use Illuminate\Support\Facades\Auth;

class JobOfferService
{
    /**
     * @return mixed
     */
    public function list()
    {
        if (Auth::check()) {
            return JobOffer::all()->sortByDesc('created_at');
        }

        return JobOffer::where('status', JobOffer::STATUS_PUBLISHED)->get()->sortByDesc('created_at');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function get($id)
    {
        return JobOffer::find($id);
    }

    public function create(array $data)
    {
        $hasPrevious = JobOffer::where([
            'email' => $data['email'],
            'status' => JobOffer::STATUS_PUBLISHED
        ])->count();

        if (!$hasPrevious) {
            $data['status'] = JobOffer::STATUS_PENDING;
        } else {
            $data['status'] = JobOffer::STATUS_PUBLISHED;
        }

        $offer = JobOffer::create($data);

        event(new JobOfferPosted($offer));

        return $offer;
    }

    public function updateStatus($id, $status)
    {
        $offer = JobOffer::find($id);
        $offer->status = $status;
        $offer->save();

        return $offer;
    }
}