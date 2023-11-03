let inventory = [];

function addItem() {
    const itemInput = document.getElementById("item");
    const quantityInput = document.getElementById("quantity");
    const item = itemInput.value;
    const quantity = quantityInput.value;

    if (item && quantity) {
        inventory.push({ item, quantity });
        itemInput.value = "";
        quantityInput.value = "";
        displayInventory();
    }
}

function displayInventory() {
    const inventoryList = document.getElementById("inventoryList");
    inventoryList.innerHTML = "";
    for (const item of inventory) {
        const li = document.createElement("li");
        li.textContent = `${item.item}: ${item.quantity}`;
        inventoryList.appendChild(li);
    }
}
