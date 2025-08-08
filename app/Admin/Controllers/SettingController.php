<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;
use DagaSmart\BizAdmin\Controllers\AdminController;

class SettingController extends AdminController
{
    public function index()
    {
        if ($this->actionOfGetData()) return $this->response()->success(settings()->all());

        $page = $this->basePage()->body([
            amis()->Alert()
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
            ->initApi('/system/settings?_action=getData')
            ->body(
                amis()->Tabs()->tabs([
                    amis()->Tab()->title('基本设置')->body([
                        amis()->TextControl()->label('网站名称')->name('site_name'),
                        amis()->InputKV()->label('附加配置')->name('addition_config'),
                    ]),
                    amis()->Tab()->title('支付设置')->body([
                        // line | card | radio | vertical | chrome | simple | strong | tiled | sidebar
                        amis()->Tabs()->tabsMode('sidebar')->tabs([
                            amis()->Tab()->title('支付宝')->body([
                                amis()->TextControl()->label('网站名称')->name('site_name'),
                                amis()->InputKV()->label('附加配置')->name('addition_config'),
                            ]),






                            amis()->Tab()->title('微信支付')->mode('normal')->body([
                                amis()->TextControl('mch_id','商户号')
                                    ->description('服务商模式下为服务商商户号')
                                    ->width('w-10')
                                    ->required(),
                                amis()->TextControl('mch_secret_key','商户秘钥')
                                    ->description('商户秘钥')
                                    ->required(),
                                amis()->TextControl('mch_secret_cert','商户私钥')
                                    ->description('商户私钥为字符串或路径')
                                    ->required(),
                                amis()->TextControl('mch_public_cert_path','商户公钥')
                                    ->description('商户公钥证书路径')
                                    ->required(),
                                amis()->TextControl('app_id','app移动端app_id')
                                    ->description('app移动端的app_id'),
                                amis()->TextControl('mp_app_id','公众号app_id')
                                    ->description('公众号的app_id'),
                                amis()->TextControl('mini_app_id','小程序app_id')
                                    ->description('小程序的app_id'),

                            ])->className(['p-10' => true]),














                            amis()->Tab()->title('抖音支付')->body([
                                amis()->TextControl()->label('网站名称')->name('site_name'),
                                amis()->InputKV()->label('附加配置')->name('addition_config'),
                            ]),
                            amis()->Tab()->title('银联支付')->body([
                                amis()->TextControl()->label('网站名称')->name('site_name'),
                                amis()->InputKV()->label('附加配置')->name('addition_config'),
                            ]),
                        ]),
                    ]),
                    amis()->Tab()->title('上传设置')->body([
                        amis()->TextControl()->label('上传域名')->name('upload_domain'),
                        amis()->TextControl()->label('上传路径')->name('upload_path'),
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
