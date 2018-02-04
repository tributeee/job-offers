<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobOfferCreateRequest;
use App\JobOffer;
use App\Services\JobOfferService;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
    public function list(Request $request)
    {
        $status = $request->get('status');
        if (!in_array($status, [JobOffer::STATUS_SPAM, JobOffer::STATUS_PUBLISHED, JobOffer::STATUS_PENDING])) {
            $status = null;
        }
        $offers = $this->jobOffer->list($status);
        return view('job-offers.index', compact('offers'));
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
        if (!$offer) {
            throw new NotFoundHttpException();
        }

        return view('job-offers.show', compact('offer'));
    }

    public function create()
    {
        return view('job-offers.create');
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

    /**
     * Update Job Offer Status
     *
     * @param $id
     * @param $action
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateStatus($id, $action)
    {
        $offer = $this->jobOffer->get($id);

        if (!$offer) {
            throw new NotFoundHttpException();
        }

        if (!in_array($action, ['publish', 'mark-spam'])) {
            return redirect()->to('/' . $id)->with([
                'message' => 'Invalid status!',
                'class' => 'danger'
            ]);
        }

        $this->jobOffer->updateStatus($offer, $action);

        return redirect()->to('/' . $id)->with([
            'message' => 'Status successfully updated!',
            'class' => 'success'
        ]);
    }
}
