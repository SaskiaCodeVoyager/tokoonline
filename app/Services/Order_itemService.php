<?php

namespace App\Services;

use App\Traits\UploadTrait;
use Illuminate\Support\Carbon;
use App\Http\Requests\StoreOrder_itemRequest;
use App\Contracts\Interfaces\Order_itemInterface;
use App\Base\Interface\Uploads\CustomUploadValidation;
use App\Base\Interface\Uploads\ShouldHandleFileUpload;

class OrderItemService implements ShouldHandleFileUpload, CustomUploadValidation
{
    private Order_itemInterface $orderItemInterface;

    public function __construct(
        Order_itemInterface $orderItemInterface,
    ) {
        $this->orderItemInterface = $orderItemInterface;
    }

    use UploadTrait;

    public function validateAndUpload(string $disk, object $file, string $old_file = null): string
    {
        if ($old_file) $this->remove($old_file);
        return $this->upload($disk, $file);
    }

    public function store(StoreOrder_itemRequest $request): array
    {
        $data = $request->validated();
        $this->orderItemInterface->create($data);

        return [
            'data' => $data,
        ];
    }

    public function update(StoreOrder_itemRequest $request, $orderItem)
    {
        $data = $request->validated();
        return ['data' => $data];
    }
}