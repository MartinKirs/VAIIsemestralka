<?php

namespace App\Controllers;

use App\Models\AccessRequest;
use App\Models\Door;
use Framework\Core\BaseController;
use Framework\Http\Request;
use Framework\Http\Responses\Response;

class AccessRequestController extends BaseController
{
    public function authorize(Request $request, string $action): bool
    {
        return true;
    }

    public function index(Request $request): Response
    {
        $requests = AccessRequest::getAll();
        return $this->html([
            'requests' => $requests
        ]);
    }

    public function add(Request $request): Response
    {
        return $this->html([
            'accessRequest' => new AccessRequest(),
            'doors' => Door::getAll(),
            'errors' => []
        ], 'form');
    }

    public function edit(Request $request): Response
    {
        $id = (int)$request->value('id');
        $accessRequest = AccessRequest::getOne($id);

        if ($accessRequest === null) {
            return $this->redirect($this->url('accessrequest.index'));
        }

        return $this->html([
            'accessRequest' => $accessRequest,
            'doors' => Door::getAll(),
            'errors' => []
        ], 'form');
    }

    public function save(Request $request): Response
    {
        $id = (int)$request->value('id');

        if ($id > 0) {
            $accessRequest = AccessRequest::getOne($id);
            if ($accessRequest === null) {
                return $this->redirect($this->url('accessrequest.index'));
            }
        } else {
            $accessRequest = new AccessRequest();
        }

        $applicantName = trim((string)$request->value('applicant_name'));
        $doorId = (int)$request->value('door_id');
        $reason = trim((string)$request->value('reason'));
        $status = trim((string)$request->value('status'));

        $accessRequest->setApplicantName($applicantName);
        $accessRequest->setDoorId($doorId > 0 ? $doorId : null);
        $accessRequest->setReason($reason);
        $accessRequest->setStatus($status !== '' ? $status : 'Čaká na schválenie');

        $errors = [];
        if ($applicantName === '') {
            $errors[] = 'Meno žiadateľa je povinné.';
        }
        if ($doorId <= 0 || Door::getOne($doorId) === null) {
            $errors[] = 'Musíte vybrať existujúce dvere.';
        }
        if ($reason === '') {
            $errors[] = 'Dôvod žiadosti je povinný.';
        }

        $allowedStatuses = ['Čaká na schválenie', 'Schválené', 'Zamietnuté'];
        if (!in_array($accessRequest->getStatus(), $allowedStatuses, true)) {
            $errors[] = 'Neplatný stav žiadosti.';
        }

        if (!empty($errors)) {
            return $this->html([
                'accessRequest' => $accessRequest,
                'doors' => Door::getAll(),
                'errors' => $errors
            ], 'form');
        }

        $accessRequest->save();

        return $this->redirect($this->url('accessrequest.index'));
    }

    public function delete(Request $request): Response
    {
        $id = (int)$request->value('id');
        $accessRequest = AccessRequest::getOne($id);

        if ($accessRequest !== null) {
            $accessRequest->delete();
        }

        return $this->redirect($this->url('accessrequest.index'));
    }
}
