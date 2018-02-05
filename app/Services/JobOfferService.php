<?php

namespace App\Services;

use App\Events\JobOfferPosted;
use App\JobOffer;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class JobOfferService
{
    /**
     * Get all Job Offers
     *
     * @return Collection
     */
    public function list($status = null)
    {
        if (Auth::check()) {
            if ($status) {
                return JobOffer::where('status', $status)->orderByDesc('created_at')->paginate(10);
            }
            return JobOffer::orderByDesc('created_at')->paginate(10);
        }

        return JobOffer::where('status', JobOffer::STATUS_PUBLISHED)->orderByDesc('created_at')->paginate(10);
    }

    /**
     * Get Job Offer
     *
     * @param $id
     * @return JobOffer
     */
    public function get($id)
    {
        return JobOffer::find($id);
    }

    /**
     * Create Job Offer
     *
     * @param array $data
     * @return mixed
     */
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

    /**
     * Update Job Offer Status
     *
     * @param JobOffer $offer
     * @param $action
     * @return bool
     */
    public function updateStatus(JobOffer $offer, $action)
    {
        $offer->status = $action == 'publish' ? JobOffer::STATUS_PUBLISHED : JobOffer::STATUS_SPAM;
        $offer->save();

        return true;
    }
}