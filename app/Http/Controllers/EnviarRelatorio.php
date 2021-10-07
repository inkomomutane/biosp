<?php

namespace App\Http\Controllers;

use App\Mail\EnviarRelatorio as MailEnviarRelatorio;
use App\Models\Neighborhood;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EnviarRelatorio extends Controller
{
    public function enviarRelatorio()
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
        // 'candaamilcar@gmail.com ','cebolax@yahoo.com'
        try {
            foreach (['nelsonmutane@gmail.com'] as $recipient) {
                Mail::to($recipient)->send(new MailEnviarRelatorio($detalhes));
            }

            return 'Success';

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
