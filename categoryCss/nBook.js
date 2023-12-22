var book = ['quran', 'bussi', 'head', 'winter'];
// Function to add an item to the cart
function addToCart(bookId, path, quantity) 
{
    var bookDiv = document.getElementById(bookId);
    var addedStateKey = bookId + "a";
    var quantityKey = bookId + "Quantity"; // Key for storing quantity
    var quantityInput = document.getElementById(bookId + 'Quantity');


    var quantity = quantityInput.value;
    var quantityInput = bookId + 'Quantity';
    localStorage.setItem(quantityInput, quantity );

    if (bookDiv) 
    {
        var h5Element = bookDiv.querySelector('h5');
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
            localStorage.removeItem(bookId);
            localStorage.removeItem(quantityKey); 
            quantityInput.disabled = false;
        }

        // Ensure that the added state is properly set before continuing
        addedState = localStorage.getItem(addedStateKey) === 'added';

        if (book.includes(bookId) && addedState) 
        {
            localStorage.setItem(bookId, path);

            // Check if there's a stored quantity value and update the input field
            var storedQuantity = localStorage.getItem(quantityKey);

            if (storedQuantity !== null) 
                quantityInput.value = storedQuantity;
                else 
                // Set the initial quantity value if not already set
                localStorage.setItem(quantityKey, quantity);
        }

        console.log(bookId);
        console.log(localStorage.getItem(bookId));
    }
}

// Event listener for page load
window.addEventListener('load', function () 
{
    var bookIds = ['quran', 'bussi', 'head', 'winter'];

    bookIds.forEach(function (bookId) {
        var h5Element = document.getElementById(bookId).querySelector('h5');
        var addedStateKey = bookId + "a";
        var quantityKey = bookId + "Quantity"; // Key for storing quantity
        var addedState = localStorage.getItem(addedStateKey) === 'added';

        if (addedState) {
            h5Element.textContent = 'Added';
        } else {
            h5Element.textContent = 'Add to Cart';
        }

        // Retrieve the quantity value and update the input field
        var quantityInput = document.getElementById(bookId + 'Quantity');
        var storedQuantity = localStorage.getItem(quantityKey);

        if (storedQuantity !== null) {
            quantityInput.value = storedQuantity;
        }
    });
});
