<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ClientCopyStaticFiles extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'client:copystaticfiles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Copy static files from client-app to public";

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire() {        
        $this->info('BEGIN client:copystaticfiles');
        
        // Se esiste la cartella public/static, la cancella e la ricrea
        $publicStaticPath = base_path('public') . '/static';
        if (file_exists($publicStaticPath)) {
            $this->recurseRmdir($publicStaticPath);
        }
        mkdir($publicStaticPath);
        mkdir($publicStaticPath . '/js');
        mkdir($publicStaticPath . '/css');

        // Copia tutti i js
        $scripts = glob(base_path('client-app') . '/dist/static/js/*.*');
        foreach ($scripts as $script) {
            $to = $publicStaticPath . '/js/' . basename($script);
            copy($script, $to);
            $this->info("File: $script copied to: $to");
        }
        
        // Copia tutti i css
        $styles = glob(base_path('client-app') . '/dist/static/css/*.*');
        foreach ($styles as $style) {
            $to = $publicStaticPath . '/css/' . basename($style);
            copy($style, $to);
            $this->info("File: $style copied to: $to");
        }
        
        $this->info('END client:copystaticfiles');
    }

    private function recurseRmdir($dir) {
        $files = array_diff(scandir($dir), array('.', '..'));
        foreach ($files as $file) {
            (is_dir("$dir/$file")) ? $this->recurseRmdir("$dir/$file") : unlink("$dir/$file");
        }
        return rmdir($dir);
    }

}
