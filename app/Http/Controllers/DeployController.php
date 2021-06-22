<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;

class DeployController extends Controller
{
    public function deploy(Request $request)
    {
        return 'hola';
        // $githubPayload = $request->getContent();
        // $githubHash = $request->header('X-Hub-Signature');
 
        // $localToken = config('app.deploy_secret');
        // $localHash = 'sha1=' . hash_hmac('sha1', $githubPayload, $localToken, false);
        // if (hash_equals($githubHash, $localHash)) {
        //     $root_path = base_path();
        //     // $process = new Process('cd ' . $root_path . '; ./deploy.sh');
        //     // $process = new Process('cd /root/web-app || git pull');
        //     $process = new Process('git -c /root/web-app/ pull origin master');
        //     $process->run(function ($type, $buffer) {
        //         echo $buffer;
        //     });
        // }
    }
}
