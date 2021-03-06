<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Repositories\SpeakerRepository;
use App\Transformers\SpeakerTransformer;

class SpeakersController extends ApiController
{
    /**
     * Get list of Speakers
     *
     * @param SpeakerRepository $speakerRepository
     * @return \Dingo\Api\Http\Response
     */
    public function index(SpeakerRepository $speakerRepository)
    {
        $speakers = $speakerRepository->getSpeakersWithDeleted($this->getConference()->id, $this->since);
        $this->checkModified($speakers);

        return $this->response->collection($speakers, new SpeakerTransformer(), ['key' => 'speakers']);
    }

}
