<div class="row mt-3 mb-5 text-center">
    <h1>Payment Process</h1>
    <p class = "fs-5">Verify who will be collecting money and receiving it if this project meets its funding target. <br>
        Make sure the information you give is accurate. It cannot be changed once it has been submitted.
    </p>
</div>
<div class="row">
    <div class="col-5 p-3 my-auto">
        <h3>
            Contact Email
        </h3>
        <section class="mt-4 fs-6">
            Verify the email address we should use to communicate with each other regarding this project.
            <br>
            If the wrong email is displayed, make the necessary changes on your <a href = {{route('settings')}}> account</a>.
        </section>
    </div>
    <div class="col-7 px-3 align-self-center">
        <div class="mb-3">
            <label for="EmailDisplay" class="mb-3">Email In Use: </label>
            <input type="text" class="Edisplay form-control" id="EmailDisplay" placeholder="Email Here Please" readonly>
        </div>
    </div>
</div>
<hr class = "create">
<div class="row">
    <div class="col-5 p-3 my-auto">
        <h3>
            Project Type
        </h3>
        <section class="mt-4 fs-6">
            If you are soliciting and raising funds for this project under your own name, choose "Individual." 
            <br><br>
            If you are raising funds for this project on behalf of a company you own or are an executive of with the authority to represent, choose "Business" or "Nonprofit."
        </section>
    </div>
    <div class="col-7 px-3 align-self-center">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingPT" name = "ProjType">
            <label for="floatingPT">Project Type</label>
        </div>
    </div>
</div>
<hr class = "create">
<div class="row">
    <div class="col-5 p-3 my-auto">
        <h3>
            Payment Source
        </h3>
        <section class="mt-4 fs-6">
            This card must be registered in the name of the person or organization (or owner of the organization) who is raising money for the project.
            <br><br>
            By adding this card, you authorize Ideanaleh to use it for refunds or in the event that your project is the subject of a lost chargeback dispute.
        </section>
    </div>
    <div class="col-7 px-3 align-self-center">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingPS" name = "PaymentSource">
            <label for="floatingPS">Payment Source</label>
        </div>
    </div>
</div>

<div class="col d-flex justify-content-between">
    <button type ="button" data-next = 'story' class="tab_next btn btn-danger">Previous</button>
    <button type = "submit" class = "tab_next btn btn-primary">Submit</button>
</div>