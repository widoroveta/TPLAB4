<?php

namespace Controllers;

class CompanyPanelController
{
    public function showHomeCompany()
    {
        require_once (VIEWS_PATH."company/home-company.php");
    }
}