<?php

namespace App\Services;

use App\Traits\UploadTrait;
use Illuminate\Support\Carbon;
use App\Http\Requests\StoreOrderRequest;
use App\Contracts\Interfaces\CartInterface;
use App\Base\Interface\Uploads\CustomUploadValidation;
use App\Base\Interface\Uploads\ShouldHandleFileUpload;

class CartService implements ShouldHandleFileUpload, CustomUploadValidation
{
    private CartInterface $cartInterface;

    public function __construct(
        CartInterface $cartInterface
    ) {
        $this->cartInterface = $cartInterface; // Perbaikan di sini
    }

    use UploadTrait;

    public function validateAndUpload(string $disk, object $file, string $old_file = null): string
    {
        if ($old_file) $this->remove($old_file);
        return $this->upload($disk, $file);
    }

    public function store(StoreOrderRequest $request): array
    {
        $data = $request->validated();
        // $data['order_date'] = Carbon::now(); // Set tanggal order otomatis jika tidak disediakan

        // ($data);

        $this->cartInterface->create($data);

        return [
            'data' => $data,
        ];
    }

    // public function update(StoreOrderRequest $request, $order)
    // {
    //     $data = $request->validated();
    //     dd($data);
    //     return ['data' => $data];
    // }
}