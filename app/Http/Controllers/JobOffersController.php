<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobOfferCreateRequest;
use App\Services\JobOfferService;

class JobOffersController extends Controller
{
    /**
     * @var JobOfferService
     */
    private $jobOffer;

    /**
     * JobOffersController constructor.
     * @param JobOfferService $jobOffer
     */
    public function __construct(JobOfferService $jobOffer)
    {
        $this->jobOffer = $jobOffer;
        $this->middleware('auth')->only('updateStatus');
    }

    /**
     * List all Job Offers
     * 
     * @return mixed
     */
    public function list()
    {
        $offers = $this->jobOffer->list();
        return view('public.index', compact('offers'));
    }

    /**
     * Show Job Offer
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $offer = $this->jobOffer->get($id);
        return view('public.show', compact('offer'));
    }

    public function create()
    {
        return view('public.create');
    }

    /**
     * Save New Job Offer
     *
     * @param JobOfferCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(JobOfferCreateRequest $request)
    {
        $this->jobOffer->create($request->all());

        return redirect('/')->with('message', 'Successfully created!');
    }

    public function updateStatus($id, $status)
    {
        $this->jobOffer->updateStatus($id, $status);
    }
}
