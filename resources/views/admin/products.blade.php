<x-app-layout>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Product List</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped" data-toggle="data-table">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Sale Price</th>
                                    <th>Action</th> {{-- ✅ New Action Column --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>
                                            <img src="{{ asset($product->image ?? 'images/missing.png') }}"
                                                alt="{{ $product->name }}" class="img-fluid rounded"
                                                style="width: 80px; height: auto;"
                                                onerror="this.onerror=null;this.src='{{ asset('images/missing.png') }}';">
                                        </td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ Str::limit($product->description, 50) }}</td>
                                        <td>₱{{ number_format($product->price, 2) }}</td>
                                        <td>
                                            @if($product->sale_price)
                                                <span class="text-danger">₱{{ number_format($product->sale_price, 2) }}</span>
                                            @else
                                                <span class="text-muted">—</span>
                                            @endif
                                        </td>
                                        <td> {{-- ✅ Action Buttons --}}
                                            <a href="{{ route('products.edit', $product->id) }}"
                                                class="btn btn-sm btn-primary">
                                                Edit
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Sale Price</th>
                                    <th>Action</th> {{-- ✅ Action Footer --}}
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>