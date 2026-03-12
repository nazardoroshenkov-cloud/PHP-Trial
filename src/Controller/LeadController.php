<?php

namespace App\Controller;

use App\Service\LeadService;

class LeadController
{
    private LeadService $service;

    public function __construct(LeadService $service)
    {
        $this->service = $service;
    }

    public function showForm()
    {
        require __DIR__ . '/../../views/form.php';
    }

    public function submit()
    {
        $this->service->sendLead($_POST);
        header("Location: /success");
    }

    public function success()
    {
        require __DIR__ . '/../../views/success.php';
    }

    public function statuses()
    {
        $dateFrom = $_GET['date_from'] ?? '';
        $dateTo   = $_GET['date_to'] ?? '';

        if ($dateFrom) {
            $dateFrom = date('Y-m-d H:i:s', strtotime($dateFrom));
        } else {
            $dateFrom = date('Y-m-d 00:00:00', strtotime('-30 days'));
        }

        if ($dateTo) {
            $dateTo = date('Y-m-d H:i:s', strtotime($dateTo));
        } else {
            $dateTo = date('Y-m-d 23:59:59');
        }

        $leads = $this->service->getStatuses($dateFrom, $dateTo);

        require __DIR__ . '/../../views/statuses.php';
    }
}