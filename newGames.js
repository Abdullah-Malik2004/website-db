var game = ['assissin', 'fc5', 'jedi', 'wwz'];

function addToCart(gameId, path) 
{
    var gameDiv = document.getElementById(gameId);
    var addedStateKey = gameId + "a";  // Using a consistent key for added state

    if (gameDiv) {
        var h5Element = gameDiv.querySelector('h5');
        var addedState = localStorage.getItem(addedStateKey) === 'added';

        if (!addedState) {
            h5Element.textContent = 'Added';
            localStorage.setItem(addedStateKey, 'added');
        } else {
            h5Element.textContent = 'Add to Cart';
            localStorage.setItem(addedStateKey, 'not_added');
            localStorage.removeItem(gameId);  // Remove the specific game's local storage entry
        }
    }

    // Ensure that the added state is properly set before continuing
    addedState = localStorage.getItem(addedStateKey) === 'added';

    // Check if the key is not in the game array
    if (game.includes(gameId) && addedState) {
        localStorage.setItem(gameId, path);
    }

    console.log(gameId);
    console.log(localStorage.getItem(gameId));
}

window.addEventListener('load', function () {
    var gameIds = ['assissin', 'fc5', 'jedi', 'wwz'];

    gameIds.forEach(function (gameId) {
        var h5Element = document.getElementById(gameId).querySelector('h5');
        var addedStateKey = gameId + "a";  // Using a consistent key for added state
        var addedState = localStorage.getItem(addedStateKey) === 'added';

        if (addedState) {
            h5Element.textContent = 'Added';
        } else {
            h5Element.textContent = 'Add to Cart';
        }
    });
});
