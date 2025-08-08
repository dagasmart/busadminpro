<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use DagaSmart\BizAdmin\Controllers\AdminController;
use DagaSmart\BizAdmin\Models\AdminRole;
use Exception;
use Generator;
use GuzzleHttp\Promise\Promise;
use GuzzleHttp\Promise\RejectedPromise;
use GuzzleHttp\Promise\Utils;
use Illuminate\Support\Facades\DB;
use Tpetry\PostgresqlEnhanced\Support\Facades\Schema;
use Yansongda\Pay\Pay;


//use PhpMqtt\Client\Facades\MQTT;

class TestController extends Controller
{

    public function index()
    {

        Pay::config(config('pay'));

        return Pay::alipay()->h5([
            'out_trade_no' => time(),
            'total_amount' => '0.01',
            'subject' => 'yansongda 测试 - 01',
            'quit_url' => 'https://yansongda.cn',
        ]);


//        $order = [
//            'out_trade_no' => time(),
//            'description' => 'subject-测试',
//            'amount' => [
//                'total' => 1,
//            ],
//        ];
//
//        $result = Pay::wechat()->scan($order);
//
//        echo $result;
//        die;

        $order = [
            'out_trade_no' => time(),
            'description' => 'subject-测试',
            'amount' => [
                'total' => 0.01,
                'currency' => 'CNY',
            ],
            'payer' => [
                'openid' => 'oSFQ95GbH68yh99WgivJM6oKVnXg',
            ]
        ];

        $result = Pay::wechat()->web($order);


        dump($result);die;




        $order = [
            'order_no' => 'WX'.time(),
            'subject' => '测试商品',
            'amount' => 0.01, // 测试金额
            'openid' => 'affs23245',
        ];

        $res = admin_pay()->alipay($order);

        dump($res);die;

        Pay::config(config('pay'));
        $result = Pay::alipay()->scan([
            'out_trade_no' => time(),
            'total_amount' => '0.01',
            'subject' => 'yansongda 测试 - 01',
        ]);

        return $result->qr_code; // 二维码 url



        // 获取默认数据库连接的名称
        $connectionName = DB::getDefaultConnection();

        // 获取数据库连接管理器实例
        $resolver = app('db');

        // 通过连接名称获取数据库连接实例
        $connection = $resolver->connection($connectionName);

        // 获取连接实例中的配置信息
        $connectionConfig = $connection->getConfig();

        dd($connectionName);




        $s = "'abc'::smallint";
        preg_match("/('.*')/i", $s, $match);
        str_replace("'", null, current($match));
        var_dump($match);
        var_dump(str_replace("'", null, current($match)));
        var_dump(is_numeric(str_replace("'", null, current($match))));
        die;

        $promise = new Promise();

        $promise
            ->then(function ($value) {
                dump("第一步：处理值 - " . $value);
                // 返回一个新的Promise，可以继续链式调用
                $nextPromise = new Promise();
                $nextPromise->resolve($value . ' -> 第二步');
                return $nextPromise;
            })
            ->then(function ($value) {
                dump("第二步：处理值 - " . $value);
                // 模拟一个错误
                return new RejectedPromise('第二步操作失败！');
            })
            ->then(
                function ($value) {
                    dump("第三步：处理值 - " . $value); // 这不会被执行
                },
                function ($reason) {
                    dump("错误处理：捕获到拒绝原因 - " . $reason);
                    // 错误处理后可以返回一个值，让链条恢复正常
                    return '错误已恢复';
                }
            )
            ->then(function ($value) {
                dump("第四步：处理恢复后的值 - " . $value);
            });

        dump("开始执行Promise链...");
        $promise->resolve('初始数据xxxxxxxxxxxxxx'); // 触发Promise链
        $promise->wait(); // 同步等待所有链式操作完成
        dump("Promise链执行完毕。");




        die;















        // 查询没有关联订单的用户
        $usersWithoutOrders = AdminRole::whereDoesntHave('children')->where('')->get()->toArray();
        dump($usersWithoutOrders);die;
// 查询具有至少一个关联订单且订单状态为"completed"的用户
        $usersWithOrders = User::whereHas('orders', function ($query) {
            $query->where('status', 'completed');
        })->get();

        die;



        Pay::config(config('pay'));
        $result = Pay::alipay()->scan([
            'out_trade_no' => time(),
            'total_amount' => '0.01',
            'subject' => 'yansongda 测试 - 01',
        ]);
        dump($result);
        return $result->qr_code; // 二维码 url

        $result = Pay::alipay(config('pay'))->web([
            'out_trade_no' => time(),
            'total_amount' => '0.01',
            'subject' => 'yansongda 测试 - 01',
        ]);

        return $result->qr_code; // 二维码 url


//        // 支付宝支付
//        $order = [
//            'out_trade_no' => time(),
//            'total_amount' => '0.01',
//            'subject' => '测试订单',
//        ];
//        Pay::config($this->config);
//        $alipay = Pay::alipay()->web($order);
//        return $alipay; // 跳转到支付宝

//        // 微信支付
//        $order = [
//            'out_trade_no' => time(),
//            'body' => '测试订单',
//            'total_fee' => 1, // 单位：分
//            'openid' => '用户openid',
//        ];
//
//        $wechat = Pay::wechat()->mp($order);
//        return $wechat;





        $directory = base_path();
        clear_file_utf8bom($directory);

        die;

        $view_table = 'vm_demo_log';
        Schema::dropMaterializedViewIfExists($view_table);
        $sql = "SELECT updated_at::date as curdate, method, count(*) count FROM admin_operation_log GROUP BY curdate,method ORDER BY curdate";
        Schema::createMaterializedView($view_table, $sql, withData: true); //创建物化视图带数据
        Schema::refreshMaterializedView($view_table, withData: true); //刷新物化视图
        //Schema::refreshMaterializedView($view_table, concurrently: true);

        dump(trim('"123423423"','"'));
        echo 11111;die;
        //MQTT::publish('some/topic', 'Hello World!');
    }

    public function schoolOrderQuery()
    {
        header('Content-Type: text/event-stream'); //实时流输出
        header('Cache-Control: no-cache'); //不缓存数据
        header('X-Accel-Buffering: no'); // 不缓存数据

        $i = 0;
        foreach($this->schoolOrderGenerator() as $item) {
            $i++;
            echo "第{$i}条" . $item . PHP_EOL;
            if (ob_get_level() > 0) {

            }
            flush(); // 确保内容即时发送到浏览器
            ob_flush(); // 清空输出缓冲区
        }
        ob_end_clean(); //清除缓存
        die;//必须有，否则会输出header头信息
    }

    public function schoolOrderGenerator(): Generator
    {

        $rows = Db::query('school_order_none_co a')->alias('a')
            ->join('school b', 'a.school_id=b.id')
            ->whereNull('buyer_user_id')->field('a.id,a.out_trade_no,b.app_auth_token')->cursor();
        if ($rows) {
            foreach ($rows as $row) {
                $data = $this->alipayTradeQueryNotify($row);
                if ($data && $data['code'] == 10000) {
                    $upd = [];
                    $upd['total_amount'] = $data['total_amount'];
                    $upd['buyer_user_id'] = $data['buyer_user_id'];
                    Db::name('school_order_none_co')->where(['id'=>$row['id']])->update($upd);
                    yield $row['out_trade_no'] . '成功';
                    //yield json_encode($data, JSON_UNESCAPED_UNICODE);
                } else {
                    yield $row['out_trade_no'] . '失败';
                }
            }
        }
    }

    /**
     * 查询刷脸订单回调
     * @param $data
     * @return array
     * @throws Exception
     */
    private function alipayTradeQueryNotify($data): array
    {
        $app_auth_token = $data['app_auth_token'];
        if (!$app_auth_token) {
            return ['code'=>0, 'message'=>'学校授权码token不存在', 'data'=>[]];
        }

        $alipay = new AlipayController;
        // 初始化SDK
        $alipayClient = new AopClient($alipay->getAlipayConfig());

        // 构造请求参数以调用接口
        $request = new AlipayTradeQueryRequest();

        $model = [
            'out_trade_no' => $data['out_trade_no']
        ];

        $request->setBizContent(json_encode($model, JSON_UNESCAPED_UNICODE));
        // 如果是第三方代调用模式，请设置app_auth_token（应用授权令牌）
        $responseResult = $alipayClient->execute($request, null, $app_auth_token, null);

        $responseApiName = str_replace(".", "_", $request->getApiMethodName()) . "_response";
        $response = (array) $responseResult->$responseApiName;
        return $response;
    }

    public function refundQuery()
    {
        $school_id = request()->get('school_id') ?? null;
        $app_auth_token = request()->get('app_auth_token') ?? null;
        $out_trade_no = request()->get('out_trade_no') ?? null;
        $trade_no = request()->get('trade_no') ?? null;
        if (!$app_auth_token) {
            if (!$school_id) {
                $school_id = Db::name('school_order')->where('out_trade_no', $out_trade_no)->value('school_id');
            }
            $app_auth_token = Db::name('school')->where('id', $school_id)->value('app_auth_token');
        }


        $alipay = new AlipayController;
        // 初始化SDK
        $alipayClient = new AopClient($alipay->getAlipayConfig());

        $request = new AlipayTradeFastpayRefundQueryRequest();
        $model = array();

        // 设置支付宝交易号
        $model['trade_no'] = $trade_no;
        // 设置商户订单号
        $model['out_trade_no'] = $out_trade_no;
        // 设置退款请求号
        $model['out_request_no'] = "HZ01RF001";

        // 设置查询选项
        $queryOptions = array();
        $queryOptions[] = "gmt_refund_pay";
        $model['query_options'] = $queryOptions;

        $request->setBizContent(json_encode($model,JSON_UNESCAPED_UNICODE));
        // 如果是第三方代调用模式，请设置app_auth_token（应用授权令牌）
        $responseResult = $alipayClient->execute($request, null, $app_auth_token, null);
        $responseApiName = str_replace(".","_",$request->getApiMethodName())."_response";
        $response = $responseResult->$responseApiName;
        dump($response);
        if(!empty($response->code)&&$response->code==10000){
            echo("调用成功");
        }
        else{
            echo("调用失败");
        }
    }


}
