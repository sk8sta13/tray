<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Laravel\Lumen\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function() {
            $vendedores = App\Models\Vendedor::selectRaw('vendedores.nome, count(vendas.id) as total_itens_vendidos, sum(comissao) as valor_total_comissao, sum(valor_venda) as valor_total_venda')
                ->join('vendas', 'vendedores.id', 'vendas.vendedor_id')
                ->whereDate('vendas.data_venda', date('Y-m-d'))
                ->groupBy('vendedores.id')
                ->get();

            //return new App\Mail\RelatorioVendasDiarias($vendedores);
            \Mail::to('admdosistema@sistema.com.br')->send(new App\Mail\RelatorioVendasDiarias($vendedores));
        })->dailyAt('20:00');
    }
}
