<div class="modal fade" id="viewConversationdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
aria-labelledby="viewConversationLabel" aria-hidden="true">
<div class="modal-dialog" style="max-width: 80%;">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="viewConversationLabel">View Conversation</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <!-- Responsive table with Bootstrap classes -->
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Customer</th>
                            <th>Project</th>
                            <th>Note</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody id="conversationLogsTableBody">
                        <!-- Dynamic rows will be appended here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>