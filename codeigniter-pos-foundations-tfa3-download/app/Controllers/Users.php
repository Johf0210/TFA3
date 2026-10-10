<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    private function rules(?int $id = null): array
    {
        $unique = $id === null ? 'is_unique[users.username]' : "is_unique[users.username,id,{$id}]";

        return [
            'username' => "required|alpha_numeric_punct|min_length[3]|max_length[50]|{$unique}",
            'full_name' => 'required|string|min_length[2]|max_length[100]',
        ];
    }

    private function avatarRules(): array
    {
        return [
            'avatar' => 'uploaded[avatar]|is_image[avatar]|mime_in[avatar,image/jpg,image/jpeg,image/png]|max_size[avatar,2048]',
        ];
    }

    public function index(): string
    {
        return view('users/index', ['title' => 'User Accounts', 'users' => (new UserModel())->findAll()]);
    }

    public function createForm(): string
    {
        return view('users/new', ['title' => 'Add User', 'validation' => null]);
    }

    public function create()
    {
        if (! $this->validate($this->rules())) {
            return view('users/new', ['title' => 'Add User', 'validation' => $this->validator]);
        }

        (new UserModel())->insert([
            'username' => trim((string) $this->request->getPost('username')),
            'full_name' => trim((string) $this->request->getPost('full_name')),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('/users')->with('success', 'User added successfully.');
    }

    public function edit(int $id): string
    {
        $user = (new UserModel())->find($id);
        if (! $user) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('User not found.');
        }

        return view('users/edit', ['title' => 'Edit User', 'user' => $user, 'validation' => null]);
    }

    public function update(int $id)
    {
        $model = new UserModel();
        $user = $model->find($id);
        if (! $user) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('User not found.');
        }

        $rules = $this->rules($id);
        $avatar = $this->request->getFile('avatar');
        $hasUpload = $avatar && $avatar->getError() !== UPLOAD_ERR_NO_FILE;
        if ($hasUpload) {
            $rules = array_merge($rules, $this->avatarRules());
        }

        if (! $this->validate($rules)) {
            return view('users/edit', [
                'title' => 'Edit User',
                'user' => array_merge($user, $this->request->getPost()),
                'validation' => $this->validator,
            ]);
        }

        $data = [
            'username' => trim((string) $this->request->getPost('username')),
            'full_name' => trim((string) $this->request->getPost('full_name')),
        ];

        if ($hasUpload && $avatar->isValid() && ! $avatar->hasMoved()) {
            $uploadPath = FCPATH . 'uploads';
            if (! is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            $filename = $avatar->getRandomName();
            $avatar->move($uploadPath, $filename);
            service('image')->withFile($uploadPath . DIRECTORY_SEPARATOR . $filename)
                ->fit(300, 300)
                ->save($uploadPath . DIRECTORY_SEPARATOR . $filename);
            $data['avatar'] = $filename;
        }

        $model->update($id, $data);

        return redirect()->to('/users')->with('success', 'User updated successfully.');
    }
}
