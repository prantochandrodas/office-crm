 <!-- Mail Modal  -->
 <div class="modal fade" id="mailModal" tabindex="-1" aria-labelledby="mailModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mailModalLabel">Send Mail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Your form or content goes here -->
                <form id="mailForm" method="POST" action="{{ route('mail.client') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Client name</label>
                        <select name="client_name" id="client_name" class="form-select example ">
                            <option>Select Client</option>
                            @foreach ($customers as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="subject" class="form-label">Mail Subject</label>
                        <input type="text" class="form-control" id="subject" name="subject" required
                            placeholder="Mail subject">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Client Email</label>
                        <input type="email" class="form-control" id="email" name="email" required
                            placeholder="Client Email">
                    </div>
                    <div class="mb-3">
                        <label for="attachment" class="fw-bold">Attach File :</label>
                        <input type="file" class="form-control" id="attachment" name="attachment">
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="3" required placeholder="Message"></textarea>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm d-flex align-items-center"
                            data-bs-dismiss="modal">
                            <svg style="width: 20px; height:20px" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path opacity="0.5"
                                        d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12Z"
                                        fill="#1C274C"></path>
                                    <path
                                        d="M8.96967 8.96967C9.26256 8.67678 9.73744 8.67678 10.0303 8.96967L12 10.9394L13.9697 8.96969C14.2626 8.6768 14.7374 8.6768 15.0303 8.96969C15.3232 9.26258 15.3232 9.73746 15.0303 10.0304L13.0607 12L15.0303 13.9696C15.3232 14.2625 15.3232 14.7374 15.0303 15.0303C14.7374 15.3232 14.2625 15.3232 13.9696 15.0303L12 13.0607L10.0304 15.0303C9.73746 15.3232 9.26258 15.3232 8.96969 15.0303C8.6768 14.7374 8.6768 14.2626 8.96969 13.9697L10.9394 12L8.96967 10.0303C8.67678 9.73744 8.67678 9.26256 8.96967 8.96967Z"
                                        fill="#1C274C"></path>
                                </g>
                            </svg> Close
                        </button>
                        <button type="submit" data-bs-dismiss="modal"
                            class="btn btn-primary btn-sm d-flex align-items-center">
                            <i class="fas fa-envelope"></i> Send Mail
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
