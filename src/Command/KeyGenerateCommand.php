<?php

declare(strict_types=1);

namespace App\Command;

use sixlive\DotenvEditor\DotenvEditor;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'key-generate',
    description: 'Generate APP_SECRET',
)]
class KeyGenerateCommand extends Command
{
    public function __construct(
        private string $projectDirEnv
    ) {
        parent::__construct($projectDirEnv);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $secret = $this->generateRandomString(25);

        $editor = new DotenvEditor();
        $editor->load($this->projectDirEnv);
        $editor->set('APP_SECRET', $secret);
        $editor->save();

        $io->success('New APP_SECRET was generated: '.$secret);

        return Command::SUCCESS;
    }

    private function generateRandomString(int $length = 16): string
    {
        $permitted_chart = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $random_string = '';

        for ($i = 0; $i < $length; ++$i) {
            $random_character = $permitted_chart[mt_rand(0, $length - 1)];
            $random_string .= $random_character;
        }

        return $random_string;
    }
}
