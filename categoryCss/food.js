var item = ['burger', 'chick', 'fries', 'wrap'];
// Function to add an item to the cart
function addToCart(itemId, path, quantity) 
{
    var itemDiv = document.getElementById(itemId);
    var addedStateKey = itemId + "a";
    var quantityKey = itemId + "Quantity"; // Key for storing quantity
    var quantityInput = document.getElementById(itemId + 'Quantity');


    var quantity = quantityInput.value;
    var quantityInput = itemId + 'Quantity';
    localStorage.setItem(quantityInput, quantity );

    if (itemDiv) 
    {
        var h5Element = itemDiv.querySelector('h5');
        var addedState = localStorage.getItem(addedStateKey) === 'added';

        if (!addedState) 
        {
            h5Element.textContent = 'Added';
            localStorage.setItem(addedStateKey, 'added');
            quantityInput.disabled = true;
        } 
        else 
        {
            h5Element.textContent = 'Add to Cart';
            localStorage.setItem(addedStateKey, 'not_added');
            localStorage.removeItem(itemId);
            localStorage.removeItem(quantityKey); 
            quantityInput.disabled = false;
        }

        // Ensure that the added state is properly set before continuing
        addedState = localStorage.getItem(addedStateKey) === 'added';

        if (item.includes(itemId) && addedState) 
        {
            localStorage.setItem(itemId, path);

            // Check if there's a stored quantity value and update the input field
            var storedQuantity = localStorage.getItem(quantityKey);

            if (storedQuantity !== null) 
                quantityInput.value = storedQuantity;
                else 
                // Set the initial quantity value if not already set
                localStorage.setItem(quantityKey, quantity);
        }

        console.log(itemId);
        console.log(localStorage.getItem(itemId));
    }
}

// Event listener for page load
window.addEventListener('load', function () 
{
    var itemIds = ['burger', 'chick', 'fries', 'wrap'];

    itemIds.forEach(function (itemId) 
    {
        
        var h5Element = document.getElementById(itemId).querySelector('h5');
        var addedStateKey = itemId + "a";
        var quantityKey = itemId + "Quantity"; // Key for storing quantity
        var addedState = localStorage.getItem(addedStateKey) === 'added';

        if (addedState) {
            h5Element.textContent = 'Added';
        } else {
            h5Element.textContent = 'Add to Cart';
        }

        // Retrieve the quantity value and update the input field
        var quantityInput = document.getElementById(itemId + 'Quantity');
        var storedQuantity = localStorage.getItem(quantityKey);

        if (storedQuantity !== null) {
            quantityInput.value = storedQuantity;
        }
    });
});
