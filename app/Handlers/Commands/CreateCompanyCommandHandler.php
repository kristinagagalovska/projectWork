<?php

namespace app\Handlers\Commands;

use App\Commands\CreateCompanyCommand;
use App\Company;
use app\Repositories\CompanyRepositoryInterface;

class CreateCompanyCommandHandler {

    public function __construct(CompanyRepositoryInterface $companies)
    {
        $this->companies = $companies;
    }

    public function handle(CreateCompanyCommand $command)
    {
        $company = new Company();
        $company->setName($command->getName());
        $company->setUserId($command->getUserId());
        $company->setImage($command->getLogo());
        $this->companies->store($company);
    }
}