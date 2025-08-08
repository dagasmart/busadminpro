<?php

namespace Biz\Party\Http\Controllers;

use DagaSmart\BizAdmin\Controllers\AdminController;

class PartyController extends AdminController
{
    public function index()
    {
        $page = $this->basePage()->body('Party Extension.');

        return $this->response()->success($page);
    }
}
