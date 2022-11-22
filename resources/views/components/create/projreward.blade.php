<div class="row mt-3 mb-5 text-center">
    <h1>Reward Feature</h1>
    <p class = "fs-5">Add reward description for potential backers</p>
</div>
<div class="row text-dark">
    <div class="col-12 my-4">
        <label>Tier List Titles</label>

        <!-- Tier 1 -->
        <div class="input-group mb-4">
            <div class="input-group-text">
                <!-- Tier 1 Checkbox -->
                <div class="input-group-text">
                    <div class="form-check form-switch">
                        <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Radio button for following text input" checked disabled>
                    </div>
                </div>
                
                <label for="FirstTier" class = "mx-3">1st Tier</label>
            </div>

            <input type="text" class="form-control" aria-label="Text input with checkbox" name="Tier[0][name]">
            
            <!-- Tier Amount -->
            <span class="input-group-text">Tier Amount: </span>
            <input required type="number" class="form-control" name = "Tier[0][amount]" placeholder="0.00" required min="10" max="300000" step="0.01" title="Currency" pattern="^\d+(?:\.\d{1,2})?$">

            <!-- Tier 1 Benefits -->
            <div class="input-group">
                <textarea class="form-control" placeholder="Benefits for supporters in this tier" id="Tier_1_benefits" name="Tier[0][benefits]" style="height: 7rem width: 15rem" required></textarea>
            </div>
        </div>
        
        <!-- Tier 2 -->
        <div class="input-group mb-3">
            <div class="input-group-text">
                <!-- Tier 2 Checkbox -->
                <div class="input-group-text">
                    <div class="form-check form-switch">
                        <input class="form-check-input mt-0" name="Tier2_toggle" id="Tier2_toggle" type="checkbox" value="" aria-label="Radio button for following text input">
                    </div>
                </div>

                <label for="SecondTier" class = "mx-3">2nd Tier</label>
            </div>
            <input type="text" class="form-control" aria-label="Text input with checkbox" name="Tier[1][name]" id="Tier_2_title" aria-label="Text input with radio button" disabled/>

            <!-- Tier 2 Amount -->
            <span class="input-group-text">Tier Amount: </span>
            <input type="number" class="form-control" name = "Tier[1][amount]" id="Tier_2_amount" placeholder="0.00" required min="10" max="300000" step="0.01" title="Currency" pattern="^\d+(?:\.\d{1,2})?$"  disabled/>
        
            <!-- Tier 2 Benefits -->
            <div class="input-group">
                <textarea class="form-control" placeholder="Benefits for supporters in this tier" id="Tier_2_benefits" name="Tier[1][benefits]" style="height: 7rem width: 15rem" disabled></textarea>
            </div>
        </div>

        <!-- Tier 3 -->
        <div class="input-group mb-3">
            <div class="input-group-text">
                <!-- Tier 3 checkbox -->
                <div class="input-group-text">
                    <div class="form-check form-switch">
                        <input disabled class="form-check-input mt-0" name="Tier3_toggle" id="Tier3_toggle" type="checkbox" value="" aria-label="Radio button for following text input">
                    </div>
                </div>

                <label for="ThirdTier" class = "mx-3">3rd Tier</label>
            </div>
            <input type="text" class="form-control" aria-label="Text input with checkbox" name="Tier[2][name]" id="Tier_3_title" aria-label="Text input with radio button" disabled/>
            
            <!-- Tier 3 Amount -->
            <span class="input-group-text">Tier Amount: </span>
            <input disabled type="number" class="form-control" name="Tier[2][amount]" id="Tier_3_amount" placeholder="0.00" required min="10" max="300000" step="0.01" title="Currency" pattern="^\d+(?:\.\d{1,2})?$">
        
            <!-- Tier 3 Benefits -->
            <div class="input-group">
                <textarea disabled class="form-control" placeholder="Benefits for supporters in this tier" id="Tier_3_benefits" name="Tier[2][benefits]" style="height: 7rem width: 15rem" ></textarea>
            </div>
        </div>
    </div>
</div>