<?php

namespace CustomerBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class CustomerWatchBalanceCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('customer:watch-balance')
            ->setDescription('...')
            ->addArgument('balance', InputArgument::REQUIRED, 'Argument description')
            //->addOption('option', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $balance = $input->getArgument('balance');

        $watcher = $this
            ->getContainer()
            ->get('customer.balance_watcher');

        $customers = $watcher
            ->getCustomerWithBalanceLowerThan($balance);

        foreach ($customers as $customer) {
            
            $output->writeln(sprintf(
                '[%d] %s %s',
                $customer->getId(),
                $customer->getFirstName(),
                $customer->getLastName()
            ));
        }
    }

}


