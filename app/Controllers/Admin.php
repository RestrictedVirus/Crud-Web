<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Admin extends BaseController
{
    public function dashboard()
    {
        $model = new ProductModel();

        $data['product'] = $model->paginate(4);
        $data['pager'] = $model->pager;

        return view('admin/dashboard', $data);
    }

    
    public function addproduct()
    {
        $model = new ProductModel();

        // Check if the request method is POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'id' => $this->request->getPost('id'),
                'product_name' => $this->request->getPost('product_name'),
                'unit' => $this->request->getPost('unit'),
                'quantity' => $this->request->getPost('quantity'),
                'price' => $this->request->getPost('price')
            ];

            // Insert the data into the database
            $model->insert($data);

            return redirect()->to('/admin/dashboard');
        }
    }
    // Old METHOD
    public function update_product()
    {
        $model = new ProductModel();
        if ($this->request->getMethod() == 'post') {
            $model->save([
                'id' => $this->request->getPost('id'),
                'product_name' => $this->request->getPost('product_name'),
                'unit' => $this->request->getPost('unit'),
                'quantity' => $this->request->getPost('quantity'),
                'price' => $this->request->getPost('price')
            ]);
            return redirect()->to('/admin/dashboard');
        }
    }
    public function delete_product()
    {
        $model = new ProductModel();
        if ($this->request->getMethod() == 'post') {
            $model->delete($this->request->getPost('id'));
            return redirect()->to('/admin/dashboard');
        }
    }
}
