var clothes = ['hoodie', 'pink', 'black', 'white'];
// Function to add an item to the cart
function addToCart(clothesId, path, quantity) 
{
    var clothesDiv = document.getElementById(clothesId);
    var addedStateKey = clothesId + "a";
    var quantityKey = clothesId + "Quantity"; // Key for storing quantity
    var quantityInput = document.getElementById(clothesId + 'Quantity');


    var quantity = quantityInput.value;
    var quantityInput = clothesId + 'Quantity';
    localStorage.setItem(quantityInput, quantity );

    if (clothesDiv) 
    {
        var h5Element = clothesDiv.querySelector('h5');
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
            localStorage.removeItem(clothesId);
            localStorage.removeItem(quantityKey); 
            quantityInput.disabled = false;
        }

        // Ensure that the added state is properly set before continuing
        addedState = localStorage.getItem(addedStateKey) === 'added';

        if (clothes.includes(clothesId) && addedState) 
        {
            localStorage.setItem(clothesId, path);

            // Check if there's a stored quantity value and update the input field
            var storedQuantity = localStorage.getItem(quantityKey);

            if (storedQuantity !== null) 
                quantityInput.value = storedQuantity;
                else 
                // Set the initial quantity value if not already set
                localStorage.setItem(quantityKey, quantity);
        }

        console.log(clothesId);
        console.log(localStorage.getItem(clothesId));
    }
}

// Event listener for page load
window.addEventListener('load', function () 
{
    var clothesIds = ['hoodie', 'pink', 'black', 'white'];

    clothesIds.forEach(function (clothesId) 
    {
        var h5Element = document.getElementById(clothesId).querySelector('h5');
        var addedStateKey = clothesId + "a";
        var quantityKey = clothesId + "Quantity"; // Key for storing quantity
        var addedState = localStorage.getItem(addedStateKey) === 'added';

        if (addedState)
            h5Element.textContent = 'Added';
        else 
            h5Element.textContent = 'Add to Cart';
        

        // Retrieve the quantity value and update the input field
        var quantityInput = document.getElementById(clothesId + 'Quantity');
        var storedQuantity = localStorage.getItem(quantityKey);

        if (storedQuantity !== null) {
            quantityInput.value = storedQuantity;
        }
    });
});
