<div class="container-fluid mt-5">
    <label for="ActivityLogs_Table" class="h1 d-flex justify-content-center">Activity Logs</label>
    <div class="row" id = "ActivityLogs_Table">
        <div class="row search_input">
            <form action="" class="col-6">
                <div class="input-group">
                    <button type="submit" class="input-group-text btn text-dark">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </button>
                    <input type="text" class="form-control" name="activity" placeholder="Search..." id="search1" aria-label="Search" aria-describedby="search1" required>
                </div>
            </form>
        </div>
        <hr>
        <table class="table table-responsive align-middle table-hover">
            <thead>
                <tr>
                    <th>Date and time</th>
                    <th>Email</th>
                    <th>User</th>
                    <th>Activity</th>
                </tr>
            </th>
            <tbody id="activity_log">
                <tr>
                    <td>1/02/2023 12:23:00:00</td>
                    <td>example@gmail.com</td>
                    <td>Mark</td>
                    <td>Logged In</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>