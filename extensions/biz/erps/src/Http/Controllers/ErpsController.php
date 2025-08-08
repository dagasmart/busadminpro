<?php

namespace Biz\Erps\Http\Controllers;

use DagaSmart\BizAdmin\Controllers\AdminController;

class ErpsController extends AdminController
{
    public function index()
    {
        $page = $this->basePage()->body('Erps Extension.');

        return $this->response()->success($page);
    }
}
