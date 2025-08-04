<x-app-layout>
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-sm">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Add New Product</h4>
                        <a href="/productslist" class="btn btn-outline-primary">Back to List</a>
                    </div>

                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <form action="{{ route('admin.store-product') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Product Name</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    placeholder="Enter product name" required>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="number" name="price" id="price" class="form-control"
                                        placeholder="Enter price" step="0.01" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="sale_price" class="form-label">Sale Price (optional)</label>
                                    <input type="number" name="sale_price" id="sale_price" class="form-control"
                                        placeholder="Enter sale price" step="0.01">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" id="description" rows="4" class="form-control"
                                    placeholder="Enter product description"></textarea>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Product Image</label>
                                <div class="border rounded p-4 text-center" id="drop-area">
                                    <input type="file" name="image" id="fileElem" accept="image/*" class="d-none">
                                    <button type="button" class="btn btn-outline-primary mb-2"
                                        onclick="document.getElementById('fileElem').click()">Choose Image</button>
                                    <p class="text-muted">or drag and drop here</p>
                                    <div id="preview" class="mt-3"></div>
                                </div>
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Add Product</button>
                                <a href="/products" class="btn btn-danger ms-2">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Image Preview Script --}}
    <script>
        const dropArea = document.getElementById("drop-area");
        const fileInput = document.getElementById("fileElem");
        const preview = document.getElementById("preview");

        function showPreview(file) {
            const reader = new FileReader();
            reader.onload = () => {
                preview.innerHTML = `
                    <div class="position-relative d-inline-block">
                        <img src="${reader.result}" class="img-fluid rounded" style="max-height: 200px;">
                        <button type="button" class="btn btn-sm btn-danger position-absolute top-0 end-0" onclick="removeImage()">×</button>
                    </div>`;
            };
            reader.readAsDataURL(file);
        }

        function removeImage() {
            preview.innerHTML = "";
            fileInput.value = "";
        }

        fileInput.addEventListener('change', function () {
            if (this.files && this.files[0]) {
                showPreview(this.files[0]);
            }
        });

        dropArea.addEventListener("dragover", (e) => {
            e.preventDefault();
            dropArea.classList.add("border-primary");
        });

        dropArea.addEventListener("dragleave", () => {
            dropArea.classList.remove("border-primary");
        });

        dropArea.addEventListener("drop", (e) => {
            e.preventDefault();
            dropArea.classList.remove("border-primary");
            const file = e.dataTransfer.files[0];
            fileInput.files = e.dataTransfer.files;
            showPreview(file);
        });
    </script>
</x-app-layout>