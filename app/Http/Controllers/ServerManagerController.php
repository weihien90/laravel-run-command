<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateServerConfigRequest;
use Illuminate\Http\JsonResponse;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class ServerManagerController extends Controller
{
    public function updateConfig(UpdateServerConfigRequest $request): JsonResponse
    {
        $process = new Process([
            config('server-manager.binary'),
            "-total-memory={$request->total_memory}",
            "-memory-limit={$request->memory_limit}",
            "-storage-limit={$request->storage_limit}"
        ]);
        $process->run();

        // executes after the command finishes
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        return response()->json(['output' => $process->getOutput()]);
    }
}
