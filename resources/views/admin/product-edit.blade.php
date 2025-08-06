<x-app-layout :assets="$assets ?? []">
    <div>
        @php
            $id = $id ?? null;
        @endphp

        @if(isset($id))
            {!! Form::model($product, ['route' => ['products.update', $id], 'method' => 'patch', 'enctype' => 'multipart/form-data']) !!}
        @else
            {!! Form::open(['route' => ['product.store'], 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
        @endif

        <div class="row">
            {{-- Sidebar --}}
            <div class="col-xl-3 col-lg-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">{{ $id ? 'Update' : 'Add' }} Product</h4>
                        </div>
                    </div>
                    <div class="card-body">

                        {{-- Product Image --}}
                        <div class="form-group">
                            <div class="profile-img-edit position-relative text-center">
                                @php
                                    $imagePath = isset($product) && $product->image ? asset($product->image) : null;
                                @endphp

                                <div class="profile-img-edit position-relative text-center">
                                    <div class="position-relative d-inline-block">
                                        <img id="imagePreview" src="{{ $imagePath ?? asset('images/missing.png') }}"
                                            alt="Product Image" class="profile-pic rounded img-fluid mb-2"
                                            style="width: 120px; height: auto; object-fit: cover;">

                                        {{-- X button to delete image --}}
                                        @if($imagePath)
                                            <button type="button" id="removeImageBtn"
                                                class="btn btn-sm btn-danger position-absolute top-0 end-0"
                                                style="transform: translate(50%, -50%);">
                                                &times;
                                            </button>
                                        @endif
                                    </div>

                                    {{-- Upload --}}
                                    <div class="upload-icone bg-primary mx-auto mt-2">
                                        <svg class="upload-button" width="14" height="14" viewBox="0 0 24 24">
                                            <path fill="#ffffff"
                                                d="M14.06,9L15,9.94L5.92,19H5V18.08L14.06,9M17.66,3C17.41,3 17.15,3.1 16.96,3.29L15.13,5.12L18.88,8.87L20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18.17,3.09 17.92,3 17.66,3M14.06,6.19L3,17.25V21H6.75L17.81,9.94L14.06,6.19Z" />
                                        </svg>
                                        <input class="file-upload" type="file" name="image" accept="image/*"
                                            id="imageInput">
                                    </div>

                                    {{-- Hidden flag to remove image --}}
                                    <input type="hidden" name="remove_image" id="removeImage" value="0">
                                </div>

                                <div class="upload-icone bg-primary mx-auto mt-2" style="cursor: pointer;"
                                    id="customUploadTrigger">
                                    <svg class="upload-button" width="14" height="14" viewBox="0 0 24 24">
                                        <path fill="#ffffff"
                                            d="M14.06,9L15,9.94L5.92,19H5V18.08L14.06,9M17.66,3C17.41,3 17.15,3.1 16.96,3.29L15.13,5.12L18.88,8.87L20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18.17,3.09 17.92,3 17.66,3M14.06,6.19L3,17.25V21H6.75L17.81,9.94L14.06,6.19Z" />
                                    </svg>
                                </div>

                            </div>
                            <div class="img-extension mt-3 text-center">
                                <span>Only</span>
                                <a href="#">.jpg</a>,
                                <a href="#">.png</a>,
                                <a href="#">.jpeg</a>
                                <span>allowed</span>
                            </div>
                        </div>

                        {{-- Slug Preview --}}
                        @if($id)
                            <div class="form-group mt-4">
                                <label class="form-label">Slug</label>
                                <input type="text" value="{{ $product->slug }}" class="form-control" readonly>
                            </div>
                        @endif

                    </div>
                </div>
            </div>

            {{-- Main Form --}}
            <div class="col-xl-9 col-lg-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">{{ $id ? 'Update' : 'New' }} Product Info</h4>
                        </div>
                        <div class="card-action">
                            <a href="{{ route('admin.products') }}" class="btn btn-sm btn-primary">Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="new-user-info">
                            <div class="row">
                                {{-- Name --}}
                                <div class="form-group col-md-6">
                                    <label class="form-label">Product Name <span class="text-danger">*</span></label>
                                    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter product name', 'required']) }}
                                </div>

                                {{-- Price --}}
                                <div class="form-group col-md-3">
                                    <label class="form-label">Price (₱) <span class="text-danger">*</span></label>
                                    {{ Form::number('price', null, ['class' => 'form-control', 'step' => '0.01', 'placeholder' => 'e.g. 99.99', 'required']) }}
                                </div>

                                {{-- Sale Price --}}
                                <div class="form-group col-md-3">
                                    <label class="form-label">Sale Price (₱)</label>
                                    {{ Form::number('sale_price', null, ['class' => 'form-control', 'step' => '0.01', 'placeholder' => 'e.g. 79.99']) }}
                                </div>

                                {{-- Description --}}
                                <div class="form-group col-md-12">
                                    <label class="form-label">Description <span class="text-danger">*</span></label>
                                    {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => 5, 'placeholder' => 'Enter product description', 'required']) }}
                                </div>
                            </div>

                            {{-- Tags (optional) --}}
                            <div class="form-group">
                                <label class="form-label">Tags</label>
                                <input type="text" name="tags" class="form-control"
                                    placeholder="Comma-separated (e.g. mint, refreshing, mojito)"
                                    value="{{ old('tags', is_array(json_decode($product->tags)) ? implode(', ', json_decode($product->tags)) : $product->tags ?? '') }}">
                            </div>



                            {{-- Availability Status (optional for UI) --}}
                            <div class="form-group mt-3">
                                <label class="form-label">Availability</label>
                                <div class="d-flex gap-4">
                                    <div class="form-check">
                                        {{ Form::radio('availability', 'in-stock', $product->availability === 'in-stock' ?? true, ['class' => 'form-check-input', 'id' => 'in-stock']) }}
                                        <label class="form-check-label" for="in-stock">In Stock</label>
                                    </div>
                                    <div class="form-check">
                                        {{ Form::radio('availability', 'out-of-stock', $product->availability === 'out-of-stock', ['class' => 'form-check-input', 'id' => 'out-stock']) }}
                                        <label class="form-check-label" for="out-stock">Out of Stock</label>
                                    </div>
                                </div>
                            </div>

                            {{-- Submit --}}
                            <div class="mt-4 d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    {{ $id ? 'Update' : 'Add' }} Product
                                </button>

                                @if($id)
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal">
                                        Delete Product
                                    </button>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}

        @if($id)
            <!-- Delete Confirmation Modal -->
            <div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to permanently delete this product?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <form action="{{ route('products.destroy', $id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Yes, Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif


    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const removeBtn = document.getElementById("removeImageBtn");
            const removeInput = document.getElementById("removeImage");
            const imagePreview = document.getElementById("imagePreview");
            const imageInput = document.getElementById("imageInput");
            const customUploadBtn = document.getElementById("customUploadTrigger");

            // Trigger file input when custom button clicked
            if (customUploadBtn && imageInput) {
                customUploadBtn.addEventListener("click", function () {
                    imageInput.click();
                });
            }

            if (removeBtn) {
                removeBtn.addEventListener("click", function () {
                    imagePreview.src = "{{ asset('images/missing.png') }}";
                    removeInput.value = "1";
                    removeBtn.remove();
                });
            }

            if (imageInput) {
                imageInput.addEventListener("change", function (e) {
                    const file = e.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function (e) {
                            imagePreview.src = e.target.result;
                        };
                        reader.readAsDataURL(file);
                        removeInput.value = "0";
                    }
                });
            }
        });
    </script>


</x-app-layout>