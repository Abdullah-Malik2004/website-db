var electronic = ['laptop', 'phone', 'board', 'watch'];
// Function to add an electronic to the cart
function addToCart(electronicId, path, quantity) 
{

    

    var electronicDiv = document.getElementById(electronicId);
    var addedStateKey = electronicId + "a";
    var quantityKey = electronicId + "Quantity"; // Key for storing quantity
    var quantityInput = document.getElementById(electronicId + 'Quantity');


    var quantity = quantityInput.value;
    var quantityInput = electronicId + 'Quantity';
    localStorage.setItem(quantityInput, quantity );

    if (electronicDiv) 
    {
        var h5Element = electronicDiv.querySelector('h5');
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
            localStorage.removeItem(electronicId);
            localStorage.removeItem(quantityKey); 
            quantityInput.disabled = false;
        }

        // Ensure that the added state is properly set before continuing
        addedState = localStorage.getItem(addedStateKey) === 'added';

        if (electronic.includes(electronicId) && addedState) 
        {
            localStorage.setItem(electronicId, path);

            // Check if there's a stored quantity value and update the input field
            var storedQuantity = localStorage.getItem(quantityKey);

            if (storedQuantity !== null) 
                quantityInput.value = storedQuantity;
                else 
                // Set the initial quantity value if not already set
                localStorage.setItem(quantityKey, quantity);
        }

        console.log(electronicId);
        console.log(localStorage.getItem(electronicId));
    }
}

// Event listener for page load
window.addEventListener('load', function () 
{
    var electronicIds = ['phone', 'laptop', 'board', 'watch'];

    electronicIds.forEach(function (electronicId) 
    {
        console.log("This: "+document.getElementById(electronicId));
        console.log(electronicId)

        var h5Element = document.getElementById(electronicId).querySelector('h5');
        var addedStateKey = electronicId + "a";
        var quantityKey = electronicId + "Quantity"; // Key for storing quantity
        var addedState = localStorage.getItem(addedStateKey) === 'added';

        if (addedState) {
            h5Element.textContent = 'Added';
        } else {
            h5Element.textContent = 'Add to Cart';
        }

        // Retrieve the quantity value and update the input field
        var quantityInput = document.getElementById(electronicId + 'Quantity');
        var storedQuantity = localStorage.getItem(quantityKey);

        if (storedQuantity !== null) {
            quantityInput.value = storedQuantity;
        }
    });
});
