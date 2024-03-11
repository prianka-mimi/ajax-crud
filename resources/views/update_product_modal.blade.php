<!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
  </button> --}}

  <!-- Modal -->
  <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">

    <form action="" method="post" id="updateProductForm">
        @csrf

        <input type="hidden" id="up_id">

        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="updateModalLabel">Update Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                {{-- form part start --}}
                <div class="errMsgContainer mb-3"></div>

                <div class="form-group mt-3">
                    <label for="name">Product Name</label>
                    <input type="text" class="form-control" name="up_name" id="up_name" placeholder="Product Name">
                </div>

                <div class="form-group mt-3">
                    <label for="name">Product price</label>
                    <input type="text" class="form-control" name="up_price" id="up_price" placeholder="Product Price">
                </div>
                {{-- form part end --}}

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary update_product">Update Product</button>
              </div>
            </div>
          </div>

    </form>

  </div>
