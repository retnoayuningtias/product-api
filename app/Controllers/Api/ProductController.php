<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use CodeIgniter\API\ResponseTrait;

class ProductController extends BaseController
{
    use ResponseTrait;

    protected $product;

    public function __construct()
    {
        $this->product = new ProductModel();
    }

    public function index()
    {
        $search = $this->request->getGet('search');
        $limit  = $this->request->getGet('limit') ?? 10;

        $query = $this->product;

        if ($search) {
            $query->like('name', $search);
        }

        $data = $query->paginate($limit);

        return $this->respond([
            'status' => true,
            'data'   => $data,
            'pager'  => $this->product->pager->getDetails()
        ]);
    }

    public function store()
    {
        $data = $this->request->getJSON(true);

        $rules = [
            'name'        => 'required|min_length[3]',
            'description' => 'permit_empty|max_length[255]',
            'price'       => 'required|numeric|greater_than[0]',
            'stock'       => 'required|integer|greater_than_equal_to[0]',
        ];

        if (! $this->validateData($data, $rules)) {
            return $this->failValidationErrors(
                $this->validator->getErrors()
            );
        }

        $this->product->insert($data);

        return $this->respondCreated([
            'status'  => true,
            'message' => 'Product created successfully',
            'data'    => $data
        ]);
    }

    public function update($id)
    {
        $product = $this->product->find($id);

        if (! $product) {
            return $this->failNotFound('Product not found');
        }

        $data = $this->request->getJSON(true);

        if (empty($data)) {
            return $this->fail('No data provided', 400);
        }

        $rules = [
            'name'        => 'permit_empty|min_length[3]',
            'description' => 'permit_empty|max_length[255]',
            'price'       => 'permit_empty|numeric|greater_than[0]',
            'stock'       => 'permit_empty|integer|greater_than_equal_to[0]',
        ];

        if (! $this->validateData($data, $rules)) {
            return $this->failValidationErrors(
                $this->validator->getErrors()
            );
        }

        $this->product->update($id, $data);

        return $this->respond([
            'status'  => true,
            'message' => 'Product updated successfully',
            'data'    => $this->product->find($id)
        ]);
    }

    public function delete($id)
    {
        $product = $this->product->find($id);

        if (! $product) {
            return $this->failNotFound('Product not found');
        }

        $this->product->delete($id);

        return $this->respond([
            'status'  => true,
            'message' => 'Product deleted successfully'
        ]);
    }

    public function trash()
    {
        $data = $this->product->onlyDeleted()->findAll();

        return $this->respond([
            'status' => true,
            'data'   => $data
        ]);
    }

    public function restore($id)
    {
        $product = $this->product->withDeleted()->find($id);

        if (! $product) {
            return $this->failNotFound('Product not found');
        }

        if ($product['deleted_at'] === null) {
            return $this->fail('Product is not deleted');
        }

        $this->product->update($id, [
            'deleted_at' => null
        ]);

        return $this->respond([
            'status'  => true,
            'message' => 'Product restored successfully'
        ]);
    }

    public function forceDelete($id)
    {
        $product = $this->product->withDeleted()->find($id);

        if (! $product) {
            return $this->failNotFound('Product not found');
        }

        $this->product->delete($id, true); 

        return $this->respond([
            'status'  => true,
            'message' => 'Product permanently deleted'
        ]);
    }
}
