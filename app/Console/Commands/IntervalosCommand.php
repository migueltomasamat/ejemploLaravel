<?php

namespace App\Console\Commands;

use App\Models\Intervalo;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class IntervalosCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'intervalo:borrar';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Borrar todos los intervalos del día a las 00:00';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $intervalosDiarios = DB::table('intervalos')->whereDate('fecha_hora_inicio',Carbon::yesterday()->toDateString())->get('id');
        foreach ($intervalosDiarios as $ids){
            $inter=Intervalo::find($ids->id);
            $inter->delete();
        }

        return Command::SUCCESS;
    }
}
