<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyLogoRequest;
use App\Http\Requests\UpdateCompanyNameRequest;
use App\Services\CompanyService;
use App\Services\ImageService;
use App\User;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    private $companies;
    private $images;

    public function __construct(
        CompanyService $companyService,
        ImageService $imageService
    )
    {
        $this->companies = $companyService;
        $this->images = $imageService;
    }

    public function all()
    {
        $companies = $this->companies->all();

        return view('company.all', compact('companies'));
    }

    public function create()
    {
        return view('company.create');
    }

    public function store(StoreCompanyRequest $request)
    {
        $user = User::find(Auth::user()->id);

        $name = $request->name;
        $logo = $request->file('logo');
        $logoName = $this->images->upload($logo)->getFilename();

        $this->companies->add($name, $logoName, $user->id);

        return redirect('allCompanies');
    }

    public function edit($id)
    {
        $company = $this->companies->find($id);

        return view('company.edit', compact('company'));
    }

    public function updateName(UpdateCompanyNameRequest $request)
    {
        $id = $request->id;
        $name = $request->name;

        $this->companies->updateName($id, $name);

        return redirect('allCompanies');
    }

    public function updateLogo(UpdateCompanyLogoRequest $request)
    {
        $id = $request->id;

        $logoName = $this->companies->find($id)->images;
        $this->images->delete($logoName);

        $newLogoFile = $request->file('logo');
        $logoName = $this->images->upload($newLogoFile)->getFilename();

        $this->companies->updateLogo($id, $logoName);

        return redirect('allCompanies');
    }

    public function delete($id)
    {
        $logoName = $this->companies->find($id)->images;
        $this->images->delete($logoName);
        $this->companies->delete($id);

        return redirect('allCompanies');
    }
}