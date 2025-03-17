<?php


namespace App\Services;

use App\Traits\UploadTrait;
use App\Enums\ImageDiskEnum;
use App\Enums\UploadDiskEnum;
use Illuminate\Support\Carbon;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Support\Facades\Request;
use App\Contracts\Interfaces\ProductInterface;
use App\base\Interface\Uploads\CustomUploadValidation;
use App\base\Interface\Uploads\ShouldHandleFileUpload;

class ProductService implements ShouldHandleFileUpload, CustomUploadValidation
{
    private ProductInterface $productInterface;

    public function __construct(
        ProductInterface $product_interface,
    ) {
        $this->productInterface = $product_interface;
    }


    use UploadTrait;

    public function validateAndUpload(string $disk, object $file, string $old_file = null): string
    {
        if ($old_file) $this->remove($old_file);

        return $this->upload($disk, $file);
    }



    public function store(StoreProductRequest $request): array
    {

        // dd($request->all());

        $data = $request->validated();
        $start = Carbon::parse($request->start_time);
        $end = Carbon::parse($request->end_time);
        $data['duration'] = $start->diffInMinutes($end);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $data['photos'] = $path;
        } else {
            $data['photos'] = null; // Set default NULL jika tidak ada gambar
        }

        return [
            'data' => $data,
        ];
    }

    public function update(StoreProductRequest $request, $product)
{
    $data = $request->validated();
    return ['data' => $data];
}

}
