<?php

namespace Modules\School\Controllers;

use Illuminate\Http\Request;
use DagaSmart\BizAdmin\Renderers\Tab;
use DagaSmart\BizAdmin\Renderers\Tabs;
use DagaSmart\BizAdmin\Renderers\Alert;
use DagaSmart\BizAdmin\Renderers\InputKV;
use DagaSmart\BizAdmin\Renderers\TextControl;
use DagaSmart\BizAdmin\Controllers\AdminController;

class SettingController extends AdminController
{
    public function index()
    {
        $page = $this->basePage()->body([
            Alert::make()
                ->showIcon()
                ->style([
                    'padding' => '1rem',
                    'color' => 'var(--colors-brand-6)',
                    'border-style' => 'dashed',
                    'border-color' => 'var(--colors-brand-6)',
                    'background-color' => 'var(--Tree-item-onChekced-bg)',
                ])->body("基本设置，站点名称、logo标识"),
            $this->form(),
        ]);

        return $this->response()->success($page);
    }

    public function form()
    {
        return $this->baseForm(false)
            ->redirect('')
            ->api($this->getStorePath())
            ->data(settings()->all())
            ->body(
                Tabs::make()->tabs([
                    Tab::make()->title('基本设置')->body([
                        TextControl::make()->label('网站名称')->name('site_name'),
                        InputKV::make()->label('附加配置')->name('addition_config'),
                    ]),
                    Tab::make()->title('上传设置')->body([
                        TextControl::make()->label('上传域名')->name('upload_domain'),
                        TextControl::make()->label('上传路径')->name('upload_path'),
                    ]),
                ])
            );
    }

    public function store(Request $request)
    {
        $data = $request->only([
            'site_name',
            'addition_config',
            'upload_domain',
            'upload_path',
        ]);

        return settings()->adminSetMany($data);
    }
}
