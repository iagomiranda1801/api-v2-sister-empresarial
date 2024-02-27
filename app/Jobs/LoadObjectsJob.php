<?php

namespace App\Jobs;

use App\Models\Student;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class LoadObjectsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(private $data, private $school)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        
        if(isset($this->data->users)){
            $this->users();
        }

    }

    //Funcao para importa os alunos do equipamento

    private function users()
    {

        foreach ($this->data->users as $user) {

            Student::query()->firstOrCreate(
                ['equipament_id' => $user->id],
                [
                    'school_id' => $this->school,
                    'equipament_id' => $user->id,
                    'name' => $user->name,
                    'enrollment_number' => $user->registration
                ]
            );
        }
    }
}
