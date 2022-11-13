<?php

namespace App\Controllers;

use App\Models\RealEstateModel;

class RealEstate extends BaseController
{
    /**
     * @var RealEstateModel
     */
    private $realEstate;

    /**
     * RealEstate constructor.
     */
    public function __construct()
    {
        $this->realEstate = new RealEstateModel();
    }

    public function index()
    {
        $data['rows'] = $this->realEstate->getAll();

        return view('realEstate/list', $data);
    }

    public function loadRecord()
    {
        if ($this->request->isAJAX()) {
            $page = $this->request->getPost('page');
            $data = $this->realEstate->getAll($page);

            return json_encode($data);
        }

        return null;
    }
}
