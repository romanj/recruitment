<?php
namespace AppBundle\Command;

use AppBundle\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOptionREQUIRED;
use Symfony\Component\Console\Output\OutputInterface;

class ChangeMailCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('app:user:change:email')
            ->setDescription('Change email')
            ->addArgument('id', InputArgument::REQUIRED, 'User id')
            ->addArgument('email', InputArgument::REQUIRED, 'User email')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $id = $input->getArgument('id');
        $email = $input->getArgument('email');

        $repository = new UserRepository();
        $user = $repository->findOne($id);
        $this->getContainer()->get('user_model')->changeEmail($user, $email);

        $output->writeln('Email was changed');
    }
}