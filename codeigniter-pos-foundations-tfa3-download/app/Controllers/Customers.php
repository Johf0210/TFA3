<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class Customers extends BaseController
{
    private function rules(): array
    {
        return [
            'full_name' => 'required|string|min_length[2]|max_length[100]',
            'email' => 'required|valid_email|max_length[100]',
            'phone' => 'permit_empty|max_length[20]|regex_match[/^[0-9+()\- .]+$/]',
        ];
    }

    public function index(): string
    {
        return view('customers/index', [
            'title' => 'Customer Accounts',
            'customers' => (new CustomerModel())->findAll(),
        ]);
    }

    public function createForm(): string
    {
        return view('customers/new', ['title' => 'Add Customer', 'validation' => null]);
    }

    public function create()
    {
        if (! $this->validate($this->rules())) {
            return view('customers/new', ['title' => 'Add Customer', 'validation' => $this->validator]);
        }

        (new CustomerModel())->insert([
            'full_name' => trim((string) $this->request->getPost('full_name')),
            'email' => trim((string) $this->request->getPost('email')),
            'phone' => trim((string) $this->request->getPost('phone')) ?: null,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('/customers')->with('success', 'Customer added successfully.');
    }

    public function edit(int $id): string
    {
        $customer = (new CustomerModel())->find($id);
        if (! $customer) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Customer not found.');
        }

        return view('customers/edit', ['title' => 'Edit Customer', 'customer' => $customer, 'validation' => null]);
    }

    public function update(int $id)
    {
        $model = new CustomerModel();
        $customer = $model->find($id);
        if (! $customer) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Customer not found.');
        }

        if (! $this->validate($this->rules())) {
            return view('customers/edit', [
                'title' => 'Edit Customer',
                'customer' => array_merge($customer, $this->request->getPost()),
                'validation' => $this->validator,
            ]);
        }

        $model->update($id, [
            'full_name' => trim((string) $this->request->getPost('full_name')),
            'email' => trim((string) $this->request->getPost('email')),
            'phone' => trim((string) $this->request->getPost('phone')) ?: null,
        ]);

        return redirect()->to('/customers')->with('success', 'Customer updated successfully.');
    }
}
