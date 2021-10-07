<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Paymentsds\MPesa\Client;
use Illuminate\Support\Str;

class SendHourlyRaport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:hourly-report';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send report of database data store for my mobile using Mpesa SandBox every 1 hour';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $client = new Client([
            'apiKey' => '83f7zvajuj5dp27aj9fsrcm1py6lqsr4',             // API Key
            'publicKey' => 'MIICIjANBgkqhkiG9w0BAQEFAAOCAg8AMIICCgKCAgEAmptSWqV7cGUUJJhUBxsMLonux24u+FoTlrb+4Kgc6092JIszmI1QUoMohaDDXSVueXx6IXwYGsjjWY32HGXj1iQhkALXfObJ4DqXn5h6E8y5/xQYNAyd5bpN5Z8r892B6toGzZQVB7qtebH4apDjmvTi5FGZVjVYxalyyQkj4uQbbRQjgCkubSi45Xl4CGtLqZztsKssWz3mcKncgTnq3DHGYYEYiKq0xIj100LGbnvNz20Sgqmw/cH+Bua4GJsWYLEqf/h/yiMgiBbxFxsnwZl0im5vXDlwKPw+QnO2fscDhxZFAwV06bgG0oEoWm9FnjMsfvwm0rUNYFlZ+TOtCEhmhtFp+Tsx9jPCuOd5h2emGdSKD8A6jtwhNa7oQ8RtLEEqwAn44orENa1ibOkxMiiiFpmmJkwgZPOG/zMCjXIrrhDWTDUOZaPx/lEQoInJoE2i43VN/HTGCCw8dKQAwg0jsEXau5ixD0GUothqvuX3B9taoeoFAIvUPEq35YulprMM7ThdKodSHvhnwKG82dCsodRwY428kg2xM/UjiTENog4B6zzZfPhMxFlOSFX4MnrqkAS+8Jamhy1GgoHkEMrsT5+/ofjCx0HjKbT5NuA2V/lmzgJLl3jIERadLzuTYnKGWxVJcGLkWXlEPYLbiaKzbJb2sYxt+Kt5OxQqC1MCAwEAAQ==',          // Public Key
            'serviceProviderCode' => '171717' // input_ServiceProviderCode
        ]);
        $paymentData = [
            'from' => '258847607095',       // input_CustomerMSISDN
            'reference' => 'CP900MA457MAF478MU4874IN457'.Str::random(5),      // input_ThirdPartyReference
            'transaction' => Str::random(12), // input_TransactionReference
            'amount' => '5'             // input_Amount
        ];

        try {
            $client->receive($paymentData);
            $this->info('Report sent successful.');
         } catch (\Throwable $th) {
            $this->info('Error sending report.');
         }
    }
}
