<?php

namespace App\Services;

use App\Traits\UploadTrait;
use Illuminate\Support\Carbon;
use App\Http\Requests\StoreOrderRequest;
use App\Contracts\Interfaces\OrderInterface;
use App\Base\Interface\Uploads\CustomUploadValidation;
use App\Base\Interface\Uploads\ShouldHandleFileUpload;

class OrderService implements ShouldHandleFileUpload, CustomUploadValidation
{
    private OrderInterface $orderInterface;

    public function __construct(
        OrderInterface $orderInterface,
    ) {
        $this->orderInterface = $orderInterface;
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
        $data['order_date'] = Carbon::now(); // Set tanggal order otomatis jika tidak disediakan

        // ($data);

        $this->orderInterface->create($data);

        return [
            'data' => $data,
        ];
    }

    public function update(StoreOrderRequest $request, $order)
    {
        $data = $request->validated();
        dd($data);
        return ['data' => $data];
    }
}
