<?php

use DagaSmart\BizAdmin\Admin;

$msgBtn = amis()
    ->Icon()
    ->icon('far fa-bell')
    ->className('text-xl mr-5')
    ->style(['color'=>'var(--button-link-default-font-color)'])
    ->badge(['mode' => 'text', 'position' => 'top-left', 'text' => '10'])
    ->onEvent([
        'click' => [
            'actions' => [
                amis()
                    ->DrawerAction()
                    ->drawer(
                        amis()
                            ->Drawer()
                            ->resizable(false)
                            ->closeOnEsc()
                            ->showCloseButton(false)
                            ->closeOnOutside()
                            ->title(false)
                            ->headerClassName(false)
                            ->bodyClassName('bg-gray-100 p-0 overflow-hidden')
                            ->actions()
                            ->body([
                                amis()
                                    ->Tabs()
                                    ->draggable()
                                    ->tabsMode('chrome')
                                    ->tabs([
                                        // 系统消息
                                        amis()->Tab()->title('系统消息')->body([
                                            amis()->Page()
                                                ->style([
                                                    'padding'=>'none',
                                                    'height' => 'calc(100vh - 91px)',
                                                    'border-color' => 'var(--colors-brand-6)',
                                                    'overflow' => 'hidden'
                                                ])
                                                ->className('rounded-xl border border-blue-500 border-dashed')
                                                ->body([
                                                    amis()->Card()
                                                        ->style(['height' => 'calc(100vh - 91px)'])
                                                        ->className('border-0 overflow-y-auto')
                                                        ->body([
                                                            amis()->GroupControl()->direction('vertical')->body([
                                                                amis()->Alert()
                                                                    ->level('warning')
                                                                    ->className('mb-3')
                                                                    ->showIcon()
                                                                    ->showCloseButton()
                                                                    ->title('标题')
                                                                    ->actions([
                                                                        amis()->button()
                                                                            ->label('查看详情')
                                                                            ->size('xs')
                                                                            ->level('link')
                                                                            ->style([
                                                                                'position'=>'relative',
                                                                                'top'=>'40px',
                                                                                'left'=>'30px'
                                                                            ])
                                                                    ])
                                                                    ->body(['创建成功']),

                                                                amis()->Alert()
                                                                    ->level('success')
                                                                    ->className('mb-3')
                                                                    ->showIcon()
                                                                    ->showCloseButton()
                                                                    ->title('标题')
                                                                    ->actions([
                                                                        amis()->button()
                                                                            ->label('查看详情')
                                                                            ->size('xs')
                                                                            ->level('link')
                                                                            ->style([
                                                                                'position'=>'relative',
                                                                                'top'=>'40px',
                                                                                'left'=>'30px'
                                                                            ])
                                                                    ])
                                                                    ->body(['创建成功']),

                                                                amis()->Alert()
                                                                    ->level('info')
                                                                    ->className('mb-3')
                                                                    ->showIcon()
                                                                    ->showCloseButton()
                                                                    ->title('标题')
                                                                    ->actions([
                                                                        amis()->button()
                                                                            ->label('查看详情')
                                                                            ->size('xs')
                                                                            ->level('link')
                                                                            ->style([
                                                                                'position'=>'relative',
                                                                                'top'=>'40px',
                                                                                'left'=>'30px'
                                                                            ])
                                                                    ])
                                                                    ->body(['创建成功']),

                                                                amis()->Alert()
                                                                    ->level('danger')
                                                                    ->className('mb-3')
                                                                    ->showIcon()
                                                                    ->icon('fa fa-home')
                                                                    ->showCloseButton()
                                                                    ->title('标题')
                                                                    ->actions([

                                                                        amis()->flex()
                                                                            ->justify('flex-start')
                                                                            ->alignItems('flex-start')
                                                                            ->direction('column')
                                                                            ->style(['padding'=>'6px'])
                                                                            ->items([
                                                                                amis()->button()
                                                                                    ->label('详情')
                                                                                    ->size('xs')
                                                                                    ->level('primary')
                                                                                    ->style([
                                                                                        'position'=>'relative',
                                                                                        'top'=>'30px',
                                                                                        'left'=>'30px'
                                                                                    ]),
                                                                            ])
                                                                    ])
                                                                    ->body(['创建成功']),

                                                                amis()->Alert()->className('bg-gray-50 border-gray-200 border-dashed shadow-md')->body('任务名称'),
                                                                amis()->Alert()->className('bg-gray-50 border-gray-200 border-dashed shadow-md')->body('任务名称'),
                                                                amis()->Alert()->className('bg-gray-50 border-gray-200 border-dashed shadow-md')->body('任务名称'),
                                                                amis()->Alert()->className('bg-gray-50 border-gray-200 border-dashed shadow-md')->body('任务名称'),
                                                                amis()->Alert()->className('bg-gray-50 border-gray-200 border-dashed shadow-md')->body('任务名称'),
                                                                amis()->Alert()->className('bg-gray-50 border-gray-200 border-dashed shadow-md')->body('任务名称'),
                                                            ]),
                                                        ]),
                                                ]),
                                        ]),
                                        // 站内消息
                                        amis()->Tab()->title('站内消息')->body([
                                            amis()->Page()
                                                ->style(['padding'=>'none','height' => 'calc(100vh - 91px)', 'overflow' => 'hidden'])
                                                ->className('rounded-xl border border-blue-500 border-dashed')
                                                ->body([
                                                    amis()->Card()
                                                        ->style(['height' => 'calc(100vh - 91px)'])
                                                        ->className('border-0 overflow-y-auto')
                                                        ->body([
                                                            amis()->GroupControl()->direction('vertical')->body([
                                                                amis()->Alert()
                                                                    ->level('warning')
                                                                    ->className('mb-3')
                                                                    ->showIcon()
                                                                    ->showCloseButton()
                                                                    ->title('标题')
                                                                    ->actions([
                                                                        amis()->button()
                                                                            ->label('查看详情')
                                                                            ->size('xs')
                                                                            ->level('link')
                                                                            ->style([
                                                                                'position'=>'relative',
                                                                                'top'=>'40px',
                                                                                'left'=>'30px'
                                                                            ])
                                                                    ])
                                                                    ->body(['创建成功']),

                                                                amis()->Alert()
                                                                    ->level('success')
                                                                    ->className('mb-3')
                                                                    ->showIcon()
                                                                    ->showCloseButton()
                                                                    ->title('标题')
                                                                    ->actions([
                                                                        amis()->button()
                                                                            ->label('查看详情')
                                                                            ->size('xs')
                                                                            ->level('link')
                                                                            ->style([
                                                                                'position'=>'relative',
                                                                                'top'=>'40px',
                                                                                'left'=>'30px'
                                                                            ])
                                                                    ])
                                                                    ->body(['创建成功']),

                                                                amis()->Alert()
                                                                    ->level('info')
                                                                    ->className('mb-3')
                                                                    ->showIcon()
                                                                    ->showCloseButton()
                                                                    ->title('标题')
                                                                    ->actions([
                                                                        amis()->button()
                                                                            ->label('查看详情')
                                                                            ->size('xs')
                                                                            ->level('link')
                                                                            ->style([
                                                                                'position'=>'relative',
                                                                                'top'=>'40px',
                                                                                'left'=>'30px'
                                                                            ])
                                                                    ])
                                                                    ->body(['创建成功']),

                                                                amis()->Alert()
                                                                    ->level('danger')
                                                                    ->className('mb-3')
                                                                    ->showIcon()
                                                                    ->icon('fa fa-home')
                                                                    ->showCloseButton()
                                                                    ->title('标题')
                                                                    ->actions([

                                                                        amis()->flex()
                                                                            ->justify('flex-start')
                                                                            ->alignItems('flex-start')
                                                                            ->direction('column')
                                                                            ->style(['padding'=>'6px'])
                                                                            ->items([
                                                                                amis()->button()
                                                                                    ->label('详情')
                                                                                    ->size('xs')
                                                                                    ->level('primary')
                                                                                    ->style([
                                                                                        'position'=>'relative',
                                                                                        'top'=>'30px',
                                                                                        'left'=>'30px'
                                                                                    ]),
                                                                            ])
                                                                    ])
                                                                    ->body(['创建成功']),

                                                                amis()->Alert()->className('bg-gray-50 border-gray-200 border-dashed shadow-md')->body('任务名称'),
                                                                amis()->Alert()->className('bg-gray-50 border-gray-200 border-dashed shadow-md')->body('任务名称'),
                                                                amis()->Alert()->className('bg-gray-50 border-gray-200 border-dashed shadow-md')->body('任务名称'),
                                                                amis()->Alert()->className('bg-gray-50 border-gray-200 border-dashed shadow-md')->body('任务名称'),
                                                                amis()->Alert()->className('bg-gray-50 border-gray-200 border-dashed shadow-md')->body('任务名称'),
                                                                amis()->Alert()->className('bg-gray-50 border-gray-200 border-dashed shadow-md')->body('任务名称'),
                                                            ]),
                                                        ]),
                                                ]),
                                        ]),
                                    ])
                            ])
                    )
            ]

        ]
    ]);

// 追加到已有按钮前
Admin::prependNav($msgBtn);
