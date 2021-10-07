<?php

namespace App\Console\Commands;

use App\Models\Neighborhood;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\EnviarRelatorio as MailEnviarRelatorio;

class SendReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:report';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send report with email to  especific users monthly';

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
        $detalhes = [
            'title' => 'Relatório mensal de Base de Dados Biosp',
            'body' =>
            [
            'Bom dia, espero que esteja bem',

                'Envio em anexo os relatórios de base de dados ' .
                'referentes as datas de  ' . date_format(now(), 'd-M-Y') . ' a ' .
                date_format(now(), 'd-M-Y')

            ], 'bairros' => Neighborhood::whereNotIn('uuid',['3e6816de-ade8-3902-bdb5-11393d32badd'])->get()];

            try {
                foreach (['nelsonmutane@gmail.com'] as $recipient) {
                    Mail::to($recipient)->send(new MailEnviarRelatorio($detalhes));
                }

                $this->info('Email sent successful.');

            } catch (\Throwable $th) {
                $this->info('Fail with send email');
            }
    }
}
