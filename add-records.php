<div class="add-records">
    <form action="action.php" method="POST">

        <label for="item-name">Item Name: </label>
        <input type="text" name="item-name" placeholder="" required><br>

        <label for="item-description">Item Description: </label>
        <input type="text" name="item-description" placeholder="" required><br>

        <label for="purchase-year">Purchase year: </label>
        <input type="text" name="purchase-year" placeholder="" required><br>

        <label for="purchase-value">Purchase value: </label>
        <input type="text" name="purchase-value" placeholder="" required><br>

        <label for="no-of-items">No. of items: </label>
        <input type="text" name="no-of-items" placeholder="" required><br>

        <label for="condition">Condition: </label>
        <select name="condition" id="condition">
            <option value="working">Working</option>
            <option value="defect">Defect</option>
        </select>

        <label for="depr-rate">Rate of Depreciation: </label>
        <input type="number" name="depr-rate" placeholder="" required><br>

        <label for="location">Location: </label>
        <input type="text" name="location" placeholder="" required><br>

        <button type="submit" name="add-record">ADD</button>
    </form>
</div>