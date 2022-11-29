<div class="row mt-3 mb-5 text-center">
    <h1>Reward Feature</h1>
    <p class = "fs-5">Add reward description for potential backers. <br> Minimum Tier value is 100.</p>
</div>
<div class="row text-dark">
    <div class="col-12 my-4">
        <label>Tier List Titles</label>

        <!-- Tier 1 -->
        <div class="row mb-2">
            <div class="col-8 d-flex align-self-center mb-3">
                <div class="input-group">
                    <div class="input-group-text">
                        <!-- Tier 1 Checkbox -->
                        <div class="input-group-text">
                            <div class="form-check form-switch d-flex align-items-center">
                                <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Radio button for following text input" checked disabled>
                            </div>
                        </div>
                        
                        <label for="FirstTier" class = "mx-3">1st Tier</label>
                    </div>
        
                    <input type="text" class="form-control" aria-label="Text input with checkbox" name="Tier[0][name]" required>
                </div>
            </div>
            <div class="col-4 d-flex align-self-center mb-3">
                <div class="input-group">
                    <!-- Tier Amount -->
                    <span class="input-group-text py-2">Tier Amount: </span>
                    <input required type="number" class="form-control" id = "Tier_1_amount" name = "Tier[0][amount]" placeholder="0.00" required min="100" max="300000" step="0.01" pattern="^\d+(?:\.\d{1,2})?$">
                </div>
            </div>
            <div class="row">
                <label class = "error mb-1" for = "Tier[0][name]"></label>
                <label class = "error mb-1" for = "Tier_1_amount"></label>
            </div>
            
        </div>
        
        <!-- Tier 1 Benefits -->
        <div class="input-group mb-4">
            <textarea class="form-control" placeholder="Benefits for supporters in this tier" id="Tier_1_benefits" name="Tier[0][benefits]" style="height: 7rem width: 15rem" required></textarea>
        </div>
        <label class = "error mb-3" for = "Tier_1_benefits"></label>
        
         <!-- Tier 2 -->
        <div class="row mb-2">
            <div class="col-8 d-flex align-self-center mb-3">
                <div class="input-group">
                    <div class="input-group-text">
                        <!-- Tier 2 Checkbox -->
                        <div class="input-group-text">
                            <div class="form-check form-switch d-flex align-items-center">
                                <input class="form-check-input mt-0" name="Tier2_toggle" id="Tier2_toggle" type="checkbox" value="" aria-label="Radio button for following text input">
                            </div>
                        </div>
        
                        <label for="SecondTier" class = "mx-3">2nd Tier</label>
                    </div>
                    <input type="text" class="form-control" aria-label="Text input with checkbox" name="Tier[1][name]" id="Tier_2_title" aria-label="Text input with radio button" disabled/>
                </div> 
            </div>
            <div class="col-4 d-flex align-self-center mb-3">
                <div class="input-group mb-3">
                <!-- Tier 2 Amount -->
                    <span class="input-group-text py-2">Tier Amount: </span>
                    <input type="number" class="form-control" name = "Tier[1][amount]" id="Tier_2_amount" placeholder="0.00" required min="100" max="300000" step="0.01" pattern="^\d+(?:\.\d{1,2})?$"  disabled/>
                </div>
            </div>
            <div class="row">
                <label class = "error mb-3" for = "Tier_2_title"></label>
                <label class = "error mb-3" for = "Tier_2_amount"></label>
            </div>
        </div>
        <!-- Tier 2 Benefits -->
        <div class="input-group mb-4">
            <textarea class="form-control" placeholder="Benefits for supporters in this tier" id="Tier_2_benefits" name="Tier[1][benefits]" style="height: 7rem width: 15rem" disabled></textarea>
        </div>
        <label class = "error mb-3" for = "Tier_2_benefits"></label>
        
        <div class="row mb-2">
            <div class="col-8 d-flex align-self-center mb-3">
        <!-- Tier 3 -->
                <div class="input-group mb-3">
                    <div class="input-group-text">
                        <!-- Tier 3 checkbox -->
                        <div class="input-group-text">
                            <div class="form-check form-switch d-flex align-items-center">
                                <input disabled class="form-check-input mt-0" name="Tier3_toggle" id="Tier3_toggle" type="checkbox" value="" aria-label="Radio button for following text input">
                            </div>
                        </div>

                        <label for="ThirdTier" class = "mx-3">3rd Tier</label>
                    </div>
                    <input type="text" class="form-control" aria-label="Text input with checkbox" name="Tier[2][name]" id="Tier_3_title" aria-label="Text input with radio button" disabled/>
                </div>
            </div>
            <div class="col-4 d-flex align-self-center mb-3">
                <!-- Tier 3 Amount -->
                <div class="input-group mb-3">
                    <span class="input-group-text py-2">Tier Amount: </span>
                    <input disabled type="number" class="form-control" name="Tier[2][amount]" id="Tier_3_amount" placeholder="0.00" required min="100" max="300000" step="0.01" pattern="^\d+(?:\.\d{1,2})?$">
                </div>
            </div>
            <div class="row">
                <label class = "error mb-3" for = "Tier_3_title"></label>
                <label class = "error mb-3" for = "Tier_3_amount"></label>
            </div>
        </div>

        <!-- Tier 3 Benefits -->
        <div class="input-group">
            <textarea disabled class="form-control" placeholder="Benefits for supporters in this tier" id="Tier_3_benefits" name="Tier[2][benefits]" style="height: 7rem width: 15rem" ></textarea>
        </div>
        <label class = "error mb-3" for = "Tier_3_benefits"></label>
    </div>
</div>
<div class="col d-flex justify-content-between">
    <button type ="button" data-next = "basic" class="tab_next btn btn-danger">Previous</button>
    <button type ="button" data-next = "story" class="tab_next btn btn-primary">Next</button>
</div>