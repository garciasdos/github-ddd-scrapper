<?php

declare(strict_types=1);

namespace App\Infrastructure\Symfony\Command;

use App\Application\GetRepositoryCountFromOwnerAndName;
use App\Domain\ValueObject\RepositoryBranch;
use App\Domain\ValueObject\RepositoryName;
use App\Domain\ValueObject\RepositoryOwner;
use Exception;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use function Lambdish\Phunctional\apply;

final class GetClassNamesCommand extends Command
{
    protected static $defaultName = 'app:get-classes-from-repo';

    private GetRepositoryCountFromOwnerAndName $getRepositoryCountFromOwnerAndName;

    public function __construct(GetRepositoryCountFromOwnerAndName $getRepositoryCountFromOwnerAndName)
    {
        parent::__construct();
        $this->getRepositoryCountFromOwnerAndName = $getRepositoryCountFromOwnerAndName;
    }

    protected function configure(): void
    {
        $this
            ->setDescription('Gets the class names from a GitHub PHP repository.')
            ->addArgument('owner/repository', InputArgument::REQUIRED, 'The owner and the name of the repository');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $repositoryOwnerSlashName = $input->getArgument('owner/repository');

        try {
            $repositoryCount = apply($this->getRepositoryCountFromOwnerAndName,
                                [
                                    $repositoryOwnerSlashName,
                                    $repositoryOwnerSlashName,
                                ]
            );
        } catch (Exception $exception) {
            $output->writeln($exception->getMessage());
            return -1;
        }

        echo print_r($repositoryCount);

        return 0;
    }
}
