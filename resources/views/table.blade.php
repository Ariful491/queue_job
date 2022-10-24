<tr>
    <td>{{$item->id}}</td>
    <td>{{$item->title}}</td>
    <td>{{$item->category->title}}</td>
    <td>{{$item->product_type}}</td>
    @foreach($item->productVariant as $index=>$variant)
        <td>{{$variant->name}}</td>
        <td>{{$variant->value}}</td>
        <td class="text-end">{{$variant->sku}}</td>
        <td class="text-end">{{$variant->barcode}}</td>
        <td class="text-end">{{$variant->price}}</td>
    @endforeach
</tr>
