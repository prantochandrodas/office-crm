{{-- Conversation modal  --}}
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Conversation</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('conversation-logs.store') }}"
                enctype="multipart/form-data" id="conversationLogForm">
                @csrf
                {{-- <div class="form-group">
                    <label for="modal_customer_id">Customer Name:</label>
                    <select id="modal_customer_id" name="customer_id" class="form-control example select2" {{ count($customers) == 1 ? 'readonly' : '' }} disabled>
                        <option value="">Select Customer</option>
                        @foreach ($customers as $item)
                            <option value="{{ $item->id }}" {{ count($customers) == 1 ? 'selected' : '' }}>
                                {{ $item->name }} ({{ $item->phone }})
                            </option>
                        @endforeach
                    </select>
                </div> --}}
                <input type="hidden" name="customer_id" id="modal_customer_id_hidden" value="">
                <div class="form-group">
                    <label for="modal_project_id" class="mb-2 fw-bold">Select Project:</label>
                    <select id="modal_project_id" name="project_id" class="form-control">
                        <option value="">Select Project</option>
                    </select>
                </div>
                <div class="form-group my-4">
                    <label for="modal_note" class="mb-2 fw-bold">Note:</label>
                    <textarea name="note" id="modal_note" cols="30" rows="3" class="form-control"
                        placeholder="Write Conversation"></textarea>
                </div>
                <div class="form-group my-4">
                    <label for="modal_date" class="mb-2 fw-bold">Date:</label>
                    <input type="date" class="form-control" name="date">
                </div>
                <button type="submit" class="btn btn-primary btn-sm" data-bs-dismiss="modal">Create</button>
            </form>
        </div>
    </div>
</div>
</div>
